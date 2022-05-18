<?php

namespace App\Models;

use App\Models\Vehicule\Vehicule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panne extends Model
{
    use HasFactory;
    protected $table='Pannes';
    protected $fillable=[
        'id',
        'libellePanne',
        'descriptionPanne',
        'dateDebutPanne',
        'dateFinPanne',
        'coutMainOeuvre',
        'factureMainOeuvre',
        'vehiculeId',
    ];

    protected $appends=['appends'];

    public function panneVehicule(){
        return $this->belongsTo(Vehicule::class,'vehiculeId');
    }
}
