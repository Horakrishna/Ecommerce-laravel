<?php

namespace App\Http\Controllers;
use App\Coustomer;
use App\Sheping;
use App\Order;
use App\OrderDetail;
use App\Payment;
use DB;
use Cart;

use Illuminate\Http\Request;
use Mail;
use Session;

class CheckoutController extends Controller
{
    public function index(){
    	return view('front-end.checkout.checkout');
    }

     public function customerSignUp(Request $request){

     	$this->validate($request, [
     		'user_email' => 'email|unique:coustomers,user_email'
     	]);
     	$coustomer = new Coustomer();

     	$coustomer->first_name        = $request->first_name;
     	$coustomer->last_name         = $request->last_name;
     	$coustomer->user_email        = $request->user_email;
     	$coustomer->password          = bcrypt($request->password);
     	$coustomer->phone             = $request->phone;
     	$coustomer->address           = $request->address;
     	$coustomer->save();

     	$coustomerId = $coustomer->id;
     	Session::put('coustomerId',$coustomerId);
     	Session::put('coustomerName',$coustomer->first_name.'.'.$coustomer->last_name);
     	
     	$data = $coustomer->toArray();
     	Mail::send('front-end.mails.confirmation-mail',$data, function($message) use($data) {
     			$message->to($data['user_email']);
     			$message->subject('Confirmation mail');
     	});

     	return redirect('/checkout/shipping');
     }

     public function customerLogin(Request $request){

         $coustomer = Coustomer::where('user_email' ,$request->user_email)->first();

   		// return $coustomer;
   		if (password_verify($request->password, $coustomer->password)) {
   			
	   		Session::put('coustomerId',$coustomer->id);
	     	Session::put('coustomerName',$coustomer->first_name.'.'.$coustomer->last_name);

	     	return redirect('/checkout/shipping');
   		}else{
   			
   			return redirect('/checkout')->with('message','Provide valid Password');
   		}
     }
     public function shipingForm(){

     	$coustomer =Coustomer::find(Session::get('coustomerId'));
     	return view('front-end.checkout.shiping',[ 'coustomer' => $coustomer ]);
     }

     public function shipingInfoSave(Request $request){
     	
     	$shiping = new Sheping();
     	$shiping->full_name   	     =$request ->full_name;
     	$shiping->email_address      =$request ->email_address;
     	$shiping->phone   			 =$request ->phone;
     	$shiping->address  	         =$request ->address;
     	$shiping->save();

     	Session::put('shepingID', $shiping->id);

     	return redirect('/checkout/payment');
     }

     public function paymentForm(){
     	return view('front-end.checkout.payment');
     }


     public function newOrder(Request $request){

     $paymentType = $request->payment_type;

     	if ($paymentType == 'cash') {

     		$order = new Order();
   			$order->coustomer_id = Session::get('coustomerId');
   			$order->shiping_id   = Session::get('shepingID');
   			$order->order_total  = Session::get('orderTotal');
   			$order->save();

     			$cartProducts =  Cart::content();

     			foreach ($cartProducts as $cartProduct) {
     				
     					$orderDetail = new OrderDetail();
     					$orderDetail->order_id          =$order->id;
     					$orderDetail->product_id        =$cartProduct->id;
     					$orderDetail->product_name      =$cartProduct->name;
     					$orderDetail->product_price     =$cartProduct->price;
     					$orderDetail->producct_quantity =$cartProduct->qty;
     					$orderDetail->save();
     				}	

     				Cart::destroy();
     				return redirect('/complete/order');


     	}elseif ($paymentType == 'paypal') {
     		
     	}elseif ($paymentType == 'bkash') {
     		
     	}

     }
     public function completeOrder(){
     		return 'success';
     }
    public function customerLogout(){
        Session::forget('coustomerId');
        Session::forget('coustomerName');

        return redirect('');
    }
    public function newCustomerLogin(){
        return view('front-end.coustomer.coustomer-login');
    }
}
