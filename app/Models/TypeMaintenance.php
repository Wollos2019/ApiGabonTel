<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMaintenance extends Model
{
    use HasFactory;
    protected $table='type_entretiens';
    protected $fillable=[
        'libelleTypeEntretien',
        'descriptionTypeEntretien',
        'unitMesureId',

    ];
    protected $appends=['appends'];

    public function entretienVehicules()
    {
        return $this->hasMany(MaintenanceVehicule::class);
    }
}
