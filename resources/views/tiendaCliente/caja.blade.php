@extends('layouts.app-client')
@section('iniciarsesion')
<li><a href="{{route('cuenta')}}"><i class="fa fa-user-o"></i> {{session()->get('email') ?? 'Invitado'}} </a> <a href="{{route('logoutC')}}" class="btn btn-xs btn-danger">Salir</a></li>
@endsection
@section('category')
    @foreach ( $datosC as $item )
        <option value="0">{{$item->nombre_c}}</option>
    @endforeach 
@endsection
@section('lista')
    @foreach ( $datosC as $item )
        <li><a href="{{route('tCliente', ''.$item->id_categoria.'')}}">{{$item->nombre_c}}</a></li>
    @endforeach 
@endsection
@section('content')
    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<form action="{{route('pago')}}" method="GET" enctype="multipart/form-data">
					@csrf
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Dirección de envio</h3>
							</div>
							<input class="input" type="hidden" name="email" id="email" value="{{session()->get('email')}}" required>
							<div class="form-group">
								<input class="input" type="text" name="calle" id="calle" placeholder="Calle" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="codigo" id="codigo" placeholder="Codigo Postal" required>
                            </div>
                            <div class="form-group">
								<input class="input" type="text" name="localidad" id="localidad" placeholder="Localidad" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="municipio" id="municipio" placeholder="Municipio" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="numero_e" id="numero_e" placeholder="Numero Exterior" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="numero_i" id="numero_i" placeholder="Numero Interior">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="telefono" id="telefono" placeholder="Telefono" required>
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Su Orden</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCTO</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							@php
										$total=0;
										$total_t=0;
							@endphp
							<div class="order-products">
								@foreach ($cart as $item)
									<div class="order-col">
										<div>{{$item->quantity}} {{$item->nombre_p}}</div>
										<div>${{$item->quantity*$item->precio_iva}}</div>
									</div>
									@php
										$total=$total+($item->quantity*$item->precio_iva);
									@endphp
								@endforeach
							</div>
							<div><strong>TRANSPORTES</strong></div>
							<div class="payment-method">
									@foreach ($transportes as $item)
										@if(($item->id_transporte)==4)
											<div class="input-radio">
												<input type="radio" class=" trans" name="payment" id="payment_{{$item->id_transporte}}" id_aut="{{$item->id_transporte}}" value="{{$item->precio_t}}" checked>
												<label for="payment_{{$item->id_transporte}}"><span></span>{{$item->nombre_transporte}}</label>
												<div class="caption">
													<div class="order-products">
														<div class="order-col">
															<div>{{$item->retraso_transporte}}</div>
																@if(($item->envio_gratis)==1 || ($item->precio_t)==0)
																	<div>¡Gratis!</div>
																		<input type="hidden" name="preciot" id="preciot" value="0">
																@else
																	<div>${{$item->precio_t}}</div>
																	<input type="hidden" name="preciot" id="preciot" value="{{$item->precio_t}}">
																	@php
																		$total_t=$total+$item->precio_t;
																	@endphp
																@endif
														</div>
													</div>
												</div>
											</div>
										@else
											<div class="input-radio">
													<input type="radio" class=" trans" name="payment" id="payment_{{$item->id_transporte}}" id_aut="{{$item->id_transporte}}" value="{{$item->precio_t}}">
															<label for="payment_{{$item->id_transporte}}">
																<span></span>
																{{$item->nombre_transporte}}
															</label>
															<div class="caption">
																	<div class="order-products">
																		<div class="order-col">
																			<div>{{$item->retraso_transporte}}</div>
																			@if(($item->envio_gratis)==1)
																				<div>¡Gratis!</div>
																				<input type="hidden" name="preciot" id="preciot" value="{{$item->precio_t}}">
																			@else
																				<div>${{$item->precio_t}}</div>
																				<input type="hidden" name="preciot" id="preciot" value="{{$item->precio_t}}">
																				@php
																					$total_t=$total;
																				@endphp
																			@endif
																		</div>
																	</div>
													</div>
											</div>
										@endif
									@endforeach
								<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<input type="hidden" value="{{$total}}" id="tot" name="tot">
							<div><strong class="order-total"><span id="sumatotal" >{{$total_t}}</span></strong></div>
							</div>
						</div>
						
						<div class="input-checkbox">
							<input type="checkbox" id="terms" required>
							<label for="terms">
								<span></span>
								He leído y acepto los <a href="{{route('terminos')}}"> términos y condiciones</a>
							</label>
						</div>
						<div class="payment-method">
							<label for="">Realizar pago:</label>
							
							<button type="submit">	<img class=" lazyloaded" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" data-src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" style="width: auto; height: auto;"></button>
						</div>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</form>
		</div>
		<!-- /SECTION -->
@endsection
@section('scripts')
    <script  type="text/javascript">
        $(document).ready(function () {
            $('.trans').on('click',function (e) {
                
                var id = $(e.currentTarget).attr("id_aut");
				//console.log(id);
                var valor =  $(e.currentTarget).val();
                var total =  $("#tot").val();
                var pretransporte = $("#payment_"+id).val();
				//$("#payment_"+id).attr('checked',true);
                var value = (parseFloat(total ) + parseFloat(pretransporte));
                $("#sumatotal").text(value);
				
            });
        });
    </script>
 @endsection
 @section('recaptcha')
    {!! htmlScriptTagJsApi(['action' => 'homepage']) !!}
@endsection