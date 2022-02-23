<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'date', 
        'contenu',
        'idClient',
        'nomClient'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(){
        return $this->belongsTo(Client::class,'id');
    }
}
