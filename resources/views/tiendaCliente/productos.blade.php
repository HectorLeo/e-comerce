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
    @foreach ( $datosC as $item_C )
        <li><a href="#">{{$item_C->nombre_c}}</a></li>
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
                            <li><a href="{{route('homeCliente')}}">Inicio</a></li>
                            @foreach ( $datosP2 as $item )
                                    <li><a href="{{route('tCliente', ''.$item->id_categoria.'')}}">{{$item->nombre_c}}</a></li>
                            @endforeach
                            <li class="active">{{$nombre}}</li>  
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
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="{{Storage::url($imagen)}}" alt="imagen del producto">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="{{Storage::url($imagen)}}" alt="imagen del producto">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{$nombre}}</h2>
                    <div>
                        <div class="product-rating">
                            @php
                                $nuevop=round($prom,0);    
                            @endphp
                            @for($i=1;$i<6;$i++)
                                @if (($nuevop)>=($i))
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star-o"></i>
                                @endif
                            @endfor
                        </div>
                        <a class="review-link" href="#">{{count($datosComen)}} Comentario(s) | Agrega tu evaluación</a>
                    </div>
                    <div>
                        @if($precioD != 0)
                            <h3 class="product-price">${{$precioD}} <del class="product-old-price">${{$precioN}}</del></h3>
                        @endif
                        @if($precioD == 0)
                            <h3 class="product-price">${{$precioN}} <del class="product-old-price"></del></h3>
                        @endif
                        @if($existencias<=2)
                            <span class="product-available">En Stock</span>
                        @endif
                    </div>
                    <p>{{$resumen}}</p>
                    <div class="add-to-cart">
                        <div class="qty-label">
                            Cantidad
                            <div class="number">
                                @if($existencias==0)
                                    <input type="number" value="0"  min="0" max="{{$existencias}}">
                                @endif
                                @if($existencias!=0)
                                    <input type="number" value="1"  min="1" max="{{$existencias}}">
                                @endif
                            </div>
                        </div>
                        <a href="{{route('add',''.$nombre.'')}}">
                        <button class="add-to-cart-btn"  href="{{route('add',''.$nombre.'')}}"><i class="fa fa-shopping-cart"></i>Añadir al carrito</button>
                        </a>
                    </div>

                    <ul class="product-links">
                        <li>Categoria:</li>
                        @foreach ( $datosP2 as $item )
                                    <li><a href="{{route('tiendaC', ''.$item->id_categoria.'')}}">{{$item->nombre_c}}</a></li>
                        @endforeach
                    </ul>

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

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Descripción</a></li>
                    <li><a data-toggle="tab" href="#tab3">Comentarios ({{count($datosComen)}})</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                <p>{{$descripcion}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span>{{$prom}}</span>
                                            <div class="rating-stars">
                                                @for($i=1;$i<6;$i++)
                                                    @if (($nuevop)>=($i))
                                                        <i class="fa fa-star"></i>
                                                    @else
                                                        <i class="fa fa-star-o"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <ul class="rating">
                                            @php
                                                $total_c=0;
                                                $valor_c1=0;
                                                $valor_c2=0;
                                                $valor_c3=0;
                                                $valor_c4=0;
                                                $valor_c5=0;
                                                $porcentaje1=0;
                                                $porcentaje2=0;
                                                $porcentaje3=0;
                                                $porcentaje4=0;
                                                $porcentaje5=0;
                                            @endphp
                                            @foreach ($datosComen as $item)
                                                @php
                                                    $total_c = $total_c + 1;
                                                    if($item->calificacion == 1){
                                                        $valor_c1 = $valor_c1 + 1;
                                                    }
                                                    if($item->calificacion == 2){
                                                        $valor_c2 = $valor_c2 + 1;
                                                    }
                                                    if($item->calificacion == 3){
                                                        $valor_c3 = $valor_c3 + 1;
                                                    }
                                                    if($item->calificacion == 4){
                                                        $valor_c4 = $valor_c4 + 1;
                                                    }
                                                    if($item->calificacion == 5){
                                                        $valor_c5 = $valor_c5 + 1;
                                                    }
                                                    
                                                @endphp
                                                
                                            @endforeach
                                            @php
                                                if($valor_c1 != 0){
                                                    $porcentaje1 = ($valor_c1 * 100) / $total_c; 
                                                }
                                                if($valor_c2 != 0){
                                                    $porcentaje2 = ($valor_c2 * 100) / $total_c; 
                                                }
                                                if($valor_c3 != 0){
                                                    $porcentaje3 = ($valor_c3 * 100) / $total_c; 
                                                }
                                                if($valor_c4 != 0){
                                                    $porcentaje4 = ($valor_c4 * 100) / $total_c; 
                                                }
                                                if($valor_c5 != 0){
                                                    $porcentaje5 = ($valor_c5 * 100) / $total_c; 
                                                }
                                                
                                            @endphp
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                <div style="width: {{$porcentaje5}}%;"></div>
                                                </div>
                                            <span class="sum">{{$valor_c5}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{$porcentaje4}}%;"></div>
                                                </div>
                                                <span class="sum">{{$valor_c4}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{$porcentaje3}}%;"></div>
                                                </div>
                                                <span class="sum">{{$valor_c3}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{$porcentaje2}}%;"></div>
                                                </div>
                                                <span class="sum">{{$valor_c2}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{$porcentaje1}}%;"></div>
                                                </div>
                                                <span class="sum">{{$valor_c1}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            @foreach ($datosComen as $item)
                                            <li>
                                                    <div class="review-heading">
                                                        @foreach($datosclientes as $objeto)
                                                            @if($objeto->usuario_id == $item->id_usuario)
                                                                <h5 class="name">{{$objeto->nombre}} {{$objeto->a_paterno}}</h5>
                                                            @endif
                                                        @endforeach
                                                        <p class="date">{{$item->created_at}}</p>
                                                        <div class="review-rating">
                                                        @for($i=1;$i<6;$i++)
                                                                @if (($item->calificacion)>=($i))
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                        @endfor
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>{{$item->comentario}}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <ul class="reviews-pagination">
                                            <li class="active">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->
<!-------------------------------------Insertar comentarios------------------------------------->
                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                     <form class="review-form"  >
                                            @csrf
                                            <input type="hidden" id="id_producto" name="id_producto" value="{{$id}}">
                                            <input class="input" type="email" id="email_usuario" name="email_usuario" value="{{session()->get('email')}}" readonly>
                                            <textarea class="input" id="comentario" rows="3" name="comentario" placeholder="Agrega tu Comentario"></textarea>
                                            <div class="input-rating">
                                                <span>Tu Calificación: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        <button class="primary-btn insertar_coment">Aceptar</button>
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection

@section('content3')
<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Productos Relacionados</h3>
                </div>
            </div>

            <!-- product -->
            @foreach ($datosP3 as $item)
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img width="100" height="250" src="{{Storage::url($item->imagen_p)}}" alt="Imagen del producto">
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
                        <h3 class="product-name"><a href="{{route('clienteP', ''.$item->id_producto.'')}}">{{$item->nombre_p}}</a></h3>
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
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>añadir al carrito</button>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /product -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->
@endsection
<!-- jQuery Plugins -->
@section('scripts')
    <script src="{{ asset('js/comentarios.js') }}"></script>
    <script  type="text/javascript">
        $(document).ready(function () {
             
             $(".insertar_coment").on( 'click', function() {
                $("#comentario").val('');
                for( i=1;i<6;i++){
                    $("#star"+i).attr('checked', false);
                }
             });
             
         });
         
     </script>
@endsection