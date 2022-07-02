<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table='vendors';
    protected $fillable=[
        'libelleFournisseur',
        'telephone1',
        'telephone2',
        'addressFournisseur',
    ];
    protected $appends=['appends'];
    public function maintenanceVehicules()
    {
        return $this->hasMany(MaintenanceVehicule::class);
    }
    public function panne()
    {
        //breakdown
        return $this->belongsToMany(Panne::class,'fournisseur_pannes','fournisseurId','panneId')
            ->withPivot(['facture','coutPiece']);
    }

    public function getAppendsAttribute()
    {
        return[
            //'pannes'=>$this->panne()->get(),
            //'totalVehicule'=>$this->Vehicule()->count(),
            'totalFourniseur'=>Vendor::count(),




        ];

    }
}
