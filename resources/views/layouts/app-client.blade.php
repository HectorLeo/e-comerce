<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<title>Crystal Media | Cliente</title>
       <!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="\assets\usu-tienda\css/bootstrap.min.css"/> 

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="\assets\usu-tienda\css\slick.css"/>
		<link type="text/css" rel="stylesheet" href="\assets\usu-tienda\css\slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="\assets\usu-tienda\css\nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="\assets\usu-tienda\css\font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="\assets\usu-tienda\css\style.css"/>

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
							<li><a href="#"><i class="fa fa-phone">(222)693 4056</i> </a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i> info@crystalmedia.mx</a></li>
							<li><a href="#"><i class="fa fa-map-marker"></i> 16 Sep. 1911-201B El Carmen, Puebla.</a></li>
					</ul>
					<ul class="header-links pull-right">
						@yield('iniciarsesion')
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img width="140" height="60" src="\assets\usu-tienda\css\Logo_Crystal_Media.png" alt="Logo de CrystalMedia">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select  style="width:120px" class="input-select">
										<option value="0">Categorias</option>
										@yield('category')
									</select>
									<input class="input" placeholder="Buscar aquí">
									<button class="search-btn">Buscar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a >
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a href="{{route('carritoC')}}">
										<i class="fa fa-shopping-cart"></i>
										<span>Tu carrito</span>
										<div class="qty">@yield('nuemeroProductosCarrito')
											@php
												$totalproductos2=0;
											@endphp
											@foreach ($cart as $item)
												@php
													$totalproductos2 = $totalproductos2 + $item->quantity;
												@endphp
											@endforeach
											<span id="totalproductoscarrito">{{$totalproductos2}}</span></div>
									</a>
									
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="{{route('homeCliente')}}">Inicio</a></li>
						@yield('lista')
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		@yield('encabezadoC')
		<!-- /BREADCRUMB -->

		<!-- SECTION  contenidos  -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					@yield('content')
				<!-- /shop -->
				</div>
			@yield('content3')
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
		<!-- /SECTION -->

		<!-- SECTION2  contenidos  -->
				@yield('content2')
		<!-- /SECTION2 -->
		
		<!-- INAGEN  -->
		@yield('imagen')
		<!-- /IMAGEN -->

		<!-- LISTA  -->
		@yield('listas')
		<!-- /LISTA -->

		<!-- LISTA  -->
		@yield('comentarios')
		<!-- /LISTA -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Suscríbase a la <strong> CARTA DE NOTICIAS</strong></p>
							<form>
								<input class="input" type="email" placeholder="Ingresa Tu Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribete</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
							<div class="col-md-4 col-xs-6">
									<div class="footer">
										<h3 class="footer-title">Acerca de nostros</h3>
										<p>Crystal Media:</p>
										<p>Somos un equipo de multidisciplinarios creativos integrando una empresa de Consultoría eBusiness. </p>
												
										<ul class="footer-links">
											<li><a href="#"><i class="fa fa-phone"></i> (222)693 4056</a></li>
											<li><a href="#"><i class="fa fa-envelope-o"></i> info@crystalmedia.mx</a></li>
											<li><a href="#"><i class="fa fa-map-marker"></i> 16 Sep. 1911-201B El Carmen, Puebla.</a></li>
										</ul>
									</div>
								</div>

								<div class="col-md-4 col-xs-6">
										<div class="footer">
											<h3 class="footer-title">Categorias</h3>
											<ul class="footer-links">
												@foreach ( $datosC as $item )
													<li><a href="{{route('tCliente', ''.$item->id_categoria.'')}}">{{$item->nombre_c}}</a></li>
												@endforeach 
											</ul>
										</div>
								</div>
						<div class="clearfix visible-xs"></div>

						<div class="col-md-4 col-xs-6">
								<div class="footer">
									<h3 class="footer-title">Información</h3>
									<ul class="footer-links">
										<li><a href="https://crystalmedia.mx/quelogramos.html">Que logramos</a></li>
										<li><a href="https://crystalmedia.mx/quehacemos.html">Que hacemos</a></li>
										<li><a href="https://crystalmedia.mx/exito.html">Casos de éxito</a></li>
										<li><a href="https://crystalmedia.mx/conocenos.html">Conocenos</a></li>
										<li><a href="https://crystalmedia.mx/contacto.html">Contacto</a></li>
									</ul>
								</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->
			@yield('modal')
			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-md-12 text-center">
								<span class="copyright" >Copyright &copy; 2019 All rights reserved | Designed by <a href="https://crystalmedia.mx" >Crystal Media</a></span>
	
							</div>
						</div>
							<!-- /row -->
					</div>
					<!-- /container -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->

		<!-- jQuery Plugins -->
		<script src="\assets\usu-tienda\js\jquery.min.js"></script>
		<script src="\assets\usu-tienda\js\bootstrap.min.js"></script>
		<script src="\assets\usu-tienda\js\slick.min.js"></script>
		<script src="\assets\usu-tienda\js\nouislider.min.js"></script>
		<script src="\assets\usu-tienda\js\jquery.zoom.min.js"></script>
		<script src="\assets\usu-tienda\js\main.js"></script>
		@yield('scripts')
	</body>
</html>