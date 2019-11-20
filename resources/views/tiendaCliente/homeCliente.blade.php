@extends('layouts.app-client')
@section('iniciarsesion')
<li><a href="#"><i class="fa fa-user-o"></i> {{session()->get('email') ?? 'Invitado'}} </a> <a href="{{route('logoutC')}}" class="btn btn-xs btn-danger">Salir</a></li>
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
@section('content')
<!-- Aqui va ell contenido> 
     shop -->
    @php
     $email=session()->get('email');   
    @endphp
    @foreach ($datosC as $item)
    <div class="col-md-4 col-xs-6">
        <div class="shop">
            <div class="shop-img">
                <img width="100" height="250" src="{{Storage::url($item->imagen_c)}}" alt="imagen de la categoria">
            </div>
            <div class="shop-body">
                <h3>{{ $item->nombre_c }}</h3>
                <a href="{{route('tCliente', ''.$item->id_categoria.'')}}" class="cta-btn">Compra ahora <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    @endforeach
    <!-- /shop -->
@endsection
@section('content2')
<!-- SECTION -->
<div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title"> Productos</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Nuevos</a></li>
                                <li><a data-toggle="tab" href="#tab2">Oferta</a></li>
                                <li><a data-toggle="tab" href="#tab3">Exclusivos</a></li>
                                <li><a data-toggle="tab" href="#tab4">Los más vendidos</a></li>
                            </ul>
                        </div>
                        
                        <!--div class="tab-content">
                            <div class="tab-pane active" id="tab1"></div>
                            <div class="tab-pane active" id="tab2"></div>
                        </div-->
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                        @foreach ($datosPNuevos as $item)
										<div class="product">
                                                <div class="product-img">
                                                    <img width="100" height="250" src="{{Storage::url($item->imagen_p)}}" alt="Imagen del producto">
                                                    <div class="product-label">
                                                        <!--span class="sale">-30%</span-->
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">@foreach ($datosC as $item_C)
                                                        @if ($item->id_categoria == $item_C->id_categoria)
                                                        {{$item_C->nombre_c}}
                                                        @endif
                                                    @endforeach</p>
                                                    <h3 class="product-name"><a href="{{route('clienteP', ''.$item->id_producto.'',''.$email.'')}}">{{$item->nombre_p}}</a></h3>
                                                    @foreach ($datosdescuentos as $item_d)
                                                        @if ($item->id_producto == $item_d->id_producto)
                                                            <h4 class="product-price">${{$item->precio_iva}}
                                                        @endif
                                                    @endforeach
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Vista Rápida</span></button>
                                                    </div>
                                                </div>
                                                <a class="add-to-cart"  href="{{route('addC', ''.$item->nombre_p.'')}}" >
                                                    {{ csrf_field() }}
                                                    <button class="add-to-cart-btn" ><i class="fa fa-shopping-cart"></i>añadir al carrito</button>
                                                </a>
                                            </div>
                                            @endforeach
                                            <!-- /product -->
                                        </div>
                                        <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                
                                <!-- /tab -->
                                <!-- tab -->
                            <div id="tab2" class="tab-pane">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                        @foreach ($datosPOfertas as $item)
										<div class="product">
                                                <div class="product-img">
                                                    <img width="100" height="250" src="{{Storage::url($item->imagen_p)}}" alt="Imagen del producto">
                                                    <div class="product-label">
                                                        <!--span class="sale">-30%</span-->
                                                        <span class="new">OFERTA</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">@foreach ($datosC as $item_C)
                                                        @if ($item->id_categoria == $item_C->id_categoria)
                                                        {{$item_C->nombre_c}}
                                                        @endif
                                                    @endforeach</p>
                                                    <h3 class="product-name"><a href="{{route('clienteP', ''.$item->id_producto.'')}}">{{$item->nombre_p}}</a></h3>
                                                    <h4 class="product-price">${{$item->precio_iva}}
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Vista Rápida</span></button>
                                                    </div>
                                                </div>
                                                <a class="add-to-cart"  href="{{route('addC', ''.$item->nombre_p.'')}}" >
                                                    {{ csrf_field() }}
                                                    <button class="add-to-cart-btn" ><i class="fa fa-shopping-cart"></i>añadir al carrito</button>
                                                </a>
                                            </div>
                                            @endforeach
                                            <!-- /product -->
                                        </div>
                                        <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                
                                <!-- /tab -->
                                <!-- tab -->
                            <div id="tab3" class="tab-pane">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                        @foreach ($datosPExclusivo as $item)
										<div class="product">
                                                <div class="product-img">
                                                    <img width="100" height="250" src="{{Storage::url($item->imagen_p)}}" alt="Imagen del producto">
                                                    <div class="product-label">
                                                        <!--span class="sale">-30%</span-->
                                                        <span class="new">OFERTA</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">@foreach ($datosC as $item_C)
                                                        @if ($item->id_categoria == $item_C->id_categoria)
                                                        {{$item_C->nombre_c}}
                                                        @endif
                                                    @endforeach</p>
                                                    <h3 class="product-name"><a href="{{route('clienteP', ''.$item->id_producto.'')}}">{{$item->nombre_p}}</a></h3>
                                                    <h4 class="product-price">${{$item->precio_iva}}
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Vista Rápida</span></button>
                                                    </div>
                                                </div>
                                                <a class="add-to-cart"  href="{{route('addC', ''.$item->nombre_p.'')}}" >
                                                    {{ csrf_field() }}
                                                    <button class="add-to-cart-btn" ><i class="fa fa-shopping-cart"></i>añadir al carrito</button>
                                                </a>
                                            </div>
                                            @endforeach
                                            <!-- /product -->
                                        </div>
                                        <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                
                                <!-- /tab -->
                            </div>
                        </div>
                    </div>
                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
            
@endsection
@section('imagen')
    	<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<img src="assets\usu-tienda\css\Herramientas.png" alt="imagen sobre herrmientas">
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -- -->
@endsection

@section('listas')
            <!-- container -->
            <div class="section">
			<div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="section-title" align="center">
                                <h4 class="title" >Síguenos en facebook</h4>
                                <div class="section-nav">
                                    <div id="slick-nav-3" class="products-slick-nav"></div>
                                </div>
                            </div>
    
                            <div class="products-widget-slick" data-nav="#slick-nav-3">
                                <div>
                                    
                                    <!-- /contenido -->
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-4 col-xs-6">
                            <div class="section-title" align="center">
                                <h4 class="title">Transporte Seguro</h4>
                                <div class="section-nav">
                                    <div id="slick-nav-4" class="products-slick-nav"></div>
                                </div>
                            </div>
    
                            <div class="products-widget-slick" data-nav="#slick-nav-4">
                                <div>
                                        <div id="cmsinfo_block">
                                                <div ><ul><li><em class="icon-truck" id="icon-truck"></em>
                                                <div class="type-text">
                                                
                                                <p>DHL, líder global en la industria de la logística</p>
                                                </div>
                                                </li>
                                                <li><em class="icon-phone" id="icon-phone"></em>
                                                <div class="type-text">
                                                <h4>¡ Llámanos !</h4>
                                                <p>Si tienes alguna duda, con gusto te atenderemos <span>(961) 60-4-17-15 (961) 61-3-68-72</span></p>
                                                </div>
                                                </li>
                                                <li><em class="icon-credit-card" id="icon-credit-card"></em>
                                                <div class="type-text">
                                                <h4>Pago Seguro</h4>
                                                <p>Todas nuestras transacciones por Internet están encriptadas para seguridad de nuestros clientes.</p>
                                                </div>
                                                </li>
                                                </ul></div></div>
                                  <!-- /contenido -->
                                </div>
                            </div>                            
                        </div>
    
                        <div class="clearfix visible-sm visible-xs"></div>
    
                        <div class="col-md-4 col-xs-6">
                            <div class="section-title" >
                                <h4 class="title" >Mercantil del Constructor, S.A. de C.V.</h4>
                                <div class="section-nav">
                                    <div id="slick-nav-5" class="products-slick-nav"></div>
                                </div>
                            </div>
    
                            <div class="products-widget-slick" data-nav="#slick-nav-5">
                                <div>
                                        <div >
                                            <h4>Desde 1981 líder en el Estado de Chiapas.</h4>
                                            <p>Mercantil   del  Constructor,  S.A.   de   C.V.,    es   una empresa fundada en 1981 en la ciudad de  Tapachula, la cual en la actualidad cuenta con un grupo de tiendas en todo el Estado de Chiapas; su giro comercial  es  la compra-venta de materiales de construcción, ferretería  en  general, acabados  y  material  eléctrico  de  media tensión así  como  alumbrado  público,  posicionándola como una  de  las  principales  empresas  de  venta  y soluciones  para  la  industria  de  la  construcción  del Estado.</p></div>
                                                    </div>
                                    <!-- /contenido -->
                                </div>
                            </div>
                        </div>
    
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
    <!-- /SECTION -->
    
@endsection

@section('comentarios')
<div class="section " >
    <!-- Product tab -->
    <div class="col-md-12 "  >
            <div id="product-tab">
                <!-- product tab nav -->
                <ul class="tab-nav" >
                    <li class="active"><a data-toggle="tab" href="#tab3">Comentarios </a></li>
                </ul>
                <!-- /product tab nav -->
                <div class="container">
                        <!-- row -->
                        <div class="row">
                            <!-- Products tab & slick -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="products-tabs">
                                        <!-- tab -->
                                        <div id="tab1" class="tab-pane active">
                                            <div class="products-slick" data-nav="#slick-nav-2">
                                                <!-- product -->
                                            
                                                @foreach ($datoscomentarios as $item)
                                                    <div class="product" style=" 
                                                    border: 1px solid black;
                                                    display: inline-block;
                                                    box-sizing: border-box;">  
                                                        <div class="product-body" >
                                                            <p class="product-category">Comentarios</p>
                                                            <h3 class="product-name"  >{{$item->comentario}}</h3>
                                                            
                                                            <div class="product-rating">
                                                                @for($i=1;$i<6;$i++)
                                                                    @if (($item->calificacion)>=($i))
                                                                        <i class="fa fa-star"></i>
                                                                    @else
                                                                        <i class="fa fa-star-o"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                @endforeach
                                                        <!-- /product -->
                                                    </div>
                                                    <div id="slick-nav-2" class="products-slick-nav2"></div>
                                                </div>
                                                <!-- /tab -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Products tab & slick -->
                                </div>
                                <!-- /row -->
                            </div>
                
            </div>            
        </div>
    </div>
        <!-- /product tab -->
        <!-- SECTION -->
     
@endsection