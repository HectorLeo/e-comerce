<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "rol";
    protected $fillable = ['clave_rol','rol'];
    //protected $guarded = ['clave_rol'];
    protected $primaryKey = 'clave_rol';
}
