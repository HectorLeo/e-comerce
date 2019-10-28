<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionUsuario;
use App\Models\Admin\Clientes;
use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('tienda.registroC');
    }

    public function crear()
    {
        //
    }

    public function guardar(ValidacionUsuario $request)
    {
        $usuario = Usuario::create($request->all());
        $estado=1;
        $rol=3;
        
        Clientes:: create ([
            'nombre' =>  request('nombre'),
            'a_paterno' => request('paterno'),
            'a_materno' => request('materno'),
            'telefono' => request('telefono'),
            'rol_clave_rol' => $rol,
            'estado' => $estado
        ]);
        return redirect()->route('loginC'); 
    }
    
    public function editar($id)
    {
        //
    }

    public function actualizar(Request $request, $id)
    {
        //
    }

    public function eliminar($id)
    {
        //
    }
}
