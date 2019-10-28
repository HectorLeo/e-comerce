@extends('layouts.app')



@section('titulohome')
    <h1 class="m-0 text-dark">Agregar Ofertas y Descuentos</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active"><a href="{{ route('ofertaDescuento') }}">Ofertas y Descuentos</a></li>
    <li class="breadcrumb-item active">Agregar Ofertas y Descuentos</li>
@endsection
@section('ActiveCata') nav-link active @endsection
@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveOferDes') nav-link active @endsection

@section('content')
    <form method="POST" action="{{ route('agregarOfertaDescuento', ''.$id.'') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
                  <!------------------------------------------------ inicio precio  ----------------------------------->
                  <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title">Fecha y Hora</h3>
                            </div>
                            <div class="card-body">
                                <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="id_{{$id}}" name="id_{{$id}}" checked>
                                    <label for="id_{{$id}}" class="custom-control-label"> Producto en Oferta</label>
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
                                              <input type="date" class="form-control float-right" id="fecha_inicio" name="fecha_inicio">
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
                                                  <input type="time" class="form-control float-right" id="hora_inicio" name="hora_inicio">
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
                                              <input type="date" class="form-control float-right" id="fecha_fin" name="fecha_fin"> 
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
                                                  <input type="time" class="form-control float-right" id="hora_fin" name="hora_fin">
                                                </div>
                                                <!-- /.input group -->
                                              </div>
                                    </div>
                                    
                
                            </div>
                            <hr>
                            
                            
                                
                                
                            <label >Descuento por porcentaje %:</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    
                                    <input type="text" class="form-control" id="porcentaje_d" name="porcentaje_d" placeholder="0.0">
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
                                    <input type="text" class="form-control" id="peso_d" name="peso_d" placeholder="0.000">
                                    
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
        <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-body">
                        <div class="row" >
                                <div class="col-6" >
                                    <div class="form-group" >
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a class="btn btn-danger" href="{{ route('ofertaDescuento') }}">  Cancelar</a>
                        
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