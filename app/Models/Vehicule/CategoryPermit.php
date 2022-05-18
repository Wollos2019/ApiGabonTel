<?php

namespace App\Models\Vehicule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriePermis extends Model
{
    use HasFactory;
    protected $table="categorie_permis";
    protected $fillable=[
        'libelle',

    ];
   // protected $appends=['appends'];



  public function Vehicules()
    {
       return $this->belongsToMany(Vehicule::class,'categorie_permi_vehicule','vehicule_Id','categorie_permis_Id');

    }

   public function permis()
   {


       return$this->belongsToMany(Permis::class,'permis_categorie',
           'categorie_permis_id'
       )->withPivot(['numeroDossierPermis',
           'typeCategoriePermis','dateDebutPermis','dateFinPermis',
       ]);

   }


}
