@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Marcas</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active"><a href="{{ route('marcaC') }}">Marcas</a></li>
    <li class="breadcrumb-item active">Editar Marca</li>
@endsection
@section('ActiveCata') nav-link active @endsection
@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveMarcas') nav-link active @endsection

@section('content')

@if(session()->has('info'))
    <div class="alert alert-success">{{session('info')}}</div>
@endif
<form method="POST" action="{{ route('agregarModificacionM', ''.$id.'') }}" enctype="multipart/form-data">
        @csrf @method('PATCH')
        <div class="row">
            
            <!-- left column -->
            <div class="col-md-12">
                <!------------------------------------------------ inicio datos  ----------------------------------->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos Basicos </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="etiqueta_producto">Nombre de la Marca*</label>
                                <input type="text" class="form-control {!! $errors->first('nombre_marca','is-invalid') !!}" id="nombre_marca" name="nombre_marca" value="{{$nombre_m}}"  placeholder="Marca" >
                                
                            </div>
                            {!! $errors->first('nombre_marca','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            
                            <div class="form-group">
                                <label >Descripción*</label>
                                <textarea class="form-control {!! $errors->first('descripcion_marca','is-invalid') !!}" rows="3" id="descripcion_marca" name="descripcion_marca"  placeholder="Descripción ..."> {{$descripcion}}</textarea>
                                
                            </div>
                            {!! $errors->first('descripcion_marca','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <div align="center" class="col-sm-offset-2 col-sm-12">
                                <label >Logotipo </label>
                                <div class="form-group">
                                    <img width="200px" height="300px" src="{{Storage::url($logotipo_m)}}" alt="Logotipo de la marca">
                                    <input type="hidden" id="imagen_actual" name="imagen_actual" value="{{$logotipo_m}}">
                                </div>
                                
                            </div>
                            <label >Agregar nueva imagen</label>
                                <div class="custom-file">
                                    <input type="file"  lang="es" class=" {!! $errors->first('imagen_marca','is-invalid') !!}" id="imagen_marca" name="imagen_marca" >
                                    
                                </div>
                                {!! $errors->first('imagen_marca','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>:message</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>') !!}
                        </div>
                        <!-- /.card-body -->
                        <div align="center" class="col-sm-offset-2 col-sm-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" data-toggle="toggle" name="estado" id="estado"
                                    @if ($activo_m==1)
                                        checked
                                    @endif>
                                    Activado
                                </label>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Agregar Marca</button>
                                <a class="btn btn-danger" href="{{ route('marcaC') }}">  Cancelar</a>
                
                            </div>
                        </div>
                                    
                        
                </div>
            </div>
            
    </form>
@endsection