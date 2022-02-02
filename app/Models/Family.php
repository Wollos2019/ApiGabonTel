<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    const SEX=['HOMME','FEMME'];
    protected $fillable=['nom','prenom','sexe','acteNaissance','id','userId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }
}
