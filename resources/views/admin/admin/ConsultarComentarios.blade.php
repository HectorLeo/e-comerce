@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Comentarios</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active">Comentarios</a></li>
@endsection
@section('ActiveCataclient') nav-link active @endsection
@section('ActiveCatalogoclient') nav-item has-treeview menu-open @endsection
@section('ActiveComentario') nav-link active @endsection

@section('content')

@if(session()->has('info'))
    <div class="alert alert-success">{{session('info')}}</div>
@endif

<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Categoria</h3>

        <!--div class="card-tools">
        <a class="btn btn-info btn-sm" href="{{ route('agregarCategoria') }}"><i class="fas fa-plus-circle"></i>  Nueva Categoria</a>
          <<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>>
           
        </div-->
      </div>
      <div class="card-body p-0" style="display: block;">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 9%">
                        ID
                    </th>
                    <th style="width: 15%">
                        Nombre
                    </th>
                    <th style="width: 10%">
                        Ref. Producto
                    </th>
                    <th style="width: 5%">
                        Calif.
                    </th>
                    <th style="width: 30%">
                        Descripcion
                    </th>
                    <th style="width: 10%">
                        Activo
                    </th>
                    
                    <th style="width: 20%">
                    </th>
                </tr>
                <tr>
                  {{ Form::open(['route' => 'ComentarioCliente', 'method'=>'GET', 'class'=>'form-inline pull-right']) }}
                  <td>
                          {!! Form::text('id', null, ['class'=>'form-control']) !!}
                  </td>
                  <td>
                          {!! Form::text('nombre', null, ['class'=>'form-control'])!!}
                  </th>
                  <td>
                        {!! Form::text('referencia', null, ['class'=>'form-control'])!!}
                </th>
                <td>
                        {!! Form::text('calificacion', null, ['class'=>'form-control'])!!}
                </th>
                  <td>
                          ...
                  </td>
                  <td>
                          {!! Form::select('estado', array(null => '-', '1' => 'Sí', '0' => 'No' ),null, ['class' => 'form-control'])!!}
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
                @foreach ($datoscomentarios as $item)
                    <tr>
                        <td>
                            {{$item->id_comentarios}}
                        </td>
                        <td>
                            <a>
                                @foreach ($datoscliente as $item2)
                                    @if ($item->id_usuario == $item2->usuario_id)
                                        {{$item2->nombre}} {{$item2->a_paterno}} {{$item2->a_materno}}
                                    @endif
                                @endforeach
                            </a>
                            
                        </td>
                        <td>
                            <a>
                                @foreach ($datosproducto as $item3)
                                    @if ($item->id_producto == $item3->id_producto)
                                        {{$item3->referencia}} 
                                    @endif
                                @endforeach
                               
                            </a>
                        </td>
                        <td>
                            <a>
                                {{$item->calificacion}}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{$item->comentario}}
                            </a>
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
                            @if(($item->estado) == 1)
                            <button  class="btn btn-danger btn-sm delete_user" id_delete="{{$item->id_comentarios}}" value="0" name="id_delete" >
                                <i class="fas fa-times-circle"></i>Desactivar
                            </button>
                            @else
                            <button  class="btn btn-success btn-sm delete_user" id_delete="{{$item->id_comentarios}}" value="1" name="id_delete">
                                <i class="fas fa-clipboard-check"></i>Activar
                            </button>
                            @endif
                          
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$datoscomentarios->render()}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
 
  
@endsection
@section('scripts')
<script src="{{ asset('js/comentarios.js') }}"></script>
@endsection