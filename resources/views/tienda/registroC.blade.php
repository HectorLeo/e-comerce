@extends('layouts.app-usu')
@section('titulohome')
Crear una cuenta
@endsection
@section('iniciarsesion')
<li><a href="{{route('loginC')}}"><i class="fa fa-user-o"></i> Iniciar sesión </a></li>
@endsection
@section('lista')
    @foreach ( $datosC as $item_C )
        <li><a href="{{route('tiendaC', ''.$item_C->id_categoria.'')}}">{{$item_C->nombre_c}}</a></li>
    @endforeach 
@endsection
@section('content')
<!-- Aqui va ell contenido--> 
<div class="section" align="center">
        <!-- container -->
        <div class="container" align="center">
            <!-- row -->
            <div class="row" align="center">
                <!-- shop -->
                <div class="col-md-4 col-xs-6" align="center">
                    
                </div>
            <div class="col-md-4 col-xs-6" align="center">
                    <form method="POST" action=" {{route('guardarC')}}">
                        {{ csrf_field() }}
                        Nombre <input type="text" name="nombre" class="input"  placeholder="Nombre" required="required">
                        <p></p>
                        Apellido Paterno<input type="text" name="paterno" class="input"  placeholder="Apellido Paterno" required="required">
                        <p></p>
                        Apellido Materno<input type="text" name="materno" class="input"  placeholder="Apellido materno" required="required">
                        <p></p>
                        Telefono<input type="text" name="telefono" class="input"  placeholder="Telefono" required="required">
                        <p></p>
                        Dirección de correo electrónico<input type="email" name="email" class="input"  placeholder="Correo electrónico" required="required">
                        <p></p>
                        Contraseña<input type="password" name="password" class="input"  placeholder="Contraseña" required="required">
                        <p></p>
                        Confirmar Contraseña <input type="password" name="re_password" class="input"  placeholder="Contraseña" required="required">
                        <p></p>
                        <input type="hidden" name="id_rol" value="3"  required="required">
                        <div class="col-12" align="center">
                            <button type="submit" class="primary-btn order-submit">Guardar</button>
                        </div>
                        <p></p>
                            <!-- /.col -->
                    </form>
                
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

@endsection
