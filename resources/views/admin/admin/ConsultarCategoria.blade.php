@extends('layouts.app')

@section('titulohome')
    <h1 class="m-0 text-dark">Categorías</h1>
@endsection

@section('titulonavegacion')
    <li class="breadcrumb-item active">Categorías</a></li>
@endsection

@section('ActiveCatalogo') nav-item has-treeview menu-open @endsection
@section('ActiveCategoria') nav-link active @endsection

@section('content')

@if(session()->has('info'))
    <div class="alert alert-success">{{session('info')}}</div>
@endif

<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects</h3>

        <div class="card-tools">
        <a class="btn btn-info btn-sm" href="{{ route('agregarCategoria') }}"><i class="fas fa-plus-circle"></i>  Nueva Categoria</a>
          <!--<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>-->
           
        </div>
      </div>
      <div class="card-body p-0" style="display: block;">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        ID
                    </th>
                    <th style="width: 20%">
                        Nombre
                    </th>
                    <th style="width: 30%">
                        Descripción
                    </th>
                    <th style="width: 10%">
                        Activo
                    </th>
                    
                    <th style="width: 30%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datoscategorias as $item)
                    <tr>
                        <td>
                            {{$item->id_categoria}}
                        </td>
                        <td>
                            <a>
                                {{$item->nombre_c}}
                            </a>
                            
                        </td>
                        <td>
                            <a>
                                {{$item->descripcion}}
                            </a>
                        </td>
                        <td class="project_progress">
                                
                            @if(($item->mostrado_c) == 1)
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
                        <a class="btn btn-info btn-sm" href="{{route('editarCategoria', ''.$item->id_categoria.'')}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Modificar
                            </a>
                           
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger">
                                <i class="fas fa-trash"></i> Eliminar
                              </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!---------------------------modal eliminar---------------------------------------->
    <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Danger Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body…</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <!---------------------------------->
  </section>

  
@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      $('.swalDefaultError').click(function() {
        Toast.fire({
          type: 'error',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
  
    });
  
  </script>
@endsection