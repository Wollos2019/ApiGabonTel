<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandesDetail extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'productName',
        'duree',
        'idProduct',
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
            'productCommande'=> $this->product()
        ];
    }
}
