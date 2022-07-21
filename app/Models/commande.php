<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    const STATUS = ['ENABLE', 'DISABLE'];

    protected $fillable = [
        'date', 
        'idClient',
        'nomClient',
        'invoiced',
        'evaluated',
        'selected',
        'status'
        
    ];
    protected $appends=['appends'];
    protected $with= ['CommandesDetail','Client'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(){
        return $this->belongsTo(Client::class,'idClient','id');
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

    public function getClientAttribute()
    {
        return $this->client();
    }

}
