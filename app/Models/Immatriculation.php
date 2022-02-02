<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immatriculation extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'cv',
        'cni',
        'contratEmbaiuche',
        'diplome',
        'attestationsCV',
        'acteMariage',
        'photo',
        'acteNaissance',
        'casierJudiciere',
        'userId',
        'matricule'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * un Immatriculation appartient a un utilisateur
     */
    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }
}
