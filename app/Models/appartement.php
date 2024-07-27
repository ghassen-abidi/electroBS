<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appartement extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'description',
        'prix',
        'etage',
        'parking',
        'immeublesid',
    ];
    public function immeuble()
    {
        return $this->belongsTo(immeuble::class);
    }
    public function depenses()

    {
        return $this->hasMany(depense::class);
    }
}
