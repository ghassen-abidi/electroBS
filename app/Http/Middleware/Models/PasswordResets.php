<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResets extends Model
{
    protected $primaryKey = 'email';
    use HasFactory;
    protected $fillable = [
        'email',
        'token',
        'created_at',
        'updated_at',
        
    ];
}
