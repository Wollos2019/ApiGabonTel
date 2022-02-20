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
        return $this->hasMany(Employee::class,'departmentId','id');
    }

    public function getAppendsAttribute(){
        return ['countEmployee'=>$this->employees()->count()];
    }
}
