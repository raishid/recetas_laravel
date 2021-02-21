<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'url',
    ];

    //evento cuando se crea un usuario

    protected static function boot()
    {
        parent::boot();

        //asiganr perfil cuando se haya creado
        static::created(function ($user) {
            $user->perfil()->create();
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relacion de uno a muchos usuario a recetas

    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }

    //relacion de usuarioo a perfil

    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }

    //recetas que a dado likes

    public function meGusta()
    {
        return $this->belongsToMany(Receta::class, 'likes_receta');
    }
}
