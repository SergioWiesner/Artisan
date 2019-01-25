<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'email_verified_at', 'password', 'telefono', 'documento', 'tipodocumento', 'direccion',
        'ciudad', 'nivelaccesso', 'estado', 'remember_token', 'tipousuario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function perfiles()
    {
        return $this->belongsToMany('App\Perfiles', 'perfiles_users', 'perfiles_id', 'id');
    }

    public function tipodocumento()
    {
        return $this->belongsTo('App\TipoDocumento', 'tipodocumento', 'id');
    }

    public function bodegas()
    {
        return $this->belongsToMany('App\bodegas', 'bodegas_user', 'user_id', 'bodegas_id');
    }

    public function compras()
    {
        return $this->hasMany('App\Ventas', 'idcliente', 'id');
    }

    public function ventas()
    {
        return $this->hasMany('App\Ventas', 'idvendedor', 'id');
    }
}
