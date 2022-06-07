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
        '',
    ];
    public function typeMaintenanceVehicule(){
        return $this->belongsTo(TypeMaintenance::class);
    }
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }
    public function fournisseur()
    {
        return $this->belongsTo(Vendor::class);
    }
}
