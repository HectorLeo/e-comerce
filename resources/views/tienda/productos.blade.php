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

@endif
@endsection

@section('content3')

@endsection