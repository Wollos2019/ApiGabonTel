<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workingDay extends Model
{
    use HasFactory;
    protected$fillable=['departureTime','day','arrivingTime','status','name'];
    protected $casts=['departureTime'=>'date:hh:mm','arrivingTime'=>'date:hh:mm'];
}
