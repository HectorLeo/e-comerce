@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Marcas</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active">Marcas</a></li>
@endsection
@section('ActiveCata') nav-link active @endsection
@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveMarcas') nav-link active @endsection

@section('content')

@if(session()->has('info'))
    <div class="alert alert-success">{{session('info')}}</div>
@endif
<form method="POST" action="{{ route('Marca') }}" enctype="multipart/form-data">
        @csrf
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
                                <input type="text" class="form-control {!! $errors->first('nombre_categoria','is-invalid') !!}" id="nombre_marca" name="nombre_marca" placeholder="Marca" >
                                
                            </div>
                            {!! $errors->first('nombre_categoria','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Campo Obligatorio!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            
                            <div class="form-group">
                                <label >Descripción*</label>
                                <textarea class="form-control {!! $errors->first('descripcion_categoria','is-invalid') !!}" rows="3" id="descripcion_marca" name="descripcion_marca" placeholder="Descripción ..."></textarea>
                                
                            </div>
                            {!! $errors->first('descripcion_categoria','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Campo Obligatorio!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <div class="form-group">
                                <label >Agrege una imagen de la Marca*</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input {!! $errors->first('imagen_categoria','is-invalid') !!}" id="imagen_marca" name="imagen_marca">
                                        <label class="custom-file-label" for="imagen_categoria">Elige una imagen</label>
                                    </div>
                                    
                                </div>
                            </div>
                            {!! $errors->first('imagen_categoria','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                        </div>
                        <!-- /.card-body -->
                        <div align="center" class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" data-toggle="toggle" name="estado" id="estado">
                                    Activado
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                        
                </div>
            </div>
            
    </form>
@endsection