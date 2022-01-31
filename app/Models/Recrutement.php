<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recrutement extends Model
{
    use HasFactory;
    const TYPE_CONTRAT=['CDI','CDD'];
    const TYPE_EXPERIENCE=['MOIS','JOUR','ANNEE'];
    protected $fillable=[
        'id',
        'poste',
        'experienceProfessionnelle',
        'experiencetype',
        'typeContrat',
        'nationalite',
        'ageLimite',
        'nombrePoste',
        'noteServiceDg',
        'dateEntretien',
        'dateLimiteCandidature',
        'dateTestPsychotechnique',
        'profilId'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public  function profil(){
        return $this->belongsTo(Profil::class,'profilId');
    }

}
