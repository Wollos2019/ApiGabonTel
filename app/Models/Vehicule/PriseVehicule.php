<?php

namespace App\Models\Vehicule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriseVehicule extends Model
{
    use HasFactory;
    protected $table="prise_vehicules";

    /**
     * @var string[]
     */
    protected $fillable =[
        'objetPriseVehicule',
        'datePriseVehicule',
        'heurePriseVehicule',
        'idVehicule',

    ];

    protected $appends=['appends'];
    public function vehicule()
        {
            return $this->belongsTo(Vehicule::class,'idVehicule');
        }
    public function getAppendsAttribute()
    {
        return[
            'vehicule'=>$this->vehicule()->first()
        ];
    }
//
}
