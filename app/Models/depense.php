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
        'type',
        'date',
        'appartement_id',
    ];
    public function appartement()
    {
        return $this->belongsTo(Appartement::class);
        }
}
