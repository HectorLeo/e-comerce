@extends('layouts.app')


@section('titulohome')
    <h1 class="m-0 text-dark">Transportista</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active"><a href="{{ route('transporteC') }}">Transportista</a></li>
    <li class="breadcrumb-item active">Editar transportista</li>
@endsection
@section('ActiveTrans') nav-link active @endsection
@section('Activetransporte') nav-item has-treeview menu-open @endsection
@section('Activetransportistas') nav-link active @endsection

@section('content')

<form method="POST" action="{{ route('agregarModificacionT', ''.$id.'') }}" enctype="multipart/form-data">
    @csrf @method('PATCH')
    <div class="row">
        
        <!-- left column -->
        <div class="col-md-6">
            <!------------------------------------------------ inicio datos  ----------------------------------->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Configuracion general </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="etiqueta_producto">Nombre del Transportista</label>
                            <input type="text" class="form-control  {!! $errors->first('nombre_transporte','is-invalid') !!}" id="nombre_transporte" name="nombre_transporte" value="{{$nombre_t}}"placeholder="Transporte">
                        </div>
                        {!! $errors->first('nombre_transporte','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!} 
                        <div class="form-group">
                            <label >Tiempo de transito</label>
                            <input type="text" class="form-control {!! $errors->first('retraso_transporte','is-invalid') !!}" id="retraso_transporte" name="retraso_transporte" value="{{$retraso}}" placeholder="Tiempo de Transito">
                        </div>
                        {!! $errors->first('retraso_transporte','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!} 
                        <div class="form-group">
                            <label >Logotipo</label>
                            <div class="form-group">
                                <img width="200px" src="{{Storage::url($logotipo)}}" alt="Imagen de el transporte">
                                <input type="hidden" id="imagen_actual" name="imagen_actual" value="{{$logotipo}}">
                            </div>
                            
                            <label >Agregar nueva imagen</label>
                            <div class="custom-file">
                                <input type="file"  lang="es" class=" {!! $errors->first('imagen_logotipo','is-invalid') !!}" id="imagen_logotipo" name="imagen_logotipo" >
                                
                            </div>
                            {!! $errors->first('imagen_logotipo','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>:message</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>') !!} 
                        </div>
                        <div class="col-lg-6">
                                <label >Costo del transportista</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text " >$</span>
                                    </div>
                                    <input type="text" class="form-control {!! $errors->first('costo_transporte','is-invalid') !!}" id="costo_transporte" name="costo_transporte" placeholder="costo del transporte" value="{{$precio_t}}">
                                </div>
                                <!-- /input-group -->
                            </div>
                        {!! $errors->first('costo_transporte','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>:message</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>') !!} 
                    </div>
                     <!-- /.card-body -->

                        
                </div>
            </div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="col-md-6">
        <div class="card card-info">
                <div class="card-header">
                <h3 class="card-title">Localizacion de destino y gastos de envio </h3>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" data-toggle="toggle" id="impuestos" name="impuestos"
                                                @if ($estado_im==1)
                                                    checked
                                                @endif>
                                                Impuestos
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6"> 
                                <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label id="val-boton">
                                                    <input type="checkbox" data-toggle="toggle" name="envio_g" id="envio_g"
                                                    @if ($envio==1)
                                                        checked
                                                    @endif>
                                                    Envío gratuito
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                <!-- /input-group -->
                            </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <div class="form-group">
                        <label>Facturacion</label>
                        <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio"
                                 @if ($facturacion==0)
                                    checked
                                @endif  value="0">
                                <label for="customRadio1" class="custom-control-label">En función del precio total.</label>
                        </div>
                        <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" 
                                @if ($facturacion==1)
                                    checked
                                @endif value="1">
                                <label for="customRadio2" class="custom-control-label">En función del peso total.</label>
                        </div>
                    </div>
                    <hr>
                        <div class="form-group">
                            <label>Impuestos</label>
                            <select id="lista_impuestos" name="lista_impuestos"  class="form-control">
                                <option value="0"
                                @if ($impuestos==0)
                                    selected="selected"
                                @endif >Sin impuestos</option>
                                <option value="11" 
                                @if ($impuestos==11)
                                    selected="selected"
                                @endif >MX Reduce Rate (11%)</option>
                                <option value="16" 
                                @if ($impuestos==16)
                                    selected="selected"
                                @endif >MX Reduce Rate (16%)</option>
                            </select>
                        </div>
                        <div class="form-group">
                                <label>Fuera de la gama de comportamiento</label>
                                <select id="rango_comportamiento" name="rango_comportamiento"  class="form-control">
                                    <option value="0"
                                    @if ($frango==0)
                                        selected="selected"
                                    @endif >Aplicar el coste mas alto de la gama definida</option>
                                    <option value="1"
                                    @if ($frango==1)
                                        selected="selected"
                                    @endif >Desactivar transportista</option>
                                </select>
                        </div>
                        <hr>
                        <label aling="center" >Rango</label>
                        <div class="row">
                                <div class="col-lg-6">
                                    <label id="eti-1">Será aplicado cuando el peso sea >=</label>
                                    <div class="input-group campo2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="dato1">Kg</span>
                                        </div>
                                        <input type="text" class="form-control" id="rango_mayor" name="rango_mayor" value="{{$rmayor}}" placeholder="0.000">
                                        
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                        <label id="eti-2">Sera aplicado cuando el sea <</label>
                                        <div class="input-group campo2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="dato2">Kg</span>
                                            </div>
                                            <input type="text" class="form-control" id="rango_menor" name="rango_menor" value="{{$rmenor}}" placeholder="0.000">
                                            
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                <!-- /.col-lg-6 -->
                            </div>
    
                </div>
                <!-- /.card-body -->
            </div>
        </div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////7-->

<div class="col-md-12">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Tamaño, peso y grupo de acceso</h3>
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="etiqueta_producto">Anchura máxima del paquete (cm)</label>
                        <input type="text" class="form-control" id="anchura" name="anchura" value="{{$anchura}}" placeholder="Anchura">
                    </div>
                    <div class="form-group">
                        <label >Altura máxima del paquete (cm)</label>
                        <input type="text" class="form-control" id="altura" name="altura" value="{{$altura}}" placeholder="Altura">
                    </div>
                    <div class="form-group">
                        <label >Profundidad máxima del paquete (cm)</label>
                        <input type="text" class="form-control" id="profundidad" name="profundidad" value="{{$profundidad}}" placeholder="Profundidad">
                    </div>
                    <div class="form-group">
                        <label >Peso máximo del paquete (kg)</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="peso_max" name="peso_max" value="{{$peso}}" placeholder="Peso máximo ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Aceso de grupo</label>
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
            <!-- /.card-body -->
    </div>

    
        <!------------------------------------------------ inicio botones  ----------------------------------->
    <div   align="center" class="col-sm-offset-2 col-sm-12">
            <div class="card card-info">
                
                <div class="card-body">
                    

                    <div class="row">
                            <div class="col-6">
                                <div class="checkbox">
                                    
                                    <label>
                                        Seleccione el estado del transportista&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" data-toggle="toggle" name="estado" id="estado" 
                                        @if ($estado_t==1)
                                            checked
                                        @endif>
                                       
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Modificar Transportista</button>
                                    <a class="btn btn-danger" href="{{ route('transporteC') }}">  Cancelar</a>
                    
                                </div>
                            </div>
                            
                        </div>
                </div>
                
                <!-- /.card-body -->
            </div>
        </div>
        <!------------------------------------------------ fin botones --------------------------------------->
                    
</form>


@endsection

@section('scripts')

    <script  type="text/javascript">
       $(document).ready(function () {
            $("#val-boton").on( 'click', function() {
            
                if( !$("#envio_g").is(':checked') ){
                    //alert("hola");
                    //document.getElementById('peso_d').readOnly=true;
                    $("#rango_mayor").val("0.000");
                    //$("#rango_mayor").removeAttr('readOnly');
                    $("#rango_mayor").attr("readOnly","false");

                    $("#rango_menor").val("0.000");
                    //$("#rango_menor").removeAttr('readOnly');
                    $("#rango_menor").attr("readOnly","false");
                } else {
                    // Hacer algo si el checkbox ha sido deseleccionado
                    $("#rango_mayor").val("0.000");
                    $("#rango_mayor").removeAttr('readOnly');
                    //$("#rango_mayor").attr("readOnly","false");

                    $("#rango_menor").val("0.000");
                    $("#rango_menor").removeAttr('readOnly');
                    //$("#rango_menor").attr("readOnly","false");
                }
                
            });
            $("#customRadio1").on( 'click', function() {
                $("#eti-1").text('Será aplicado cuando el precio sea >=');
                $("#eti-2").text('Será aplicado cuando el precio sea <');
                $("#dato1").text('$');
                $("#dato2").text('$');
            });
            $("#customRadio2").on( 'click', function() {
                $("#eti-1").text('Será aplicado cuando el peso sea >=');
                $("#eti-2").text('Será aplicado cuando el peso sea <');
                $("#dato1").text('kg');
                $("#dato2").text('kg');
            });
        });
        
    </script>
    
@endsection