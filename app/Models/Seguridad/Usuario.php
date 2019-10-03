<?php

namespace App\Models\Seguridad;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{   
    protected $remember_token = false;
    protected $table ='ussasasasasaauarios';
    protected $fillable = ['contrasena'];
    protected $guarded = ['correo'];
    protected $primaryKey = ['correo'];
}
