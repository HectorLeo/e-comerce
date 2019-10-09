<?php

namespace App\Models\Seguridad;

use App\Models\Admin\Rol;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{   
    protected $remember_token = false;
    protected $table ='usuarios';
    protected $fillable = ['email','password'];
    protected $guarded = ['id_usuario'];
    protected $primaryKey = 'id_usuario';
    
    public function roles(){
        return $this->belongsToMany(Rol::class,'clientes');
    }

    public function setSession($roles){
       
        if(count($roles)== 1){
            Session::put(
                [
                    'clave_rol' => $roles[0]['clave_rol'],
                    'rol' => $roles[0]['rol'],
                    'email' => $this->email,
                    'id_usuario' => $this->id_usuario,
                ]
            );
        }else{

        }
    }
}
