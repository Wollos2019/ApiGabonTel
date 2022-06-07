<?php

namespace App\Models\Vehicule;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPermit extends Model
{
    use HasFactory;
    protected $table="category_permits";
    protected $fillable=[
        'libelle',

    ];
    //protected $appends=['appends'];



  public function Vehicules()
    {
       return $this->belongsToMany(Vehicule::class,'category_permit_vehicules','vehicule_Id','category_permit_id');

    }



   public function permit()
   {


       return$this->belongsToMany(Permit::class,'permit_category',
           'category_permit_id'
       )->withPivot(['numeroDossierPermis',
           'typeCategoriePermis','dateDebutPermis','dateFinPermis',
       ]);

   }

    public function getAppendsAttribute()
    {
        return[
            //'permis'=>$this->permis()->get(),
            // 'CategoryPermits'=>$this->CategoryPermit()->get(),
            //'compareDate'=>$this->compareDate(),


        ];

    }


}
