@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Productos</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active">Productos</a></li>
@endsection
@section('ActiveCata') nav-link active @endsection
@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveProducto') nav-link active @endsection

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects</h3>

        <div class="card-tools">
        <a class="btn btn-info btn-sm" href="{{ route('agregarProducto') }}"><i class="fas fa-plus-circle"></i>  Nuevo Producto</a>
          <!--<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>-->
           
        </div>
      </div>
      <div class="card-body p-0" style="display: block;">
        <table class="table table-striped projects">
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
                    <th style="width: 10%">
                        Precio (imp. excl.)
                    </th>
                    <th style="width: 10%">
                        Precio (imp. incl.)
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
                        {!! Form::text('precio_ex', null, ['class'=>'form-control'])!!}
                </th>
                <td>
                        {!! Form::text('precio_in', null, ['class'=>'form-control'])!!}
                </th>
                <td>
                        {!! Form::text('cantidad', null, ['class'=>'form-control'])!!}
                </th>
                  <td>
                          {!! Form::select('estado', array(null => '-', '1' => 'Sí', '0' => 'No' ))!!}
                  </td>
                  <td class="project-actions text-right">
                          <button type="submit" class="btn  btn-secondary btn-sm" href="#">
                              <i class="fas fa-search"></i>
                              
                          </button>
                  </th>
                  {{ Form::close()}}
              </tr>
            </thead>
            <tbody>
                @foreach ($datosproductos as $item)
                    <tr>
                        <td>
                            {{$item->id_producto}}
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
                            {{$item->precio_neto}}
                        </td>
                        <td>
                            {{$item->precio_iva}}
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
                        <a class="btn btn-info btn-sm" href="{{route('editarProducto', ''.$item->id_producto.'')}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                          <button  class="btn btn-danger btn-sm delete_user" id_delete="{{$item->id_producto}}" >
                                <i class="fas fa-trash"></i> 
                          </button>
                          
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
<script src="{{ asset('js/categorias.js') }}"></script>
@endsection