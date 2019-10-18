@extends('layouts.app')


@section('titulohome')
    <h1 class="m-0 text-dark">Transporte</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active">Transporte</li>
@endsection
@section('ActiveTrans') nav-link active @endsection
@section('Activetransporte') nav-item has-treeview menu-open @endsection
@section('Activetransportistas') nav-link active @endsection

@section('content')

@if(session()->has('info'))
    <div class="alert alert-success">{{session('info')}}</div>
@endif

<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Transportistas</h3>

        <div class="card-tools">
        <a class="btn btn-info btn-sm" href="{{ route('transporte') }}"><i class="fas fa-plus-circle"></i>  Añadir Nuevo Transportista</a>
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
                        Nombre
                    </th>
                    <th style="width: 10%">
                        logotipo
                    </th>
                    <th style="width: 20%">
                        Retraso
                    </th>
                    <th style="width: 10%">
                        Estado
                    </th>
                    <th style="width: 10%">
                        Envío Gratis
                    </th>
                    <th style="width: 30%">
                    </th>
                </tr>
            </thead>
            <thead>
                <tr>
                    {{ Form::open(['route' => 'transporteC', 'method'=>'GET', 'class'=>'form-inline pull-right']) }}
                    <td>
                            {!! Form::text('id', null, ['class'=>'form-control']) !!}
                    </td>
                    <td>
                            {!! Form::text('nombre', null, ['class'=>'form-control'])!!}
                    </th>
                    <td>
                            ...
                    </td>
                    <td>
                           {!! Form::text('retraso', null, ['class'=>'form-control'])!!}
                    </td>
                    <td>
                            {!! Form::select('estado', array(null => '-', '1' => 'Sí', '2' => 'No' ))!!}
                    </td>
                    <td>
                            {!! Form::select('envio', array(null => '-', '1' => 'Sí', '2' => 'No'))!!}
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
                @foreach ($datostransportes as $item)
                    <tr>
                        <td>
                            {{$item->id_transporte}}
                        </td>
                        <td>
                            <a>
                                {{$item->nombre_transporte}}
                            </a>
                            
                        </td>
                        <td>
                           
                                <img width="40" src="{{Storage::url($item->logotipo_transporte)}}">
                            
                        </td>
                        <td>
                            <a>
                                {{$item->retraso_transporte}}
                            </a>
                            
                        </td>
                        <td class="project_progress">
                                
                            @if(($item->estado_transporte) == 1)
                                <i class="fas fa-check"></i> <!-- activo -->
                            @else
                                <i class="fas fa-times"></i> <!-- desactivo -->
                            @endif
                            
                            
                        </td>
                        <td class="project_progress">
                                
                            @if(($item->envio_gratis) == 1)
                                <i class="fas fa-check"></i> <!-- activo -->
                            @else
                                <i class="fas fa-times"></i> <!-- desactivo -->
                            @endif
                            
                            
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{route('editarTransporte', ''.$item->id_transporte.'')}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Modificar
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Eliminar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$datostransportes->render()}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
@endsection