<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trancheHoraire extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'occupied',
        'idCommande'
    ];

    public function returnCommande() {
        return $this->belongsTo(commande::class);
    }
}
