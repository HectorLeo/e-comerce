@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Modificar Productos</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active"><a href="{{ route('producto') }}">Producto</a></li>
    <li class="breadcrumb-item active">Modificar Producto</li>
@endsection
@section('ActiveCata') nav-link active @endsection
@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveProducto') nav-link active @endsection

@section('content')
    <form method="POST" action="{{ route('editarProducto', ''.$id.'') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            
            <!-- left column --> 
            <!------------------------------------------------ inicio datos  ----------------------------------->
            <div class="col-md-6">
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos Basicos </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="etiqueta_producto">Nombre del Producto</label>
                                <input type="text" class="form-control {!! $errors->first('nombre_producto','is-invalid') !!}" id="nombre_producto" name="nombre_producto" value="{{$nombre_p}}" placeholder="Producto">
                            </div>
                            {!! $errors->first('nombre_producto','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <div class="form-group">
                                <label >Referencia</label>
                                <input type="text" class="form-control {!! $errors->first('referencia_producto','is-invalid') !!}" id="referencia_producto" name="referencia_producto" value="{{$referencia}}" placeholder="Referencia">
                            </div>
                            {!! $errors->first('referencia_producto','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <div class="form-group">
                                <label >Resumen</label>
                                <input type="text" class="form-control {!! $errors->first('resumen_producto','is-invalid') !!}" id="resumen_producto" name="resumen_producto" value="{{$resumen_producto}}" placeholder="Resumen">
                            </div>
                            {!! $errors->first('resumen_producto','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <div class="form-group">
                                <label >Descripción</label>
                                <textarea class="form-control {!! $errors->first('descripcion_producto','is-invalid') !!}" rows="3" id="descripcion_producto" name="descripcion_producto"  placeholder="Descripción ...">{{$descripcion_producto}}</textarea>
                                
                            </div>
                            {!! $errors->first('descripcion_producto','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Cantidad de productos existentes</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control {!! $errors->first('cantidad_existencia','is-invalid') !!}" id="cantidad_existencia" name="cantidad_existencia" value="{{$existencias}}" min="0" >
                                        </div>
                                    </div>
                                </div>
                                {!! $errors->first('cantidad_existencia','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>:message</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>') !!}     
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Cantidad minima de venta</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="cantidad_minima_venta" name="cantidad_minima_venta" value="{{$cantidad_minima}}" min="1" max="5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        
                </div>
                <!------------------------------------------------ inicio imagenes  ----------------------------------->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Imagenes del producto </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label >Imagen principal actual</label>
                                <div class="form-group">
                                    <img width="200px" src="{{Storage::url($imagen_p)}}" alt="Imagen de la categoria">
                                    <input type="hidden" id="imagen_actual" name="imagen_actual" value="{{$imagen_p}}">
                                </div>
                                <label >Seleccione una imagen para editar la Imagen principal actual </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="{!! $errors->first('imagen_producto','is-invalid') !!}" id="imagen_producto" name="imagen_producto" >
                                    </div>
                                </div>
                                {!! $errors->first('imagen_producto','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>:message</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>') !!} 
                            </div>
                            <hr>
                            @php
                                $i=0;
                            @endphp
                            <h2 align="center">Imagenes extras</h2>
                            @foreach ($datosimagenes as $item)
                                
                                    <div class="row field_wrapper2" style="border-style: double; border-width: 1px;">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label >Imagen extra</label>
                                                <div class="form-group">
                                                    <img width="100px" height="100px" src="{{Storage::url($item->url)}}" alt="Imagen de la categoria">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label >Seleccione una imagen para cambiarla</label>
                                                <div >
                                                    <div class="">
                                                        <input type="file" style="width: 100%" class="" id="imagen_editar_{{$i}}" name="imagen_editar_{{$i}}" >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <a href="javascript:void(0);" class="btn btn-danger remove_imagen" remove_imagen="{{$item->id_imagen_producto}}" name="remove_imagen" title="Remove field">Eliminar imagen</a>  
                                    </div>
                                    <input type="hidden"  id="imagen_extra_{{$i}}" name="imagen_extra_{{$i}}" value="{{$item->id_imagen_producto}}">
                                
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            <input type="hidden"  id="num_imagen" name="num_imagen" value="{{$i}}">
                            <hr>
                            <h4 align="center">Agregar Imagenes extras del producto</h4>
                            <div class="field_wrapper">
                                <div>
                                    <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field">Agregar imagen</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                </div>
            <!------------------------------------------------ fin imagenes  --------------------------------------->
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
                                    <input type="text" class="form-control" id="precio_sin_impuesto" name="precio_sin_impuesto" value="{{$precio_neto}}" placeholder="00.00">
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
                                        <input type="text" class="form-control" id="precio_con_impuesto" name="precio_con_impuesto" value="{{$precio_iva}}" readonly>
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
                                        <input type="text" class="form-control" id="precio_mayoreo" name="precio_mayoreo" value="{{$precio_mayoreo_psin}}" placeholder="0,000">
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
                                            <input type="text" class="form-control" id="precio_impuesto_mayoreo" name="precio_impuesto_mayoreo" value="{{$precio_mayoreo_pcon}}" readonly>
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
                                
                                <select id="lista_impuestos2" name="lista_impuestos2"  class="form-control">
                                    <option value="0" >Sin impuestos</option>
                                    <option value="1"  selected="selected">IVA (16%)</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label >Cantidad de productos para aplicar el Precio de Mayoreo</label>
                                <div class="col-lg-4">
                                    <input type="number" class="form-control" id="cantidad_mayoreo" name="cantidad_mayoreo" value="{{$cantidad_mayoreo}}" min="0">
                                </div>
                            </div>
        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!------------------------------------------------ inicio transporte ----------------------------------->
            
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
                                            <input type="text" class="form-control" id="anchura_producto" name="anchura_producto" value="{{$p_anchura}}">
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
                                            <input type="text" class="form-control" id="altura_producto" name="altura_producto" value="{{$p_altura}}">
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
                                            <input type="text" class="form-control" id="profundidad_producto" name="profundidad_producto" value="{{$p_profundidad}}">
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
                                            <input type="text" class="form-control" id="peso_producto" name="peso_producto" value="{{$p_peso}}">
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
                                <input type="text" class="form-control" id="plazo_entrega" name="plazo_entrega" value="{{$plazo_entrega_p}}" placeholder="Ej: Entrega entre 3 y 4 días">
                            </div>
                            <hr>
                            <label > Gastos adicionales por el envio</label>
                            <div class="col-6">
                                <div class="form-group">
                                    
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="gastos_envio" name="gastos_envio" value="{{$gasto_envio_p}}">
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
                                    
                                    @foreach ($datostransporte as $item)
                                        @php ($band=false)
                                        @foreach ($acti_transporte as $rolactivo)
                                            @if (($item->id_transporte)==($rolactivo->id_transporte))
                                                @php ($band=true)
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="id_{{$item->id_transporte}}" name="id{{$item->id_transporte}}" checked>
                                                    <label for="id_{{$item->id_transporte}}" class="custom-control-label">{{ $item->nombre_transporte }}</label>
                                                </div>
                                                
                                            @endif
                                            
                                        @endforeach
                                        @if ($band!=true)
                                            <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="id_{{$item->id_transporte}}" name="id{{$item->id_transporte}}" >
                                                    <label for="id_{{$item->id_transporte}}" class="custom-control-label">{{ $item->nombre_transporte }}</label>
                                                </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            
                        
                                
                    
                    </div>
                </div>
            
            <!------------------------------------------------ fin transporte  ----------------------------------->
            </div>
            <!------------------------------------------------ fin precio --------------------------------------->
            
            <!------------------------------------------------ inicio Categoria ----------------------------------->
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Categoria </h3>
                    </div>
                    <div class="card-body">
                       
                        <div class="form-group">
                                <label >Seleccione la Categoría*</label>
                                
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <select id="categoria" name="categoria"  class="form-control {!! $errors->first('categoria','is-invalid') !!}">
                                            <option value="" >Selecione una opción</option>
                                            @foreach ($datoscategoria as $item)
                                                @if ($id_categoria==$item->id_categoria)
                                                    <option value="{{$item->id_categoria}}" selected >{{$item->nombre_c}}</option>
                                                @else
                                                    <option value="{{$item->id_categoria}}" >{{$item->nombre_c}}</option>
                                                @endif
                                                
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    {!! $errors->first('categoria','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>:message</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>') !!} 
                                
                            </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Marca </h3>
                        </div>
                        <div class="card-body">
                           
                            <div class="form-group">
                                    <label >Seleccione la Marca</label>
                                    
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <select id="marca" name="marca"  class="form-control {!! $errors->first('marca','is-invalid') !!}">
                                                <option value="" >Selecione una opción</option>
                                                @foreach ($datosmarcas as $item)
                                                    
                                                    @if ($id_marca==$item->id_marca)
                                                        <option value="{{$item->id_marca}}" selected>{{$item->nombre_m}}</option>
                                                    @else
                                                        <option value="{{$item->id_marca}}" >{{$item->nombre_m}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        {!! $errors->first('marca','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>:message</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>') !!} 
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
            </div>
            <!------------------------------------------------ fin categoria --------------------------------------->
            <!------------------------------------------------ roles  ----------------------------------->
            
        <!------------------------------------------------ fin roles  --------------------------------------->
        <!------------------------------------------------ inicio botones  ----------------------------------->
        <div class="col-md-12">
                <div class="card card-info">
                    
                    <div class="card-body">
                        

                        <div class="row">
                                <div class="col-6">
                                    <div class="checkbox">
                                               
                                        <label>
                                            Seleccione el estado del producto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" data-toggle="toggle" name="estado_product" id="estado_product" 
                                            >
                                            
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Modificar Producto</button>
                                        <a class="btn btn-danger" href="{{ route('producto') }}">  Cancelar</a>
                        
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                    
                    <!-- /.card-body -->
                </div>
            </div>
            <!------------------------------------------------ fin botones --------------------------------------->

        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/producto.js') }}"></script>
    <script  type="text/javascript">
 
        $(document).ready(function(){
            var maxField = 5; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var eliminar_imagen = $('.field_wrapper2');
            var x = $("#num_imagen").val(); //Initial field counter is 1
            
            $(addButton).click(function(){ //Once add button is clicked
                if(x < maxField){ //Check maximum number of input fields
                     
                    var fieldHTML = '<div><input type="file" style="width: 80%" class="" id="imagen_editar_'+x+'" name="imagen_editar_'+x+'" required><a href="javascript:void(0);" class="btn btn-danger remove_button" title="Remove field">Eliminar</a><br/><br/></div>'; //New input field html 
                    $(wrapper).append(fieldHTML); // Add field html
                    $("#num_imagen").val(x);
                    x++;//Increment field counter
                    
                }
            });
            $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
                $("#num_imagen").val(x);
            });
            $(eliminar_imagen).on('click', '.remove_imagen', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
                $("#num_imagen").val(x);
                
            });
        });
    </script>
    <script  type="text/javascript">
       $(document).ready(function () {
        $("#precio_sin_impuesto").keyup(function () {
            //var impuesto = $("#lista_impuestos").val();
            var impuesto = $("#lista_impuestos option:selected").val();
            if(impuesto!=0){
                var porcentaje = ($(this).val() * impuesto) / 100;
                var value = (parseFloat($(this).val() ) + parseFloat(porcentaje));
                $("#precio_con_impuesto").val(value);
            }
            else{
                var value = $(this).val() ;
                $("#precio_con_impuesto").val(value);
            }
           
        });
        $("#lista_impuestos").click(function () {
            var precio = $("#precio_sin_impuesto").val();
            var impuesto= $(this).val()
            if(impuesto!=0){
                var porcentaje = (precio * impuesto) / 100;
                var value = (parseFloat(precio) + parseFloat(porcentaje)) ;
                $("#precio_con_impuesto").val(value);
            }
            else{
                $("#precio_con_impuesto").val(precio);
            }
        });
        });
        
    </script>
    <script  type="text/javascript">//mayoreo
        $(document).ready(function () {
         $("#precio_mayoreo").keyup(function () {
             //var impuesto = $("#lista_impuestos").val();
             var impuesto = $("#lista_impuestos2 option:selected").val();
             if(impuesto!=0){
                 var porcentaje = ($(this).val() * impuesto) / 100;
                 var value = (parseFloat($(this).val() ) + parseFloat(porcentaje));
                 $("#precio_impuesto_mayoreo").val(value);
             }
             else{
                 var value = $(this).val() ;
                 $("#precio_impuesto_mayoreo").val(value);
             }
            
         });
         $("#lista_impuestos2").click(function () {
             var precio = $("#precio_mayoreo").val();
             var impuesto= $(this).val()
             if(impuesto!=0){
                 var porcentaje = (precio * impuesto) / 100;
                 var value = (parseFloat(precio) + parseFloat(porcentaje)) ;
                 $("#precio_impuesto_mayoreo").val(value);
             }
             else{
                 $("#precio_impuesto_mayoreo").val(precio);
             }
         });
         });
         
     </script>
    
@endsection