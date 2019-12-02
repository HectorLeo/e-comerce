@extends('layouts.app-client')
@section('iniciarsesion')
<li><a  href="{{route('cuenta')}}"><i class="fa fa-user-o"></i> {{session()->get('email') ?? 'Invitado'}} </a> <a href="{{route('logoutC')}}" class="btn btn-xs btn-danger">Salir</a></li>
@endsection
@section('category')
    @foreach ( $datosC as $item )
        <option value="0">{{$item->nombre_c}}</option>
    @endforeach 
@endsection
@section('lista')
    @foreach ( $datosC as $item )
        <li><a href="{{route('tCliente', ''.$item->id_categoria.'')}}">{{$item->nombre_c}}</a></li>
    @endforeach 
@endsection
@section('content')
<!-- SECTION -->
<div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-7">
                    <form method="POST" action=" {{route('editarU',''.$id.'')}}">
                        @csrf @method('PUT')
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">SUS DATOS PERSONALES</h3>
                            <input class="input" type="hidden" name="id" id="id" value="{{$id}}" required>
                        </div>
                        <div class="form-group">
                            Nombre: <input class="input" value="{{$nombre}}" type="text" name="nomre" id="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            Apellido Paterno:<input class="input" value="{{$apellidoP}}" type="text" name="paterno" id="paterno" placeholder="Apelllido Paterno" required>
                        </div>
                        <div class="form-group">
                            Apellido Materno:
                            <input class="input" value="{{$apellidoM}}" type="text" name="apellidoM" id="apellidoM" placeholder="Apellido Materno" required>
                        </div>
                        <div class="form-group">
                            Correo Electronico:<input  class="input" value="{{$correo}}" type="email" name="email" id="email" placeholder="Correo electronico" required>
                        </div>
                        <div class="form-group">
                            Telefono:<input class="input" value="{{$telefono}}" type="text" name="telefono" id="telefono" placeholder="telefono" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="password" name="password" id="contrasena" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <input class="input" type="password" name="re_password" id="re_password" placeholder="Confirma Contraseña">
                        </div>
                        <input type="hidden" name="id_rol" value="3"  required="required">
                    </div>
                    <!-- /Billing Details -->

                    <!-- Shiping Details -->
                    <!-- /Shiping Details -->

                    <!-- Order notes -->
                    <!-- /Order notes -->
                    <p></p>
                        <input type="hidden" name="id_rol" value="3"  required="required">
                        <div class="col-12" align="center">
                            <button type="submit" class="primary-btn order-submit">Guardar</button>
                        </div>
                    <p></p>
                </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection