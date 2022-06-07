<?php

namespace App\Models\Vehicule;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permit extends Model
{
    use HasFactory;
    protected $table="permits";

    protected $fillable=[
        'id',
        'numeroPermis',
        'dateAcquisition',
        'userId'];

   protected $appends=['appends'];

    public function user()
    {
        return $this->belongsTo(User::class,'userId','id');
    }



public function categoryPermit(){
        return$this->belongsToMany(CategoryPermit::class,'permit_category',
            'permit_Id','category_permit_id'
        )->withPivot(['numeroDossierPermis',
              'typeCategoriePermis','dateDebutPermis','dateFinPermis',
              ]);

//   return $this->belongsToMany(Contract::class,'user_department_fonction_contract','userId','contractId')
//        ->withPivot(['salary','dateStart','dateEnd','departmentId','fonctionId','status']);

}

    public function compareDate(){

        $pit = DB::table('permit_category')->where('permit_id','=',$this->id)->get();

        $cat=[];
        foreach ($pit as $key=>$item){
            $cat[$key]=['cat'=>$item->category_permit_id,'expire'=>$this->expire($item->dateFinPermis)];
        }

      return $cat;


    }
    public function expire($datePermi){
        $today= Carbon::now();
        if ($datePermi <=$today){
           return true ;
       }else{
           return false;
        }
    }



    public function getAppendsAttribute()
    {
        return[
            'user'=>$this->user()->first(),
            'categoriePermit'=>$this->categoryPermit()->get(),
            'totalPermit'=> Permit::count(),
            'expireCategories'=>$this->compareDate()




        ];

    }




}
