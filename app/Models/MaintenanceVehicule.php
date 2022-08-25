<?php

namespace App\Models;

use App\Models\Vehicule\Vehicule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceVehicule extends Model
{
    use HasFactory;
    protected $table='maintenance_vehicules';
    protected $fillable=[
        'dateEntretien',
        'cout',
        'nextDateEntretien',
        'kilometrageEntretien',
        'kilometrageNextEntretien',
        'quantiteTypeEntretien',
        'vehiculeId',
        'fournisseurId',
        'typeEntretienId',
    ];
    protected $appends=['appends'];
    public function typeMaintenancevehicule(){
        return $this->belongsTo(TypeMaintenance::class);
    }
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function getAppendsAttribute()
    {
        return[
            'vehicules'=>$this->vehicule()->first(),
            'fournisseur'=>$this->vendor()->first(),
            'typeMaintenancevehicule'=>$this->typeMaintenancevehicule()->first(),






        ];

    }
}
