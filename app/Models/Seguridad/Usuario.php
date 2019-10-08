<?php

namespace App\Models\Seguridad;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{   
    protected $remember_token = false;
    protected $table ='usuarios';
    protected $fillable = ['email','password'];
    protected $guarded = ['id_usuario'];
    protected $primaryKey = 'id_usuario';
}
