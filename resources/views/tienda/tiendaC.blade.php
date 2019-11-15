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
        <li><a href="#">{{$item->nombre_c}}</a></li>
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
                                @foreach ($datosDes as $item_D)
                                @if($item->id_producto == $item_D->id_producto )
                                    @if($item_D->porcentaje_d != 0.00)
                                        <span class="sale">-{{$item_D->porcentaje_d}}%</span>
                                    @endif
                                    @if($item_D->porcentaje_d == 0.00)
                                        <span class="sale">-${{$item_D->peso_d}}</span>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="product-body">
                        @foreach ($datosC as $item_C)
                            @if ($item->id_categoria == $item_C->id_categoria)
                                    {{$item_C->nombre_c}}
                            @endif
                        @endforeach
                        <h3 class="product-name"><a href="{{route('TiendaP', ''.$item->id_producto.'')}}">{{$item->nombre_p}}</a></h3>
                        @foreach ($datosDes as $item_D)
                            @if(($item_D->id_producto == $item->id_producto))
                                <h4 class="product-price 1">${{$item_D->precio_descuento}} <del class="product-old-price"> ${{$item->precio_iva}}</del></h4>
                            @endif
                        @endforeach
                         @if(($item->nuevo==0) && ($item->oferta==0))
                                <h4 class="product-price 2">${{$item->precio_iva}}<del class="product-old-price"></del></h4>
                        @endif
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Vista Rápida</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"  href="{{route('add', $item->nombre_p)}}"> ><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
                    </div>
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