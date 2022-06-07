<?php

namespace App\Models;

use App\Models\Vehicule\Vehicule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panne extends Model
{
    use HasFactory;
    protected $table='pannes';
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

    public function Vehicule(){
        return $this->belongsTo(Vehicule::class,'vehiculeId');
    }
    public function vendor()
    {
        return $this->belongsToMany(Vendor::class,'fournisseur_pannes','panneId','fournisseurId')
            ->withPivot(['facture','coutPiece']);
    }

    public function getAppendsAttribute()
    {
        return[
            'fournisseurs'=>$this->vendor()->get(),
            'Vehicule'=>$this->Vehicule()->first(),
            //'totalVehicule'=>$this->Vehicule()->count(),
            'totalPanne'=>Panne::count(),




        ];

    }

}
