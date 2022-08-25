<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMaintenance extends Model
{
    use HasFactory;
    protected $table='type_maintenances';
    protected $fillable=[
        'libelleTypeEntretien',
        'descriptionTypeEntretien',
        //'unitMesureId',

    ];
    protected $appends=['appends'];

    public function maintenacevehicules()
    {
        return $this->hasMany(MaintenanceVehicule::class);
    }

    public  function unitMesures()
    {
        return $this->belongsToMany(UnitMesure::class,'unit_mesure_type_maintenances','unit_mesure_id','type_entretien_id');

    }

    public function getAppendsAttribute()
    {
        return[
            //'maintenacevehicules'=>$this->maintenacevehicules()->get(),
            //'totalVehicule'=>$this->Vehicule()->count(),





        ];

    }
}
