<?php

namespace App\Models;

use App\Models\Rh\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    const STATUS=['ENABLE','DISABLE'];
    protected $fillable=['id','name','description','status'];
    protected $appends=['appends'];
    public function employees(){
        return $this->belongsToMany(Employee::class,'user_department_fonction_contract','departmentId','userId')
            ->withPivot(['salary','dateStart','dateEnd','departmentId','fonctionId','status']);
    }

    public function getAppendsAttribute(){
        return [
            'countEmployee'=> $this->employees()->count(),
            'employees'=>$this->employees()->get()
        ];
    }
}
