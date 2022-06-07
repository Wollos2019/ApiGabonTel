<?php

namespace App\Models\Vehicule;

use App\Models\Assurance;
use App\Models\MaintenanceVehicule;
use App\Models\Panne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $table="vehicules";

    protected $fillable=[
        'id',
        'libelleVehicule',
        'numeroIdentifiant',
        'immatriculation',
        'carteGrise',
        'nombrePlace',
        'longueurVehicule',
        'dureeVie',
        'dateMiseCirculation',
        'delaiAlerte',
        'category_permit_id'

    ];

    protected $appends=['appends'];

    public function priseVehicules(){
        return $this->hasMany(PriseVehicule::class);
    }
    public function assurances(){
        return $this->hasMany(Assurance::class);
    }
    public function categoriePermis()
    {
        return $this->belongsToMany(CategoryPermit::class,'category_permit_vehicules','category_permit_id','vehicule_Id');
    }

    public function panneVehicule()
    {
        return $this->hasMany(Panne::class);
    }
    public function maintenanceVehicule(){
        return $this->hasMany(MaintenanceVehicule::class);
    }

    public function getAppendsAttribute()
    {
        return[

             'CategoryPermit'=>$this->CategoriePermis()->get(),
                'totalVehicules'=>Vehicule::count(),
            //'NunberpanneVehicule'=>$this->panneVehicule()->count(),
        ];

    }



}
