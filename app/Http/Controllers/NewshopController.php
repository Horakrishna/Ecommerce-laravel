<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\View;
class NewshopController extends Controller
{
    public function index(){
    	
    	$newProducts =Product::where('publication_stutus',1)
    						->orderBy('id','ASC')
    						->take(8)
    						->get();
        return view('front-end.home.home',[
        	'newProducts'  =>$newProducts
        ]);
    }

    public function productCategory($id){

    	$categoryProducts =Product::where('category_id',$id)
    							  ->where('publication_stutus',1)
    							  ->get();
        return view('front-end.category.product-category',[
        	'categoryProducts'=>$categoryProducts
        ]);
    }

    public function productDetails($id){
    	$product =Product::find($id);
    	return view('front-end.product.product-details',[
    		'product' =>$product
    	]);
    }
}
