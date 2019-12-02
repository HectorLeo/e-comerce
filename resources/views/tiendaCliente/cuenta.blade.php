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
                <div class="links">
                    <a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="identity-link" href="{{route('editarUsuario', session()->get('email'))}}">
                      <span class=".glyphicon .glyphicon-user">
                        
                      </span>
                      Información
                    </a>
                </div>
                <div class="links">
                    <a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="identity-link" href="#">
                      <span class=".glyphicon .glyphicon-user">
                        
                      </span>
                      Historial y detalles de mis pedidos
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>44</h3>
        
                        <p>User Registrations</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <a  align align=center  href="{{route('cajaC')}}" class="primary-btn order-submit">Cerrar sesión</a>
    <!-- /SECTION -->
@endsection