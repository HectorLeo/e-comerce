@extends('layouts.app')



@section('titulohome')
    <h1 class="m-0 text-dark">Editar Ofertas y Descuentos</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active"><a href="{{ route('ofertaDescuento') }}">Ofertas y Descuentos</a></li>
    <li class="breadcrumb-item active">Editar Ofertas y Descuentos</li>
@endsection
@section('ActiveCata') nav-link active @endsection
@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveOferDes') nav-link active @endsection

@section('content')
    <form method="POST" action="{{ route('editarOfertaDescuento', ''.$id.'') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
                  <!------------------------------------------------ inicio precio  ----------------------------------->
                  <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title">Fecha y Hora</h3>
                            </div>
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="p_oferta1" name="ofe_nue" value="0" 
                                                    @if ($oferta==1)
                                                        checked
                                                    @endif>
                                                    <label for="p_oferta1" class="custom-control-label">Producto en Oferta</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="p_nuevo2" name="ofe_nue" value="1" 
                                                    @if ($nuevo==1)
                                                        checked
                                                    @endif>
                                                    <label for="p_nuevo2" class="custom-control-label">Producto Nuevo</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="p_exclu{{$id}}" name="p_exclu{{$id}}" 
                                                @if ($exclusivo==1)
                                                    checked
                                                @endif>
                                                <label for="p_exclu{{$id}}" class="custom-control-label"> Producto Exclusivo</label>
                                            </div>
                                        </div>
                                    </div>
                                
                                    
                                <hr>
                                <label >Inicia: </label>
                                <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                    
                          
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="far fa-calendar-alt"></i>
                                                </span>
                                              </div>
                                            <input type="date" class="form-control float-right" id="fecha_inicio" name="fecha_inicio" value="{{$fecha_inicio}}">
                                            </div>
                                            <!-- /.input group -->
                                          </div>
                                          <!-- /.form group -->
                                        </div>
                                        <!-- /.col-lg-6 -->
                                        <div class="col-lg-6">
                                                <!-- Date and time range -->
                                          <div class="form-group">
                                              
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                  </div>
                                                  <input type="time" class="form-control float-right" id="hora_inicio" name="hora_inicio" value="{{$hora_inicio}}">
                                                </div>
                                                <!-- /.input group -->
                                              </div>
                                    </div>
                                </div>
                                    <label >Finaliza: </label>
                                <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                    
                          
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="far fa-calendar-alt"></i>
                                                </span>
                                              </div>
                                              <input type="date" class="form-control float-right" id="fecha_fin" name="fecha_fin" value="{{$fecha_fin}}"> 
                                            </div>
                                            <!-- /.input group -->
                                          </div>
                                          <!-- /.form group -->
                                        </div>
                                        <!-- /.col-lg-6 -->
                                        <div class="col-lg-6">
                                                <!-- Date and time range -->
                                          <div class="form-group">
                                              
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                  </div>
                                                  <input type="time" class="form-control float-right" id="hora_fin" name="hora_fin" value="{{$hora_fin}}">
                                                </div>
                                                <!-- /.input group -->
                                              </div>
                                    </div>
                                    
                
                            </div>
                            <hr>
                            
                            
                                
                                
                            <label >Descuento por porcentaje %:</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    
                                    <input type="text" class="form-control" id="porcentaje_d" name="porcentaje_d" placeholder="0.0" value="{{$porcentaje_d}}" 
                                    @if ($porcentaje_d==0)
                                        readonly
                                    @endif >
                                    <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /input-group -->
                    
                    
                            <label >Descuento por Precio $:</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" id="peso_d" name="peso_d" placeholder="0.000" value="{{$peso_d}}"
                                    @if ($peso_d==0)
                                        readonly
                                    @endif >
                                    
                                </div>
                            </div>
                            <!-- /input-group -->
                                        
                                
                            
                                
                            <!-- /.card-body -->
                        </div>
                    </div>
                  </div>
                    <!------------------------------------------------ fin precio --------------------------------------->
           
          
                <!------------------------------------------------ inicio datos  ----------------------------------->
                <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Producto </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="etiqueta_producto">Nombre del Producto</label>
                                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{$nombre_p}}" placeholder="Producto" readonly>
                            </div>
                            <div class="form-group">
                                <label >Referencia</label>
                                <input type="text" class="form-control" id="referencia_producto" name="referencia_producto" value="{{$referencia}}" placeholder="Referencia" readonly>
                            </div>
                            <div class="form-group">
                                <label >Resumen</label>
                                <input type="text" class="form-control" id="resumen_producto" name="resumen_producto" value="{{$resumen_producto}}" placeholder="Resumen" readonly>
                            </div>
                            <div class="form-group">
                                <label >Imagen </label>
                                <div class="form-group">
                                    <img width="100px" height="100px" src="{{Storage::url($imagen_p)}}" alt="Imagen de la categoria">
                                    <input type="hidden" id="imagen_actual" name="imagen_actual" value="{{$imagen_p}}">
                                </div>
                                
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        
                </div>
            </div>
            <!------------------------------------------------ fin datos  --------------------------------------->

            
        <!------------------------------------------------ inicio botones  ----------------------------------->
        <div align="center" class="col-sm-offset-2 col-sm-12">
                <div class="card card-info">
                    <div class="card-body">
                        
                        <div class="form-group" >
                            <button type="submit" class="btn btn-primary">Modificar Oferta/Descuento</button>
                            <a class="btn btn-danger" href="{{ route('ofertaDescuento') }}">  Cancelar</a>
            
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
       $(document).ready(function () {
        $("#porcentaje_d").click(function () {
            //document.getElementById('peso_d').readOnly=true;
            $("#peso_d").val("0.0");
            $("#porcentaje_d").removeAttr('readOnly');
            $("#peso_d").attr("readOnly","false");
            
        });
        $("#peso_d").click(function () {
            $("#porcentaje_d").val("0.0");
            $("#porcentaje_d").attr("readOnly","false");
            //$("#peso_d").attr("readOnly","true");
            $("#peso_d").removeAttr('readOnly');
        });
        });
        
    </script>
    
@endsection