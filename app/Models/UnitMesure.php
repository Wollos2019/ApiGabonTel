<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMesure extends Model
{
    use HasFactory;
    protected $table='unit_mesures';
    protected $fillable=[
        'symboleUniteMesure',
        'libelleUniteMesure'
    ];

    public  function typeMaintenance()
    {
        return $this->belongsToMany(TypeMaintenance::class,'unit_mesure_type_entretiens','type_entretien_id','unit_mesure_id');

    }
}
