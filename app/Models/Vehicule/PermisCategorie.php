<?php

namespace App\Models\Vehicule;

use Carbon\Carbon;
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
        'Permit_Id',
        'category_permit_id',

    ];

    protected $appends=['appends'];

    public function CategoryPermit(){
        return $this->hasMany(CategoryPermit::class,'category_permit_id','id');
    }


    public function permit(){
        return $this->hasMany(Permit::class,'Permit_Id','id');
    }




    public function getAppendsAttribute()
    {
        return[
            //'permis'=>$this->permis()->get(),
           // 'CategoryPermits'=>$this->CategoryPermit()->get(),



        ];

    }
}
