<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereIn(string $string, $days)
 * @method static whereNotIn(string $string, $days)
 */
class workingDay extends Model
{
    use HasFactory;
    protected$fillable=['departureTime','day','arrivingTime','status','name'];
    protected $casts=['departureTime'=>'date:hh:mm','arrivingTime'=>'date:hh:mm'];
}
