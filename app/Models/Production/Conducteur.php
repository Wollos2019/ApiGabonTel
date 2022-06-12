<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conducteur extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'idProgramme'];

    public function programme () {
        $this->hasMany(Programme::class);
    }
}


