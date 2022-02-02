<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $appends=['id','nom','description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * un service a un ou plusieurs division
     */
    public function divisions(){
        return $this->hasMany(Division::class,'serviceId','id');
    }
}
