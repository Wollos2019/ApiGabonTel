<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 
        'adresse',
        'email',
        'telephone'
    ];

    public function commande () {
        $this->hasMany(commande::class);
    }
}
