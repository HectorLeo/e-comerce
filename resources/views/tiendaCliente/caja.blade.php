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
    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Dirección de envio</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="calle" placeholder="Calle">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="codigo" placeholder="Codigo Postal">
                            </div>
                            <div class="form-group">
								<input class="input" type="text" name="localidad" placeholder="Localidad">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="ciudad" placeholder="Ciudad">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="municipio" placeholder="Municipio">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="numero_e" placeholder="Numero Exterior">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="numero_i" placeholder="Numero Interior">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="telefono" placeholder="Telefono">
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
																@if(($item->envio_gratis)==1)
																	<div>¡Gratis!</div>
																@else
																	<div>${{$item->precio_t}}</div>
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
																			@else
																				<div>${{$item->precio_t}}</div>
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
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								He leído y acepto los <a href="#"> términos y condiciones</a>
							</label>
						</div>
						<div class="payment-method">
							<label for="">Realizar pago:</label>
								<img class=" lazyloaded" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" data-src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" style="width: auto; height: auto;">
						</div>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
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