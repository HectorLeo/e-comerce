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
                        <h3 class="title">Carrito</h3>
                    </div>
                    @if(count($cart)!=0)
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 10%">
                                </th>
                                <th style="width: 20%">
                                    Nombre
                                </th>
                                <th style="width: 30%">
                                    Precio
                                </th>
                                <th style="width: 10%">
                                    Cantidad
                                </th>
                                
                                <th style="width: 30%">
                                    Subtotal
                                </th>
                                <th style="width: 30%">
                        
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td>
                                        <img width="50px" height="50px" src="{{Storage::url($item->imagen_p)}}">
                                    </td>
                                    <td>
                                        <a>
                                            <input type="hidden" value=" {{$item->nombre_p}}" id="nombre{{$item->id_producto}}" name="nombre" >
                                            {{$item->nombre_p}}
                                        </a>
                                        
                                    </td>
                                    <td>
                                        <a>
                                            ${{$item->precio_iva}}
                                        </a>
                                    </td>
                                    <td>
                                        <input type="number" min="1" max="100" value="{{$item->quantity}}" id_aut="{{$item->id_producto}}" name="id_aut" class="quant" id="quant{{$item->id_producto}}">
                                    </td>
                                    <td>
                                        <input type="hidden" value=" {{$item->precio_iva}}" id="subtotal{{$item->id_producto}}" name="subtotal" >
                                        <span id="subt{{$item->id_producto}}">{{$item->quantity*$item->precio_iva }}</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a  href="{{route('delete',''.$item->nombre_p.'')}}">
                                      <button  class="btn btn-danger btn-sm delete_user" >
                                            <i class="fas fa-trash"></i> Eliminar
                                      </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="section-title">
                            <h3><span class="label label-warning">No hay productos en el carrito</span></h3>
                    </div>
                    @endif
                </div>
                <!-- /Billing Details -->
            </div>

            <!-- Order Details -->
            <div alingh="left" class="col-md-3 order-details">
                <br>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>Artículos</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    <div class="order-products">
                        @php
                            $total=0;
                            $i=0;
                            $totalproductos=0;
                        @endphp
                        @foreach ($cart as $item)
                            <div class="order-col">
                            
                            
                                <div>
                                    <span id="totalproducto{{$item->id_producto}}" >{{$item->quantity}}</span>
                                </div>
                                <div>$<span id="totalprecio{{$item->id_producto}}">{{$item->quantity*$item->precio_iva}}</span></div> 
                            
                                @php
                                    $total=$total+($item->quantity*$item->precio_iva);
                                    $totalproductos = $totalproductos + $item->quantity;
                                    $i++;
                                @endphp
                            </div> 
                        @endforeach
                        <hr>
                        <div class="order-col">
                            <div>
                                <span >Total: </span>
                            </div>
                            <div>$<span id="sumatotal" >{{$total}}</span></div> 
                            
                        </div> 
                        
                </div>
                <a href="{{route('loginC')}}" class="primary-btn order-submit">Iniciar sesión</a>
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
    <script src="{{ asset('js/cart.js') }}"></script>
 
    <script  type="text/javascript">
        $(document).ready(function () {
            $('.quant').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var id = $(e.currentTarget).attr("id_aut");
                var valor =  $(e.currentTarget).val();
                var precio =  $("#subtotal"+id).val();

                var sumatotal = $("#sumatotal").text();
                var totalprecio = $("#totalprecio"+id+"").text();
                var totalproducto = $("#totalproducto"+id+"").text();
                var totalproductoscarrito = $("#totalproductoscarrito").text();
                
                var subtotal=precio*valor
                $("#subt"+id+"").text(subtotal);
                $("#totalproducto"+id+"").text(valor);
                $("#totalprecio"+id+"").text(subtotal);

                var restaprecio =   subtotal - totalprecio;
                var restaproducto =     valor - totalproducto ;

                var value = (parseFloat(sumatotal ) + parseFloat(restaprecio));
                $("#sumatotal").text(value);
                var value2 = (parseInt(totalproductoscarrito ) + parseInt(restaproducto));
                $("#totalproductoscarrito").text(value2);
            });
        });
    </script>
 @endsection