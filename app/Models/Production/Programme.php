<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;
    protected $fillable = [
        'heure_debut', 'date', 'duree', 'denomination', 'description', 'idCommande',
        'idProduit'];
}
