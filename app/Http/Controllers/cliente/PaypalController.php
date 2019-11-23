<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Models\Admin\Direcciones;
use App\Models\Admin\Pedido;
use App\Models\Admin\DetallesPedido;
use DB;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class PaypalController extends Controller
{
    private $_api_context;
	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
    }
    
    public function postPagar()
	{
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		$items = array();
		$subtotal = 0;
		$cart = \Session::get('cart');
        $currency = 'MXN';
        
		foreach($cart as $producto){
			$item = new Item();
			$item->setName($producto->nombre_p)
			->setCurrency($currency)
			->setDescription($producto->descripcion_producto)
			->setQuantity($producto->quantity)
			->setPrice($producto->precio_iva);
			$items[] = $item;
			$subtotal += $producto->quantity * $producto->precio_iva;
		}
		$item_list = new ItemList();
        $item_list->setItems($items);
        
        //obtener el costo del tranporte
		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping(100);
        $total = $subtotal + 100;
        

		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
            ->setDetails($details);
    

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
            ->setDescription('Pedido de prueba en mi Laravel App Store');
        
        
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('pago.status'))
            ->setCancelUrl(\URL::route('pago.status'));
            
        
		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));
		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}
		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
		return \Redirect::route('carritoC')
			->with('error', 'Ups! Error desconocido.');
    }
    
    public function getPaymentStatus()
	{
        $cart = \Session::get('cart');
            $datosC = DB::table('categorias')->where([['mostrado_c','=','1'],['id_categoria','!=','1'],['tipo_categoria','=','1']])->get();
            $datosPNuevos = DB::table('productos')->where([['estado','=','1'],['nuevo','=','1']])->get();
            $datosPOfertas = DB::table('productos')->where([['estado','=','1'],['oferta','=','1']])->get();
            $datosPExclusivo = DB::table('productos')->where([['estado','=','1'],['exclusivo','=','1']])->get();
            $datoscomentarios = DB::table('comentarios')->where([['estado','=','1']])->get();
            $datosdescuentos = DB::table('descuentos')->get();
            $datosDes = DB::table('descuentos')->get();
        // Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');
		// clear the session payment ID
		\Session::forget('paypal_payment_id');
		$payerId = \Request::input('PayerID');
		$token = \Request::input('token');
		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
            return view('tiendaCliente.homeCliente', compact('cart','datosDes','datosC','datosPNuevos','datosPOfertas','datosPExclusivo','datoscomentarios','datosdescuentos'))->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}
		$payment = Payment::get($payment_id, $this->_api_context);
		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Request::input('PayerID'));
		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);
		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// 
			return request('email');
			$this->saveOrder(\Session::get('cart'));
			\Session::forget('cart');
            return view('tiendaCliente.homeCliente', compact('cart','datosDes','datosC','datosPNuevos','datosPOfertas','datosPExclusivo','datoscomentarios','datosdescuentos'));
              
		}
        return view('tiendaCliente.homeCliente', compact('cart','datosDes','datosC','datosPNuevos','datosPOfertas','datosPExclusivo','datoscomentarios','datosdescuentos'));
          
	}
	private function saveOrder($cart)
	{
		$subtotal = 0;
		$cantidad= 0;
	    foreach($cart as $item){
			$subtotal += $item->price * $item->quantity;
			$cantidad += $cantidad + $item->quantity;
		}
		$idusuario = DB::table('usuarios')->where('email','=',request('email'))->get('id');
      	$id="";
      	foreach($idusuario as $item){
        	$id=$item->id;
     	 }
		Direcciones:: create([
			'calle' => request('calle'),
			'codigo' => request('codigo'),
			'localidad' => request('localidad'),
			'ciudad' => request('ciudad'),
			'municipio' => request('municipio'),
			'id_usuario' => $id,
			'numero_e' => request('numero_e'),
			'numero_i' => request('numero_i'),
			'telefono' => request('telefono'),
		  ]);
		$iddireccion = DB::table('direcciones')->where(['id_usuario','=',''.$id.''],['calle','=',request('calle')])->get('id_direccion');
		$id_direccion="";
		  
      	foreach($iddireccion as $item){
        	$id_direccion=$item->id_direccion;
		  }
		
		  $pedido = Pedido:: create([
			'id_transporte' => request('calle'),
			'id_usuario' => $id,
			'id_direccion' =>$id_direccion,
			'cantidad' => $cantidad,
		  ]);

		  foreach($cart as $item){
	        $this->saveOrderItem($item, $pedido->id);
	    }
	}

	private function saveOrderItem($item, $pedido_id)
	{
		$idproducto = DB::table('productos')->where(['id_usuario','=',''.$item->nombre_p.''])->get('id_producto');
		$id_producto="";
		  
      	foreach($idproducto as $i){
        	$id_producto=$i->id_producto;
		  }
		DetallesPedido::create([
			'id_pedido' => $pedido_id,
			'id_producto' => $id_producto,
			'cantidad_detp' => $item->quantity,
		]);
	}


}
