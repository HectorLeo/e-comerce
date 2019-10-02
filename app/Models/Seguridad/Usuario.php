<?php

namespace App\Models\Seguridad;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{   
    protected $remember_token = false;
    protected $table ='usuarios';
    protected $fillable = ['correo', 'contrasena'];
    protected $guarded = ['correo'];
}
