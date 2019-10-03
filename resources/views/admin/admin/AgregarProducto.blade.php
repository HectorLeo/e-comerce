@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Inicio</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active">Agregar Producto</li>
@endsection

@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveProducto') nav-link active @endsection

@section('content')
    <form  method="">
        <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Correo">
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-envelope"></span>
            </div>
        </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Contraseña">
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-lock"></span>
            </div>
        </div>
        </div>
        <div class="row">
        
        <!-- /.col -->
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
        </div>
        <!-- /.col -->
        </div>
    </form>
@endsection