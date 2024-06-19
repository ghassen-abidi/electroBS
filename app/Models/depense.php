<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class depense extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant',
        'description',
        'date',
        'immeuble_id',
    ];
    public function immeuble()
    {
        return $this->belongsTo(immeuble::class);
    }
}
