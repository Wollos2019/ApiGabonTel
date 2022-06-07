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
    protected $appends=['appends'];
    protected $with= ['CommandesDetail'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(){
        return $this->belongsTo(Client::class,'id');
    }

    public function commandesDetail() {
        return $this->hasMany(CommandesDetail::class, 'idCommande', 'id');
    }

    public function getAppendsAttribute(){
        return [
            'commandesDetail'=> $this->commandesDetail()->get()
        ];
    }

    public function getComandesDetailAttribute()
    {
        return $this->commandesDetail();
    }

}
