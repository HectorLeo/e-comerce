@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Marcas</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active">Marcas</a></li>
@endsection
@section('ActiveCata') nav-link active @endsection
@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveMarcas') nav-link active @endsection

@section('content')

@if(session()->has('info'))
    <div class="alert alert-success">{{session('info')}}</div>
@endif

<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Marcas</h3>

        <div class="card-tools">
        <a class="btn btn-info btn-sm" href="{{ route('Marca') }}"><i class="fas fa-plus-circle"></i>  Nueva Marca</a>
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
                    <th style="width: 20%">
                        Logotipo
                    </th>
                    <th style="width: 30%">
                        Nombre
                    </th>
                   
                    <th style="width: 10%">
                        Activado
                    </th>
                    <th style="width: 30%">
                    </th>
                </tr>
                <tr>
                  {{ Form::open(['route' => 'marcaC', 'method'=>'GET', 'class'=>'form-inline pull-right']) }}
                  <td>
                          {!! Form::text('id', null, ['class'=>'form-control']) !!}
                  </td>
                  <td>
                        ...
                    </td>
                  <td>
                          {!! Form::text('nombre', null, ['class'=>'form-control'])!!}
                  </th>
                  <td>
                          {!! Form::select('estado', array( null => '-', '1' => 'Sí', '0' => 'No' ),null, ['class' => 'form-control'])!!}
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
                @foreach ($datosmarcas as $item)
                    <tr>
                        <td>
                            {{$item->id_marca}}
                        </td>
                        <td>
                            <img width="50px" height="50px" src="{{Storage::url($item->logotipo_m)}}">
                            
                        </td>
                        <td>
                            <a>
                                {{$item->nombre_m}}
                            </a>
                        </td>
                        <td class="project_progress">
                                
                            @if(($item->activo_m) == 1)
                                <i class="fas fa-check"></i> <!-- activo -->
                            @else
                                <i class="fas fa-times"></i> <!-- desactivo -->
                            @endif
                            
                            
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{route('editarMarca', ''.$item->id_marca.'')}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Modificar
                            </a>
                            @if(($item->activo_m) == 1)
                            <button  class="btn btn-danger btn-sm delete_user" id_delete="{{$item->id_marca}}" value="0" name="id_delete" >
                                <i class="fas fa-times-circle"></i>Desactivar
                            </button>
                            @else
                            <button  class="btn btn-success btn-sm delete_user" id_delete="{{$item->id_marca}}" value="1" name="id_delete">
                                <i class="fas fa-clipboard-check"></i>Activar
                            </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$datosmarcas->render()}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!---------------------------modal eliminar---------------------------------------->

  </section>
 
  
@endsection
@section('scripts')
<script src="{{ asset('js/marca.js') }}"></script>
@endsection