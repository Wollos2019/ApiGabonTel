<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'idCommande',
        'idClient',
        'nomClient'
    ];
    protected $appends=['appends'];

    public function client () {
        return $this->belongsTo(Client::class, 'idClient');
    }

    public function getAppendsAttribute(){
        return [
            'Client'=> $this->client()
        ];
    }
}
