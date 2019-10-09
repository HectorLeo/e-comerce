@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Categorías</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active"><a href="{{ route('producto') }}">Categorías</a></li>
    <li class="breadcrumb-item active">Agregar Categorías</li>
@endsection

@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveCategoria') nav-link active @endsection

@section('content')
<form method="POST" action="{{ route('categoria') }}" enctype="multipart/form-data">
        @csrf
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
                                <label for="etiqueta_producto">Nombre de la Categoría</label>
                                <input type="text" class="form-control" id="nombre_Categoria" name="nombre_categoria" placeholder="Categoría">
                            </div>
                            <div class="form-group">
                                <label >Categoría padre</label>
                                
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <select id="categoria_padre" name="categoria_padre"  class="form-control">
                                            <option value="" >Selecione una opción</option>
                                            @foreach ($datoscategoria as $item)
                                                <option value="{{$item->id_categoria}}" >{{$item->nombre_c}}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                
                            </div>
                            
                            <div class="form-group">
                                <label >Descripción</label>
                                <textarea class="form-control" rows="3" id="descripcion_categoria" name="descripcion_categoria" placeholder="Descripción ..."></textarea>
                                
                            </div>
                            
                            <div class="form-group">
                                <label >Agrege una imagen de la Categoría</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imagen_categoria" name="imagen_categoria">
                                        <label class="custom-file-label" for="imagen_categoria">Elige una imagen</label>
                                    </div>
                                    
                                </div>
                            </div>
                            
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
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="id_{{$item->rol}}" name="id{{$item->rol}}">
                                            <label for="id_{{$item->rol}}" class="custom-control-label">{{ $item->rol }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>  
                    <img width="100px" src="/storage/eezqmt8WKK6wwiwtkULzlxAqMMWDbiLownnPRhgP.png">
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
                                                <input type="checkbox" class="custom-control-input" id="estado_categoria" name="estado_categoria">
                                                <label class="custom-control-label" for="estado_categoria">Seleccione el estado de la categoría</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Agregar Categoría</button>
                            
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