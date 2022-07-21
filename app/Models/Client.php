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
        'civilityId',
        'photo'
    ];

    protected $appends= ['appends'];

    public function commande () {
        return $this->hasMany(commande::class, 'idClient', 'id');
    }

    public function getAppendsAttribute(){
        return [
            'url'=> $this->photo? asset('' . $this->photo):null
        ];
    }

}
