<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionUsuario;
use App\Models\Admin\Clientes;
use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;
use DB;

class UsuarioController extends Controller
{
    public function index()
    {
        $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
        $cart = \Session::get('cart');
        return view('tienda.registroC',compact('cart','datosC'));
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
        $emai =  request('email');

        $datos = DB::table('usuarios')->where('email','=',''.$emai.'')->get();
        $id_u = "";
        foreach($datos as $item){
            $id_u = $item->id;
          }
    
        Clientes:: create ([
            'usuario_id' => $id_u,
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
