<?php

namespace App\Models\Rh;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends User
{
    protected $table="users";
    use HasFactory;

}
