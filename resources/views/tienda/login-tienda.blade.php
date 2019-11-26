@extends('layouts.app-usu')
@section('titulohome')
Iniciar sesión con su cuenta
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
                    <div class="newsletter"><p>Crystal <strong>Media</strong></p></div>
                    <form method="POST" action=" {{route('loginC_post')}}">
                        {{ csrf_field() }}
                        <input type="email" name="email" class="input" {!! $errors->first('email','is-invalid') !!}" value="{{old('email')}}" placeholder="Correo" required="required">
                        {!! $errors->first('email','<span class="alert alert-warning alert-dismissible">:message</span>') !!}
                        <p></p>
                        <input type="password" name="password" id="contrasena" class="input" {!! $errors->first('password','is-invalid') !!}" placeholder="Contraseña" required="required">
                        {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                        <p></p>
                        <div class="col-12" align="center">
                            <button type="submit" class="primary-btn order-submit">Iniciar Sesión</button>
                        </div>
                        <p></p>
                        
                        <div class="no-account">
                            <a href="{{route('registroC')}}" data-link-action="display-register-form">
                              ¿No tiene una cuenta? Cree una aquí
                            </a>
                        </div>
                            <!-- /.col -->
                    </form>
                
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

@endsection