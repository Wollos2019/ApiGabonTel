<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conducteur extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'idProgramme'];

    protected $with= ['Programme'];

    public function programme () {
        return $this->hasMany(Programme::class);
    }

    public function getProgrammeAttribute()
    {
        return $this->programme();
    }
}


