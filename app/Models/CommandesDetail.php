<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandesDetail extends Model
{
    use HasFactory;
    //protected $table = 'commandes-details';
    protected $fillable = [
        'productName',
        'quantity',
        'idProduct',
        'idCommande'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
