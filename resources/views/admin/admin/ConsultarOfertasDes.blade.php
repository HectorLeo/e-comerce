@extends('layouts.app')

@section('linkhead')
    <!--link rel="stylesheet" href="\assets\lte\plugins\jsgrid\jsgrid.min.css">
    <link rel="stylesheet" href="\assets\lte\plugins\jsgrid\jsgrid-theme.min.css"-->
@endsection

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
            <!--div class="row">
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
            </div-->
        </div>
            
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
                    <th style="width: 5%">
                        Oferta
                    </th>
                    <th style="width: 5%">
                        Nuevo
                    </th>
                    <th style="width: 5%">
                        Exclusivo
                    </th>
                    
                    <th style="width: 30%">
                    </th>
                    
                </tr>

                <tr>
                  {{ Form::open(['route' => 'ofertaDescuento', 'method'=>'GET', 'class'=>'form-inline pull-right']) }}
                 
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
                          {!! Form::select('oferta', array(null => '-', '1' => 'Si', '0' => 'No' ),null, ['class' => 'form-control'])!!}
                </td>
                <td>
                        {!! Form::select('nuevo', array(null => '-', '1' => 'Si', '0' => 'No' ),null, ['class' => 'form-control'])!!}
                </td>
                <td>
                        {!! Form::select('exclusivo', array(null => '-', '1' => 'Si', '0' => 'No' ),null, ['class' => 'form-control'])!!}
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
                        
                        <td >
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
                            {{$item->existencias}}
                        </td>
                        <td class="project_progress">
                            @if(($item->oferta) == 1)
                                <i class="fas fa-check"></i> <!-- activo -->
                            @else
                                <i class="fas fa-times"></i> <!-- desactivo -->
                            @endif
                        </td>
                        <td>  
                            @if(($item->nuevo) == 1)
                                <i class="fas fa-check"></i> <!-- activo -->
                            @else
                                <i class="fas fa-times"></i> <!-- desactivo -->
                            @endif
                        </td>
                        <td>  
                            @if(($item->exclusivo) == 1)
                                <i class="fas fa-check"></i> <!-- activo -->
                            @else
                                <i class="fas fa-times"></i> <!-- desactivo -->
                            @endif
                        </td>
                    
                        <td class="project-actions text-right">
                            @if (($item->oferta == 0) && ($item->nuevo == 0) && ($item->exclusivo == 0))
                                <a class="btn btn-success btn-sm" href="{{ route('agregarOfertaDescuento', ''.$item->id_producto.'') }}"><i class="fas fa-plus-circle"></i>  Agregar</a>
                            @else
                                <a class="btn btn-info btn-sm" href="{{route('editarOfertaDescuento', ''.$item->id_producto.'')}}">
                                    <i class="fas fa-pencil-alt"></i> 
                                </a>
                                <button  class="btn btn-danger btn-sm delete_user" id_delete="{{$item->id_producto}}"  name="id_delete" style='width:100px; height:30px' >
                                    <i class="fas fa-times-circle"> </i>  Eliminar
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
    <!---------------------------    jsGrid  ---------------------------------------->
    <!--section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">jsGrid</h3>
              </div>
              
              <div class="card-body">
                <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
                    <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                        <table class="jsgrid-table">
                            <tr class="jsgrid-header-row">
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 150px;">Name</th>
                                <th class="jsgrid-header-cell jsgrid-align-right jsgrid-header-sortable" style="width: 50px;">Age</th>
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 200px;">Address</th>
                                <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">Country</th>
                                <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">Is Married</th>
                            </tr>
                            <tr class="jsgrid-filter-row" style="display: none;">
                                <td class="jsgrid-cell" style="width: 150px;">
                                    <input type="text">
                                </td>
                                <td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">
                                    <input type="number">
                                </td>
                                <td class="jsgrid-cell" style="width: 200px;">
                                    <input type="text">
                                </td>
                                <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">
                                    <select>
                                        <option value="0"></option>
                                        <option value="1">United States</option>
                                        <option value="2">Canada</option>
                                        <option value="3">United Kingdom</option>
                                        <option value="4">France</option>
                                        <option value="5">Brazil</option>
                                        <option value="6">China</option>
                                        <option value="7">Russia</option>
                                    </select>
                                </td>
                                <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">
                                    <input type="checkbox" readonly="">
                                </td>
                            </tr>
                            <tr class="jsgrid-insert-row" style="display: none;">
                                <td class="jsgrid-cell" style="width: 150px;">
                                    <input type="text">
                                </td>
                                <td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">
                                    <input type="number">
                                </td>
                                <td class="jsgrid-cell" style="width: 200px;">
                                        <input type="text">
                                    </td>
                                    <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><select><option value="0"></option><option value="1">United States</option><option value="2">Canada</option><option value="3">United Kingdom</option><option value="4">France</option><option value="5">Brazil</option><option value="6">China</option><option value="7">Russia</option></select></td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox"></td></tr></table></div><div class="jsgrid-grid-body" style="height: 1037px;"><table class="jsgrid-table"><tbody><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Otto Clay</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">61</td><td class="jsgrid-cell" style="width: 200px;">Ap #897-1459 Quam Avenue</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">China</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Connor Johnston</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">73</td><td class="jsgrid-cell" style="width: 200px;">Ap #370-4647 Dis Av.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Russia</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Lacey Hess</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">29</td><td class="jsgrid-cell" style="width: 200px;">Ap #365-8835 Integer St.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Russia</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Timothy Henson</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">78</td><td class="jsgrid-cell" style="width: 200px;">911-5143 Luctus Ave</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Ramona Benton</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">43</td><td class="jsgrid-cell" style="width: 200px;">Ap #614-689 Vehicula Street</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Brazil</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Ezra Tillman</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">51</td><td class="jsgrid-cell" style="width: 200px;">P.O. Box 738, 7583 Quisque St.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Dante Carter</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">59</td><td class="jsgrid-cell" style="width: 200px;">P.O. Box 976, 6316 Lorem, St.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Christopher Mcclure</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">58</td><td class="jsgrid-cell" style="width: 200px;">847-4303 Dictum Av.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Ruby Rocha</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">62</td><td class="jsgrid-cell" style="width: 200px;">5212 Sagittis Ave</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Canada</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Imelda Hardin</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">39</td><td class="jsgrid-cell" style="width: 200px;">719-7009 Auctor Av.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Brazil</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Jonah Johns</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">28</td><td class="jsgrid-cell" style="width: 200px;">P.O. Box 939, 9310 A Ave</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Brazil</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Herman Rosa</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">49</td><td class="jsgrid-cell" style="width: 200px;">718-7162 Molestie Av.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Russia</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Arthur Gay</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">20</td><td class="jsgrid-cell" style="width: 200px;">5497 Neque Street</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Russia</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Xena Wilkerson</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">63</td><td class="jsgrid-cell" style="width: 200px;">Ap #303-6974 Proin Street</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Lilah Atkins</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">33</td><td class="jsgrid-cell" style="width: 200px;">622-8602 Gravida Ave</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Brazil</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Malik Shepard</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">59</td><td class="jsgrid-cell" style="width: 200px;">967-5176 Tincidunt Av.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Keely Silva</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">24</td><td class="jsgrid-cell" style="width: 200px;">P.O. Box 153, 8995 Praesent Ave</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Hunter Pate</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">73</td><td class="jsgrid-cell" style="width: 200px;">P.O. Box 771, 7599 Ante, Road</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Russia</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Mikayla Roach</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">55</td><td class="jsgrid-cell" style="width: 200px;">Ap #438-9886 Donec Rd.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Brazil</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Upton Joseph</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">48</td><td class="jsgrid-cell" style="width: 200px;">Ap #896-7592 Habitant St.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">France</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr></tbody></table></div><div class="jsgrid-pager-container"><div class="jsgrid-pager">Pages: <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">First</a></span> <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">Prev</a></span> <span class="jsgrid-pager-page jsgrid-pager-current-page">1</span><span class="jsgrid-pager-page"><a href="javascript:void(0);">2</a></span><span class="jsgrid-pager-page"><a href="javascript:void(0);">3</a></span><span class="jsgrid-pager-page"><a href="javascript:void(0);">4</a></span><span class="jsgrid-pager-page"><a href="javascript:void(0);">5</a></span> <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Next</a></span> <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Last</a></span> &nbsp;&nbsp; 1 of 5 </div></div><div class="jsgrid-load-shader" style="display: none; position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; z-index: 1000;"></div><div class="jsgrid-load-panel" style="display: none; position: absolute; top: 50%; left: 50%; z-index: 1000;">Please, wait...</div></div>
              </div>
              
            </div 
          </section-->
  </section>
 
  
@endsection
@section('scripts')
<script src="{{ asset('js/descuentos.js') }}"></script>
@endsection