<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;


    protected $fillable=['id','year','status','created_at','updated_at'];
    protected $appends=['appends'];

    public function holiDays(){
        return $this->hasMany(Holiday::class,'sessionId');
    }
    public function getAppendsAttribute(){
        return [
            'countHoliDay'=> $this->holiDays()->count()
        ];
    }

}
