<?php

namespace App\Models\Vehicule;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permis extends Model
{
    use HasFactory;
    protected $table="permis";

    protected $fillable=[
        'id',
        'numeroPermis',
        'dateAcquisition',
        'userId',

    ];

    protected $appends=['appends'];

    public function user()
    {
        return $this->belongsTo(User::class,'userId','id');
    }



public function categoriePermis(){
        return$this->belongsToMany(CategoryPermit::class,'permis_categorie',
            'permis_id','categorie_permis_id'
        )->withPivot(['numeroDossierPermis',
              'typeCategoriePermis','dateDebutPermis','dateFinPermis',
              ]);

//   return $this->belongsToMany(Contract::class,'user_department_fonction_contract','userId','contractId')
//        ->withPivot(['salary','dateStart','dateEnd','departmentId','fonctionId','status']);

}

    public function getAppendsAttribute()
    {
        return[
            'user'=>$this->user()->first(),
            'categoriePermis'=>$this->categoriePermis()->get(),




        ];

    }


}
