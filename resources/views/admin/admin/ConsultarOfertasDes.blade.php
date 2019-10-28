@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Ofertas y Descuentos</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active">Ofertas y Descuentos</a></li>
@endsection
@section('ActiveCata') nav-link active @endsection
@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveOferDes') nav-link active @endsection

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Ofertas y Descuentos</h3>

      </div>
      <div class="card-body p-0" style="display: block;">
            <div class="col-sm-12">
            <div class="row">
                <div class="col">
                    <div class="md-checkbox">
                       
                            <input type="checkbox" id="bulk_action_select_all" onclick="$('#product_catalog_list').find('table td.checkbox-column input:checkbox').prop('checked', $(this).prop('checked')); updateBulkMenu();" value="">
                            <i class="md-checkbox-control"></i>
                            Seleccionar todos
                        
                    </div>
                    <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="id_" name="id_" >
                            <label for="id_" class="custom-control-label"></label>
                        </div>
                </div>
            </div>
        </div>
            <hr>
        <table class="table table-striped projects" name="product_catalog_list" id="product_catalog_list">

            <thead>
                <tr>
                    
                    <th style="width: 10%">
                        ID
                    </th>
                    <th style="width: 5%">
                        Imagen
                        </th>
                    <th style="width: 10%">
                        Nombre
                    </th>
                    <th style="width: 15%">
                        Referencia
                    </th>
                    <th style="width: 10%">
                        Categoria
                    </th>
                    
                    <th style="width: 5%">
                        Cantidad
                    </th>
                    <th style="width: 10%">
                        Estado
                    </th>
                    
                    <th style="width: 30%">
                    </th>
                    
                </tr>

                <tr>
                  {{ Form::open(['route' => 'producto', 'method'=>'GET', 'class'=>'form-inline pull-right']) }}
                 
                  <td>
                          {!! Form::text('id', null, ['class'=>'form-control']) !!}
                  </td>
                  <td>   
                  </th>
                  <td>
                          {!! Form::text('nombre', null, ['class'=>'form-control'])!!}
                  </th>
                  <td>
                        {!! Form::text('referencia', null, ['class'=>'form-control'])!!}
                </th>
                <td>
                        {!! Form::text('categoria', null, ['class'=>'form-control'])!!}
                </th>
                
                <td>
                        {!! Form::text('cantidad', null, ['class'=>'form-control'])!!}
                </th>
                  <td>
                          {!! Form::select('estado', array(null => '-', '1' => 'Activo', '0' => 'Desactivo' ))!!}
                  </td>
                  <td class="project-actions text-right">
                          <button type="submit" class="btn  btn-secondary btn-sm" href="#">
                              <i class="fas fa-search"></i>
                              Buscar
                          </button>
                  </th>
                  {{ Form::close()}}
              </tr>
            </thead>
            <tbody>
                @foreach ($datosproductos as $item)
                    <tr>
                        
                        <td class="checkbox-column form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="id_{{$item->id_producto}}" name="id_{{$item->id_producto}}" >
                                <label for="id_{{$item->id_producto}}" class="custom-control-label"></label> {{$item->id_producto}}
                            </div>
                            
                        </td>
                        <td>
                            <img width="50px" height="50px" src="{{Storage::url($item->imagen_p)}}" alt="Imagen de la categoria">
                        </td>
                        <td>
                            {{$item->nombre_p}}
                        </td>
                        <td>
                            {{$item->referencia}}
                        </td>
                        <td>
                            {{$item->id_categoria}}
                        </td>
                        
                        <td>
                            {{$item->existencias}}
                        </td>
                        <td class="project_progress">
                                
                            @if(($item->estado) == 1)
                                <i class="fas fa-check"></i> <!-- activo -->
                            @else
                                <i class="fas fa-times"></i> <!-- desactivo -->
                            @endif
                            
                            
                        </td>
                        <td class="project-actions text-right">
                            <!--<a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>-->
                        <a class="btn btn-info btn-sm" href="{{ route('agregarOfertaDescuento', ''.$item->id_producto.'') }}"><i class="fas fa-plus-circle"></i>  Agregar</a>
                        <a class="btn btn-info btn-sm" href="{{route('editarProducto', ''.$item->id_producto.'')}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            @if(($item->estado) == 1)
                            <button  class="btn btn-danger btn-sm delete_user" id_delete="{{$item->id_producto}}" value="0" name="id_delete" style='width:100px; height:30px' >
                                <i class="fas fa-times-circle"> </i>  Desactivar
                            </button>
                            @else
                            <button  class="btn btn-success btn-sm delete_user" id_delete="{{$item->id_producto}}" value="1" name="id_delete" style='width:100px; height:30px'>
                                <i class="fas fa-clipboard-check"> </i>  Activar
                            </button>
                            @endif
                          
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$datosproductos->render()}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!---------------------------modal eliminar---------------------------------------->
    
  </section>
 
  
@endsection
@section('scripts')
<script src="{{ asset('js/producto.js') }}"></script>
@endsection