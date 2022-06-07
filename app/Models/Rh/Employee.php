<?php

namespace App\Models\Rh;

use App\Models\Civility;
use App\Models\Contract;
use App\Models\Department;
use App\Models\Fonction;
use App\Models\User;
use App\Models\Vehicule\Permit;
use App\Scopes\Rh\EmployeeScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends User
{
    protected $table="users";
    protected $appends=['appends'];
    use HasFactory;

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::addGlobalScope(new EmployeeScope());
    }

    public function civility(){
         return $this->belongsTo(Civility::class,'civilityId','id','civilities');
    }

    public function permis()
    {
        return $this->hasMany(Permit::class,'permis_id','id');
    }

    public function contracts(){
        return $this->belongsToMany(Contract::class,'user_department_fonction_contract','userId','contractId')
            ->withPivot(['salary','dateStart','dateEnd','departmentId','fonctionId','status']);
       // 'status'
    }


    public function getAppendsAttribute(){
        return [
            'url'=> $this->photo? asset('' . $this->photo):null,
            'name'=> $this->civility()->first()? $this->civility()->first()->abbreviation.". ".$this->lastname:$this->lastname,
             'contracts'=>$this->contracts()->get()


        ];
    }

}
