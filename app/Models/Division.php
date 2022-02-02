<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $appends=['id','nom','description','serviceId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * une division appartient a un service
     */
    public function service(){
        return $this->belongsTo(Service::class,'ServiceId');
    }

}
