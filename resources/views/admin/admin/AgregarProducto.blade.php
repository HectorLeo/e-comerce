@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Productos</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active"><a href="{{ route('producto') }}">Producto</a></li>
    <li class="breadcrumb-item active">Agregar Producto</li>
@endsection
@section('ActiveCata') nav-link active @endsection
@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveProducto') nav-link active @endsection

@section('content')
    <form method="POST" action="{{ route('agregarProducto') }}" enctype="multipart/form-data">
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
                                <input type="text" class="form-control {!! $errors->first('nombre_producto','is-invalid') !!}" id="nombre_producto" name="nombre_producto" placeholder="Producto" value="{{old('nombre_producto')}}">
                            </div>
                            {!! $errors->first('nombre_producto','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <div class="form-group">
                                <label >Referencia</label>
                                <input type="text" class="form-control {!! $errors->first('referencia_producto','is-invalid') !!}" id="referencia_producto" name="referencia_producto" placeholder="Referencia" value="{{old('referencia_producto')}}">
                            </div>
                            {!! $errors->first('referencia_producto','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <div class="form-group">
                                <label >Resumen</label>
                                <input type="text" class="form-control {!! $errors->first('resumen_producto','is-invalid') !!}" id="resumen_producto" name="resumen_producto" placeholder="Resumen" value="{{old('resumen_producto')}}">
                            </div>
                            {!! $errors->first('resumen_producto','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!}
                            <div class="form-group">
                                <label >Descripción</label>
                                <textarea class="form-control {!! $errors->first('descripcion_producto','is-invalid') !!}" rows="3" id="descripcion_producto" name="descripcion_producto" placeholder="Descripción ...">{{old('descripcion_producto')}}</textarea >
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
                                            <input type="number" class="form-control {!! $errors->first('cantidad_existencia','is-invalid') !!}" id="cantidad_existencia" name="cantidad_existencia" placeholder="0" value="{{old('cantidad_existencia')}}" min="0">
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
                                            <input type="number" class="form-control" id="cantidad_minima_venta" name="cantidad_minima_venta" value="1" min="1" max="5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label >Imagen principal del producto</label>
                                <div class="input-group">
                                    <div class="">
                                        <input type="file" class="{!! $errors->first('imagen_producto','is-invalid') !!}" id="imagen_producto" name="imagen_producto" value="{{old('imagen_producto')}}">
                                    </div>
                                    
                                </div>
                                {!! $errors->first('imagen_producto','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>:message</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>') !!} 
                                <hr>
                                <label >Agregar Imagenes extras del producto</label>
                                <div class="field_wrapper">
                                    <div>
                                        <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field">Agregar imagen</a>
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
                                    <input type="text" class="form-control {!! $errors->first('precio_sin_impuesto','is-invalid') !!}" id="precio_sin_impuesto" name="precio_sin_impuesto"  value="0.0" >
                                    <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                {!! $errors->first('precio_sin_impuesto','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>:message</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>') !!} 
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                    <label >Con impuestos</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" id="precio_con_impuesto" name="precio_con_impuesto" readonly value="0">
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
                            
                            <select id="lista_impuestos" name="lista_impuestos"  class="form-control" >
                                <option value="0" >Sin impuestos</option>
                                <option value="16"  selected="selected">IVA (16%)</option>
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
                                        <input type="text" class="form-control {!! $errors->first('precio_mayoreo','is-invalid') !!}" id="precio_mayoreo" name="precio_mayoreo" value="0" >
                                        <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    {!! $errors->first('precio_mayoreo','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>:message</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>') !!} 
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                        <label >Por Mayoreo con impuestos</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" id="precio_impuesto_mayoreo" name="precio_impuesto_mayoreo" readonly value="0" >
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
                                
                                <select id="lista_impuestos2" name="lista_impuestos2"  class="form-control" required>
                                    <option value="0" >Sin impuestos</option>
                                    <option value="16"  selected="selected">IVA (16%)</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label >Cantidad de productos para aplicar el Precio de Mayoreo</label>
                                <div class="col-lg-4">
                                    <input type="number" class="form-control" id="cantidad_mayoreo" name="cantidad_mayoreo" value="0" min="0" >
                                </div>
                            </div>
        
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!------------------------------------------------ fin precio --------------------------------------->
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
                                            <input type="text" class="form-control" id="anchura_producto" name="anchura_producto" value="0" >
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
                                            <input type="text" class="form-control" id="altura_producto" name="altura_producto" value="0" >
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
                                            <input type="text" class="form-control" id="profundidad_producto" name="profundidad_producto" value="0" >
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
                                            <input type="text" class="form-control" id="peso_producto" name="peso_producto" value="0" >
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
                                <input type="text" class="form-control" id="plazo_entrega" name="plazo_entrega" placeholder="Ej: Entrega entre 3 y 4 días" >
                            </div>
                            <hr>
                            <label > Gastos adicionales por el envio</label>
                            <div class="col-6">
                                <div class="form-group">
                                    
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="gastos_envio" name="gastos_envio" value="0.00" >
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
                                            <input class="custom-control-input" type="checkbox" id="id_{{$item->id_transporte}}" name="id_{{$item->id_transporte}}" >
                                            <label for="id_{{$item->id_transporte}}" class="custom-control-label">{{ $item->nombre_transporte }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        
                                
                    
                    </div>
                </div>
            </div>
            <!------------------------------------------------ fin transporte  ----------------------------------->
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
                                        <select id="categoria" name="categoria"  class="form-control {!! $errors->first('categoria','is-invalid') !!}" >
                                            <option value="" >Selecione una opción</option>
                                            @foreach ($datoscategoria as $item)
                                                @if (old('categoria')==($item->id_categoria))
                                                    <option value="{{$item->id_categoria}}" selected>{{$item->nombre_c}}</option>
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
                <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Marca </h3>
                        </div>
                        <div class="card-body">
                           
                            <div class="form-group">
                                    <label >Seleccione la Marca</label>
                                    
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <select id="marca" name="marca"  class="form-control {!! $errors->first('marca','is-invalid') !!}" >
                                                <option value="" >Selecione una opción</option>
                                                @foreach ($datosmarcas as $item)
                                                    @if (old('marca')==($item->id_marca))
                                                        <option value="{{$item->id_marca}}" selected>{{$item->nombre_m}}</option>
                                                    @else
                                                        <option value="{{$item->id_marca}}" >{{$item->nombre_m}}</option>
                                                    @endif
                                                    
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                </div>
                                {!! $errors->first('marca','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>:message</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>') !!} 
                        </div>
                        <!-- /.card-body -->
                    </div>
            </div>
            <!------------------------------------------------ fin categoria --------------------------------------->

            

            <!------------------------------------------------ roles  ----------------------------------->
            
        <!------------------------------------------------ fin roles  --------------------------------------->
        <!------------------------------------------------ inicio botones  ----------------------------------->
        <div align="center" class="col-sm-offset-2 col-sm-12">
                <div class="card card-info">
                    <div class="card-body">
                        <div class="row">
                                <div class="col-6">
                                    
                                    <div class="checkbox">
                                            <label>
                                                <input type="checkbox" data-toggle="toggle" name="estado_product" id="estado_product">
                                                Seleccione el estado del producto
                                            </label>
                                        </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Agregar Producto</button>
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

    <script  type="text/javascript">
 
        $(document).ready(function(){
            var maxField = 6; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var x = 0; //Initial field counter is 1
            
            
            $(addButton).click(function(){ //Once add button is clicked
                if(x < maxField){ //Check maximum number of input fields
                     
                    var fieldHTML = '<div><input type="file" class="" id="imagen_producto_'+x+'" name="imagen_producto_'+x+'" required><a href="javascript:void(0);" class="btn btn-danger remove_button" title="Remove field">Eliminar</a><br/><br/></div>'; //New input field html 
                    $(wrapper).append(fieldHTML); // Add field html
                    x++;//Increment field counter
                }
            });
            $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
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
