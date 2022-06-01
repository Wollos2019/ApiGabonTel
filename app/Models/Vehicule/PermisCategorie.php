<?php

namespace App\Models\Vehicule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisCategorie extends Model
{
    use HasFactory;
    protected $table="permit_category";

    protected $fillable=[
        'numeroDossierPermis',
        'typeCategoriePermis',
        'dateDebutPermis',
        'dateFinPermis',
        'Permis_Id',
        'categorie_permis_Id',

    ];

    protected $appends=['appends'];

    public function CategoriePermis(){
        return $this->hasMany(CategoryPermit::class,'categorie_permis_Id','id');
    }
    public function permis(){
        return $this->hasMany(Permit::class,'Permis_Id','id');
    }


    public function getAppendsAttribute()
    {
        return[
            //'permis'=>$this->permis()->get(),
            'CategoryPermit'=>$this->CategoriePermis()->get(),


        ];

    }
}
