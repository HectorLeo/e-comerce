@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Modificar Categoría</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item "><a href="{{ route('categoria') }}">Categorías</a></li>
    <li class="breadcrumb-item active">Modificar Categorías</li>
@endsection
@section('ActiveCata') nav-link active @endsection
@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveCategoria') nav-link active @endsection

@section('content')

@if(session()->has('info'))
    <div class="alert alert-success">{{session('info')}}</div>
@endif

<form method="POST" action="{{ route('agregarModificacion', ''.$id.'') }}" enctype="multipart/form-data">
        @csrf @method('PATCH')
        
        <div class="row">
            
            <!-- left column -->
            <div class="col-md-6">
                <!------------------------------------------------ inicio datos  ----------------------------------->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos Basicos </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="etiqueta_producto">Nombre de la Categoría*</label>
                            <input type="text" class="form-control {!! $errors->first('nombre_categoria','is-invalid') !!}" id="nombre_Categoria" name="nombre_categoria" value="{{$nombre_c}}" placeholder="Categoría" >
                                
                            </div>
                            {!! $errors->first('nombre_categoria','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Campo Obligatorio!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <div class="form-group">
                                <label >Categoría padre*</label>
                                
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <select id="categoria_padre" name="categoria_padre"  class="form-control {!! $errors->first('categoria_padre','is-invalid') !!}">
                                            <option value="" >Selecione una opción</option>
                                            @foreach ($datoscategoria as $item)
                                                @if ($tipo_c==$item->id_categoria)
                                                    <option value="{{$item->id_categoria}}" selected >{{$item->nombre_c}}</option>
                                                @else
                                                    <option value="{{$item->id_categoria}}" >{{$item->nombre_c}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                
                            </div>
                            {!! $errors->first('categoria_padre','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Campo Obligatorio!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <div class="form-group">
                                <label >Descripción*</label>
                            <textarea class="form-control {!! $errors->first('descripcion_categoria','is-invalid') !!}" rows="3" id="descripcion_categoria" name="descripcion_categoria"  placeholder="Descripción ...">{{$descripcion}}</textarea>
                                
                            </div>
                            {!! $errors->first('descripcion_categoria','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Campo Obligatorio!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <label >Imagen </label>
                            <div class="form-group">
                                <img width="200px" src="{{Storage::url($imagen_c)}}" alt="Imagen de la categoria">
                                <input type="hidden" id="imagen_actual" name="imagen_actual" value="{{$imagen_c}}">
                            </div>
                            <label >Agregar nueva imagen</label>
                            <div class="custom-file">
                                <input type="file"  lang="es" class="custom-file-input {!! $errors->first('imagen_categoria','is-invalid') !!}" id="imagen_categoria" name="imagen_categoria" >
                                <label class="custom-file-label" for="imagen_categoria">Elige una imagen</label>
                            </div>
                            
                            {!! $errors->first('imagen_categoria','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                        </div>
                        <!-- /.card-body -->

                        
                </div>
            </div>
            <!------------------------------------------------ fin datos  --------------------------------------->
             <!------------------------------------------------ roles  ----------------------------------->
             <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Accesos a la Categoría </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label >Seleccione los usuarios que tienen acceos a la categoría</label>
                                <!-- checkbox -->
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    
                                    @foreach ($datosroles as $item)
                                        @php ($band=false)
                                        @foreach ($roles as $rolactivo)
                                            @if (($item->clave_rol)==($rolactivo->clave_rol))
                                                @php ($band=true)
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="id_{{$item->rol}}" name="id{{$item->rol}}" checked>
                                                    <label for="id_{{$item->rol}}" class="custom-control-label">{{ $item->rol }}</label>
                                                </div>
                                                
                                            @endif
                                            
                                        @endforeach
                                        @if ($band!=true)
                                            <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="id_{{$item->rol}}" name="id{{$item->rol}}" >
                                                    <label for="id_{{$item->rol}}" class="custom-control-label">{{ $item->rol }}</label>
                                                </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                    </div>  
                    
            </div>
            <!------------------------------------------------ fin roles  --------------------------------------->
            <!------------------------------------------------ inicio botones  ----------------------------------->
            <div class="col-md-12">
                    <div class="card card-info">
                        
                        <div class="card-body">
                            

                            <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" class="custom-control-input" id="estado_categoria" name="estado_categoria" 
                                                @if ($mostrado_c==1)
                                                    checked
                                                @endif>
                                                <label class="custom-control-label" for="estado_categoria">Seleccione el estado de la categoría</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Modificar Categoría</button>
                                            <a class="btn btn-danger" href="{{ route('categoria') }}">  Cancelar</a>
                            
                                        </div>
                                    </div>
                                    
                                </div>
                        </div>
                        
                        <!-- /.card-body -->
                    </div>
                </div>
                <!------------------------------------------------ fin precio --------------------------------------->

        </div>
        
    </form>
@endsection