<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;
    const STATUS=['ENABLE','DISABLE'];
    protected $fillable=['id','name','description','status'];
}
