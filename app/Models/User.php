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

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'users';
    protected $fillable = [
        'nombre', 'apellido', 'cedula', 'email', 'usuario', 'password', 'estatus', /*'us_rol_id'*/
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
      public function departamentos()
    {
        return $this->belongsToMany(Departamento::class, 'usuario_x_departamentos' , 'usxdp_uscedula', 'usxdp_dpid');
    }

        public function rols()
    {
        return $this->belongsTo(rol::class, 'us_rol_id');
    }

   public function tipo(){
        
      return $this->belongsTo(TipoUsuario::class, 'us_tu_id');

    }
    public function acceso_cliente()
    {
        return $this->belongsTo(AccesoCliente::class, 'acl_us_id');
    }

          public function auditoria()
    {
        return $this->belongsTo(Auditoria::class, 'au_us_id');
    }
}
