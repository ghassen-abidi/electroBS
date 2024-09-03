<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImmeubleController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\AppartementController;
use App\Http\Controllers\PaiementController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    print("hello, world");
    return $request->user();
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register'])/*>middleware('role:admin,user')*/;
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile/{id}', [AuthController::class, 'userProfile']);    
    Route::post('/resetPassword', [AuthController::class, 'resetPassword']);
    Route::get('/getAllUsers',[AuthController::class,'getAllUsers']);
    Route::post('/updateUser/{id}', [AuthController::class, 'updateUser']);
    // delelte user 
    Route::delete('/deleteUser/{id}', [AuthController::class, 'deleteUser']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'immeuble'
], function ($router) {
    Route::get('/index/{id}', [ImmeubleController::class, 'index']);
    Route::post('/create', [ImmeubleController::class, 'create']);
    Route::post('/update/{id}', [ImmeubleController::class, 'update']);
    //destroy 
    Route::delete('/delete/{id}', [ImmeubleController::class, 'delete']);
    Route::get('/show/{nom}', [ImmeubleController::class, 'show']);

});
Route::group([
    'middleware' => 'api',
    'prefix' => 'depense'
], function ($router) {
    Route::get('/index', [DepenseController::class, 'index']);
    Route::post('/create', [DepenseController::class, 'create']);
     Route::post('/update', [DepenseController::class, 'update']);
    // Route::delete('/delete/{id}', [DepenseController::class, 'delete']);
    // Route::get('/show/{id}', [DepenseController::class, 'show']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'appartement'
], function ($router) {
    Route::get('/index/{id}', [AppartementController::class, 'index']);
    Route::post('/create', [AppartementController::class, 'create']);
    Route::post('/store', [AppartementController::class, 'store']);

    Route::post('/update/{id}', [AppartementController::class, 'update']);
    Route::post('/delete/{id}', [AppartementController::class, 'delete']);
    Route::get('/show/{id}', [AppartementController::class, 'show']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'paiement'
], function ($router) {
    Route::get('/index', [PaiementController::class, 'index']);
    Route::post('/store', [PaiementController::class, 'store']);
    Route::post('/update', [PaiementController::class, 'update']);
    Route::delete('/delete/{id}', [PaiementController::class, 'delete']);
    Route::get('/show/{id}', [PaiementController::class, 'show']);
});