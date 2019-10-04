<?php

namespace App\Models\Seguridad;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{   
    /*protected $remember_token = false;
    protected $table ='usuarios';
    protected $fillable = ['password'];
    protected $guarded = ['email'];
    protected $primaryKey = ['correo'];
*/
protected $table ='usuarios';
//use Notifiable;
/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $remember_token = false;
protected $fillable = ['email','password'];
//protected $guarded = ['email'];
}
