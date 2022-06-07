<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 
        'prenom',
        'adresse',
        'email',
        'telephone',
        'gender',
        'town',
        'country',        
        'civilityId'
    ];

    public function commande () {
        $this->hasMany(commande::class);
    }

    public function getAppendsAttribute(){
        return [
            'countEmployee'=> $this->employees()->count(),
            'employees'=>$this->employees()->get()
        ];
    }
}
