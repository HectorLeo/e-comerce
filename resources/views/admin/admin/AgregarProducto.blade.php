@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Productos</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active"><a href="{{ route('producto') }}">Producto</a></li>
    <li class="breadcrumb-item active">Agregar Producto</li>
@endsection

@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveProducto') nav-link active @endsection

@section('content')
<form method="POST" action="{{ route('producto') }}">
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
                                <label for="etiqueta_producto">Nombre del Producto</label>
                                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Producto">
                            </div>
                            <div class="form-group">
                                <label >Referencia</label>
                                <input type="text" class="form-control" id="referencia_producto" name="referencia_producto" placeholder="Referencia">
                            </div>
                            <div class="form-group">
                                <label >Resumen</label>
                                <input type="text" class="form-control" id="resumen_producto" name="resumen_producto" placeholder="Resumen">
                            </div>
                            <div class="form-group">
                                <label >Descripción</label>
                                <textarea class="form-control" rows="3" id="descripcion_producto" name="descripcion_producto" placeholder="Descripción ..."></textarea>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Cantidad de productos existentes</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="cantidad_existencia" name="cantidad_existencia" value="0">
                                        </div>
                                    </div>
                                </div>    
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Cantidad minima de venta</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="cantidad_existencia" name="cantidad_existencia" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label >Agrege una imagen del producto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imagen_producto">
                                        <label class="custom-file-label" for="exampleInputFile">Elige una imagen</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        
                </div>
            </div>
            <!------------------------------------------------ fin datos  --------------------------------------->

            <!------------------------------------------------ inicio precio  ----------------------------------->
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Precio </h3>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <label >Sin impuestos</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" id="precio_sin_impuesto" name="precio__sin_impuesto"  placeholder="00.00">
                                    <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                    <label >Con impuestos</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" id="precio_con_impuesto" name="precio__con_impuesto" readonly>
                                        <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                            <!-- /.col-lg-6 -->
                        </div>
                        <div class="form-group">
                            <label>Impuesto</label>
                            
                            <select id="lista_impuestos" name="lista_impuestos"  class="form-control">
                                <option value="0" >Sin impuestos</option>
                                <option value="1"  selected="selected">IVA (16%)</option>
                            </select>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-lg-6">
                                    <label >Por Mayoreo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" id="precio_mayoreo" name="precio_mayoreo" placeholder="0,000">
                                        <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                        <label >Por Mayoreo con impuestos</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" id="precio_impuesto_mayoreo" name="precio_impuesto_mayoreo" readonly>
                                            <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <div class="form-group">
                                <label>Impuesto por Mayoreo</label>
                                
                                <select id="lista_impuestos" name="lista_impuestos"  class="form-control">
                                    <option value="0" >Sin impuestos</option>
                                    <option value="1"  selected="selected">IVA (16%)</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label >Cantidad de productos para aplicar el Precio de Mayoreo</label>
                                <div class="col-lg-4">
                                    <input type="number" class="form-control" id="cantidad_mayoreo" name="cantidad_mayoreo" value="0">
                                </div>
                            </div>
        
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!------------------------------------------------ fin precio --------------------------------------->

            <!------------------------------------------------ inicio Categoria ----------------------------------->
            <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title">Categoria </h3>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <label >Sin impuestos</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" id="precio_sin_impuesto" name="precio__sin_impuesto"  placeholder="00.00">
                                        <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                        <label >Con impuestos</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" id="precio_con_impuesto" name="precio__con_impuesto" readonly>
                                            <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <div class="form-group">
                                <label>Impuesto</label>
                                
                                <select id="lista_impuestos" name="lista_impuestos"  class="form-control">
                                    <option value="0" >Sin impuestos</option>
                                    <option value="1"  selected="selected">IVA (16%)</option>
                                </select>
                            </div>
                            <hr>
                            <div class="row">
                                    <div class="col-lg-6">
                                        <label >Por Mayoreo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" id="precio_mayoreo" name="precio_mayoreo" placeholder="0,000">
                                            <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                            <label >Por Mayoreo con impuestos</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" id="precio_impuesto_mayoreo" name="precio_impuesto_mayoreo" readonly>
                                                <div class="input-group-append">
                                                        <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                    <!-- /.col-lg-6 -->
                                </div>
                                <div class="form-group">
                                    <label>Impuesto por Mayoreo</label>
                                    
                                    <select id="lista_impuestos" name="lista_impuestos"  class="form-control">
                                        <option value="0" >Sin impuestos</option>
                                        <option value="1"  selected="selected">IVA (16%)</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label >Cantidad de productos para aplicar el Precio de Mayoreo</label>
                                    <div class="col-lg-4">
                                        <input type="number" class="form-control" id="cantidad_mayoreo" name="cantidad_mayoreo" value="0">
                                    </div>
                                </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!------------------------------------------------ fin categoria --------------------------------------->

            <!------------------------------------------------ inicio transporte ----------------------------------->
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Transporte</h3>
                    </div>
                    <div class="card-body">
                            
                            <label >Dimenciones del paquete</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label > Anchura</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="anchura_producto" name="anchura_producto" value="0">
                                            <div class="input-group-append">
                                                    <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label > Altura</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="altura_producto" name="altura_producto" value="0">
                                            <div class="input-group-append">
                                                    <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label > Profundidad</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="profundidad_producto" name="profundidad_producto" value="0">
                                            <div class="input-group-append">
                                                    <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label > Peso</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="peso_producto" name="peso_producto" value="0">
                                            <div class="input-group-append">
                                                    <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label >Plazo de entrega</label>
                                <input type="text" class="form-control" id="plazo_entrega" name="plazo_entrega" placeholder="Ej: Entrega entre 3 y 4 días">
                            </div>
                            <hr>
                            <label > Gastos adicionales por el envio</label>
                            <div class="col-6">
                                <div class="form-group">
                                    
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="gastos_envio" name="gastos_envio" value="0.00">
                                        <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <hr>
                            
                            <label>Transportes Disponibles</label>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    @foreach ($datos as $item)
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1_{{$item->id_transporte}}" value="option1">
                                            <label for="customCheckbox1_{{$item->id_transporte}}" class="custom-control-label">{{ $item->nombre_transporte }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                           
                                
                    
                    </div>
                </div>
            </div>
            <!------------------------------------------------ fin transporte  ----------------------------------->

            <!------------------------------------------------ inicio dotones  ----------------------------------->
            <div class="col-md-12">
                    <div class="card card-info">
                        
                        <div class="card-body">
                            <label > Estado del producto</label>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="estado_producto" name="estado_producto" >
                                <label for="estado_producto" class="custom-control-label">Activo</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Producto</button>
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!------------------------------------------------ fin precio --------------------------------------->

        </div>
        
            
    </form>
@endsection