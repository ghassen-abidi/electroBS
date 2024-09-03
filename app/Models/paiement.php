<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paiement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'date',
        'due_date',
        'status',
        'appartement_id',
    ];
}
