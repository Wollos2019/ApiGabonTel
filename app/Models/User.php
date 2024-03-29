<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table="users";
    const STATUS = ['ENABLE','DISABLE'];
    const GENDER =['MALE','FEMALE'] ;
    const MARITAL = ['SINGLE','MARRIED','DIVORCE'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstname',
        'lastname',
        'birthday',
        'civilityId',
        'status',
        'cni',
        'isAdmin',
        'numberChild',
        'town',
        'country',
        'status',
        'address',
        'courriel',
        'cnps',
        'marital',
        'regionId',
        'phone',
        'photo',
        'placeBirth'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function families(){
        return $this->hasMany(Family::class,'userId','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function immatriculation(){
        return $this->belongsTo(Immatriculation::class,'userId','id');
    }
}
