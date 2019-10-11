@extends('layouts.app')


@section('titulohome')
    <h1 class="m-0 text-dark">Transporte</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active"><a href="{{ route('transporte') }}">Transporte</a></li>
    <li class="breadcrumb-item active">Agregar transporte</li>
@endsection
@section('ActiveTrans') nav-link active @endsection
@section('Activetransporte') nav-item has-treeview menu-open @endsection
@section('Activetransportistas') nav-link active @endsection

@section('content')

<form method="POST" action="{{ route('transporte') }}" enctype="multipart/form-data">
    @csrf
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
                            <input type="text" class="form-control" id="nombre_transporte" name="nombre_transporte" placeholder="Transporte">
                        </div>
                        <div class="form-group">
                            <label >Tiempo de transito</label>
                            <input type="text" class="form-control" id="retarso_transporte" name="retarso_transporte" placeholder="Tiempo de Transito">
                        </div>
                        <div class="form-group">
                            <label >Logotipo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen_Logotipo">
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
                                                <input type="checkbox" data-toggle="toggle">
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
                                                <label>
                                                    <input type="checkbox" data-toggle="toggle">
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
                                <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                                <label for="customRadio1" class="custom-control-label">En función del precio total.</label>
                        </div>
                        <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
                                <label for="customRadio2" class="custom-control-label">En función del peso total.</label>
                        </div>
                    </div>
                    <hr>
                        <div class="form-group">
                            <label>Impuestos</label>
                            <select id="lista_impuestos" name="lista_impuestos"  class="form-control">
                                <option value="0"selected="selected" >Sin impuestos</option>
                                <option value="1">MX Reduce Rate (11%)</option>
                                <option value="2">MX Reduce Rate (16%)</option>
                            </select>
                        </div>
                        <div class="form-group">
                                <label>Fuera de la gama de comportamiento</label>
                                <select id="lista_impuestos" name="rango_comportamiento"  class="form-control">
                                    <option value="0"selected="selected" >Aplicar el coste mas alto de la gama definida</option>
                                    <option value="1">Desactivar transportista</option>
                                </select>
                        </div>
                        <hr>
                        <label aling="center" >Rango</label>
                        <div class="row">
                                <div class="col-lg-6">
                                    <label >Sera aplicado cuando el sea >=</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" id="rango_mayor" name="rango_mayor" placeholder="0,000">
                                        <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                        <label >Sera aplicado cuando el sea <</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" id="rango_menor" name="rango_menor" readonly>
                                            <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                            </div>
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
                        <input type="text" class="form-control" id="anchura" name="anchura" placeholder="Anchura">
                    </div>
                    <div class="form-group">
                        <label >Altura máxima del paquete (cm)</label>
                        <input type="text" class="form-control" id="altura" name="altura" placeholder="Altura">
                    </div>
                    <div class="form-group">
                        <label >Profundidad máxima del paquete (cm)</label>
                        <input type="text" class="form-control" id="profundidad" name="profundidad" placeholder="Profundidad">
                    </div>
                    <div class="form-group">
                        <label >Peso máximo del paquete (kg)</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="peso_max" name="peso_max" placeholder="Peso máximo ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Aceso de grupo</label>
                        <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1"checked>
                                <label for="customCheckbox1" class="custom-control-label">Visitante</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked>
                                <label for="customCheckbox2" class="custom-control-label">invitado</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox3" checked>
                                    <label for="customCheckbox3" class="custom-control-label">Cliente</label>
                            </div>
                    </div>
                </div>
        </div>
    </div>
            <!-- /.card-body -->
    </div>

    <div align="center" class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" data-toggle="toggle">
                    Activado
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
                    
</form>


@endsection