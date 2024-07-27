<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PasswordResets;
use Validator;
use App\Http\Controllers\RandomPassword;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'wrong email or password'], 401);
        }
        return $this->createNewToken($token);
    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    
    
     

public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'fullname' => 'required|string|between:2,100',
        'email' => 'required|string|email|max:100|unique:users',
        'phonenumber' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        //the role can be superµAdmin or and by default is client only
        'role' => 'required|string|max:20',
        

    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors()->toJson(), 400);
    }

   // Length of the random string in bytes
    $randomBytes = openssl_random_pseudo_bytes(4);
    $randomPassword = bin2hex($randomBytes); 

    $user = User::create(array_merge(
        $validator->validated(),
        ['password' => bcrypt($randomPassword)]
    ));

    // Optionally, you might want to send the randomly generated password to the user
    // You can send it via email or any other means
    // mail($user->email, 'Your Randomly Generated Password', $randomPassword);

    return response()->json([
        'message' => 'User successfully registered',
        'user' => $user,
        'password' => $randomPassword,
        
    ], 201);
}
// function reset password 
public function resetPassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email|max:100',
    ]);
    if ($validator->fails()) {
        return response()->json($validator->errors()->toJson(), 400);
    }
    $user = User::where('email', $request->email)->first();
    if ($user === null) {
        return response()->json([
            'message' => 'User not found',
        ], 404);
    }
    // Length of the random string in bytes
    $randomBytes = openssl_random_pseudo_bytes(4);
    $randomPassword = bin2hex($randomBytes);
    $user->password = bcrypt($randomPassword);
    $user->save();
    $passwordReset = PasswordResets::where('email', $request->email)->first();

    if ($passwordReset === null) {
    // Create new record if not found
    $passwordReset = PasswordResets::create([
        'email' => $request->email,
        'token' => bcrypt($randomPassword), // Hash token before saving
    ]);
    } else {
    // Update token if record exists
    $passwordReset->token = bcrypt($randomPassword); // Hash new token
    $passwordReset->save();
    }
 
    
    return response()->json([
        'message' => 'Password reset successfully',
        'password' => $randomPassword,
    ], 200);
}

// get all users
public function getAllUsers(Request $resquest)
{
    $users = User::all();
    return response()->json($users);
}
// function update User 
public function updateUser(Request $request, $id)
{
    $user = User::find($id);
    $user->update($request->all());
    return response()->json($user);
}
//function delete user 

public function deleteUser($id)
{
    $user = User::find($id);
    $user->delete();
    return response()->json($user);

}




    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(
        [
            'id'=> $id=auth()->user()->id,
            'phone'=>$phone=auth()->user()->phone,
            'fullname'=>$fullname=auth()->user()->fullname,
            'email'=>$email=auth()->user()->email,
           
        ]
    );
    }
   
    
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
