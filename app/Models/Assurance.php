<?php

namespace App\Models;

use App\Models\Vehicule\Vehicule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    use HasFactory;
    protected $table="assurances";

    protected $fillable=[

        'numeroPoliceAssurance',
        'dateDebutAssurance',
        'dateFinAssurance',
        'scanAssurance',
        'idVehicule'

    ];

    protected $appends=['appends'];



    public function vehicule(){
        return $this->belongsTo(Vehicule::class,'idVehicule');
    }

        public function compareDate(){
        $today= Carbon::now();
        if ($this->dateFinAssurance >$today){
            return 'encore valide';
        }elseif ($this->dateFinAssurance < $today){
            return  'expiree';
        }elseif ($this->dateFinAssurance == $today){
            return  'pensee a renouveller';
        }


        }





    public function getAppendsAttribute()
    {
        return[
            'vehicule'=>$this->vehicule()->first(),
            'url'=> $this->scanAssurance? asset('' . $this->scanAssurance):null,
            'compareDate'=>$this->compareDate(),
        ];

    }
}
