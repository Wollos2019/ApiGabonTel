<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandesDetail extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'date_debut',
        'productName',
        'description',
        'duree',
        'idProduct',
        'heure_debut',
        'idCommande',
        'frequence',
        'prix'
        
    ];
    protected $appends=['appends'];

    public function product() {
        return $this->belongsTo(Product::class, 'idProduct')->value('price');
    }

    public function getAppendsAttribute(){
        return [
            'productPrice'=> $this->product()
        ];
    }
}
