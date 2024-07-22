<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class immeuble extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'adresse',
        'ville',
        'code_postal',
        'superficie',
        'nombre_etage',
        'nombre_appartement',
        'user_id'
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function appartements()
    {
        return $this->hasMany(appartement::class);
        }
}
