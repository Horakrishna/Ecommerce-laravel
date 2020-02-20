<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;


class CartController extends Controller
{
    public function addToCart(Request $request){
    	
    	$product =Product::find($request->id);

    	Cart::add(array(
    		'id'        => $rowId ,
    		'name'      => $product->product_name,
    		'price'     => $product->product_price,
    		'quantity'  => $request->quantity,
    		'attributes' => array(
					       'image' => $product->product_image
					    )
    	));

    	return redirect('/cart/show');
    }
    public function showCart(){
    	$cartProducts =Cart::getContent();

    	//return $cartProducts;
    	return view('front-end.cart.show-cart',['cartProducts'=>$cartProducts]);
    }
    public function deleteCart($id){

    	Cart::remove($id);
		return redirect('/cart/show-cart');
    }
}
