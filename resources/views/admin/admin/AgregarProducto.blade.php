@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Agregar Producto</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active">Agregar Producto</li>
@endsection

@section('activeCatalogo') nav-item has-treeview menu-open @endsection

@section('activeProducto') nav-link active @endsection


@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Datos basicos</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombreP">Nombre del Prodcuto:</label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto"  placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="referencia">Referncia</label>
                        <input type="text" class="form-control" id="referencia_producto" name="referencia_producto" placeholder="Referencia">
                    </div>
                    <div class="form-group">
                        <label for="referencia">Resumen</label>
                        <input type="text" class="form-control" id="resumen_producto" name="resumen_producto" placeholder="Resumen">
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" rows="3" placeholder="Descripción ... "></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Imagen del Producto</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection