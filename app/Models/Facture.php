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
    
    protected $with = ['Client', 'CommandesDetail'];


    public function client () {
        return $this->belongsTo(Client::class, 'idClient', 'id');
    }

    public function commandesDetail() {
        return $this->hasMany(CommandesDetail::class, 'idCommande', 'idCommande');
    }

    public function getClientAttribute()
    {
        return $this->client();
    }

    public function getComandesDetailAttribute()
    {
        return $this->commandesDetail();
    }
}
