<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'productName',
        'description',
        'price'
    ];

    public function commandesDetail() {
        return $this->belongsTo(commandesDetail::class);
    } 
}
