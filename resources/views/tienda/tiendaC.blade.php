@extends('layouts.app-usu')
@section('iniciarsesion')
<li><a href="{{route('loginC')}}"><i class="fa fa-user-o"></i> Iniciar sesión </a></li>
@endsection
@section('category')
    @foreach ( $datosC as $item )
        <option value="0">{{$item->nombre_c}}</option>
    @endforeach 
@endsection
@section('lista')
    @foreach ( $datosC as $item )
        <li><a href="{{route('tiendaC', ''.$item->id_categoria.'')}}">{{$item->nombre_c}}</a></li>
    @endforeach 
@endsection
@section('encabezadoC')
    <!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
                            @foreach ( $datosCP as $item )
                                @if(count ($datosCH)== 0)
                                    <li><a href="{{route('home')}}">Inicio</a></li>
                                    @foreach ($datosP2 as $item)
                                        <li><a href="{{route('tiendaC', ''.$item->id_categoria.'')}}">{{$item->nombre_c}}</a></li>
                                    @endforeach
                                    <li class="active">{{$nombre_ch}}</li>
                                @endif
                                @if(count ($datosCH)!= 0)
                                    <li><a href="{{route('home')}}">Inicio</a></li>
                                    <li class="active">{{$item->nombre_c}}</li>
                                @endif
                            @endforeach 
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
@endsection

@section('content')
    @if(count($datosPr)!=0)
        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- ASIDE -->
                    <div id="aside" class="col-md-2">
                    </div>
                    <!-- /ASIDE -->
                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        @foreach($datosPr as $item)
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img width="100" height="250" src="{{Storage::url($item->imagen_p)}}" alt="imagen del producto">
                                    <div class="product-label">
                                        @if ($item->oferta == 1)
                                            <span class="new">OFERTA</span>
                                        @elseif ($item->nuevo == 1)
                                            <span class="new">NUEVO</span>
                                        @endif 
                                    </div>
                                </div>
                                <div class="product-body">
                                    @foreach ($datosC as $item_C)
                                        @if ($item->id_categoria == $item_C->id_categoria)
                                                {{$item_C->nombre_c}}
                                        @endif
                                    @endforeach
                                    <h3 class="product-name"><a href="{{route('TiendaP', ''.$item->id_producto.'')}}">{{$item->nombre_p}}</a></h3>
                                    @php
                                        $band=false;
                                    @endphp
                                    @foreach ($datosDes as $item_d)
                                        @if ($item->id_producto == $item_d->id_producto)
                                            
                                                    <h3 class="product-price 1">${{$item_d->precio_descuento}} <del class="product-old-price"> ${{$item->precio_iva}}</del></h3>
                                                @php
                                                    $band=true;
                                                @endphp
                                        @endif
                                    @endforeach
                                        
                                    @if($band==false)
                                        <h4 class="product-price">${{$item->precio_iva}}
                                    @endif
                                    <div class="product-label">
                                        @foreach ($datosDes as $item_D)
                                            @if($item->id_producto == $item_D->id_producto )
                                                @if($item_D->porcentaje_d != 0.00)
                                                    <span class="product-price">Ahorras: {{$item_D->porcentaje_d}}%</span>
                                                @endif
                                                @if($item_D->porcentaje_d == 0.00)
                                                    <span class=" product-price">Ahorras: ${{$item_D->peso_d}}</span>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="product-rating">
                                            @php
                                                $calitotal = 0;
                                                $calicont=0;
                                                $calipro=0;
                                            @endphp
                                            @foreach ($datoscomentarios as $item_c)
                                                @if ($item->id_producto == $item_c->id_producto)
                                                    @php
                                                         $calitotal = $calitotal + $item_c->calificacion;
                                                         $calicont++;
                                                    @endphp
                                                @endif
                                                
                                            @endforeach
                                            @php
                                                if($calicont!=0){
                                                    $calipro=round(($calitotal/$calicont),0);
                                                }
                                            @endphp
                                                @for($i=1;$i<6;$i++)
                                                @if (($calipro)>=($i))
                                                    <i class="fa fa-star"></i>
                                                @else
                                                    <i class="fa fa-star-o"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    <div class="product-btns">
                                        <button type="button" class="btn btn-default ventana_popup2" data-toggle="modal" data-target="#modal-default" id_ventanapopup="{{$item->id_producto}}">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <a class="add-to-cart"  href="{{route('add', ''.$item->nombre_p.'')}}" >
                                    {{ csrf_field() }}
                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Añadir al carrito</button>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <!-- /product -->
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Mostrando {{count($datosPr)}} - {{count($datosPr)}} productos</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
        </div>
    </div>
    @endif
@endsection

@section('content3')
<!-- shop -->
<div>
    <h4>Subcategorías</h4>
        @foreach ($datosCH as $item)
        <div class="col-md-4 col-xs-6">
            <div class="shop">
                <div class="shop-img">
                    <img width="100" height="250" src="{{Storage::url($item->imagen_c)}}" alt="imagen de la categoria">
                </div>
                <div class="shop-body">
                    <h3>{{ $item->nombre_c }}</h3>
                    <a href="{{route('tiendaC', ''.$item->id_categoria.'')}}" class="cta-btn">Compra ahora <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        @endforeach
        <!-- /shop -->
    </div>
    
@endsection
@section('modal')
    
    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               
                <div   id="nombre_popup"></div>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <!-- Product details -->
                    <div class="col-md-7 ">
                        
                            <div class="product-preview" id="imagen_popup"></div>
                            
                    </div>
                    
                    <div class="col-md-5" >
                        <div class="product-details">
                            <h5> Precio: </h5>
                            <div id="precio_popup"></div>
                            <h5> Descripción: </h5>
                            <div id="resumen_popup"></div>
                            <div class="add-to-cart">
                                <div class="qty-label">
                                    <h5> Cantidad: </h5>
                                    <div class="number" id="existencias_popup"> </div>
                                </div>
                            </div>
                            <ul class="product-links">
                                <li>Share:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
        
                        </div>
                        
                    </div>
                    <!-- /Product details -->
                    
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
        </div>
       
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/popup.js') }}"></script>
    
@endsection