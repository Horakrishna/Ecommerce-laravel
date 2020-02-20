<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use Image;
use DB;
class ProductController extends Controller
{
    public function index() {
    	$categories =Category::where('publication_status',1)->get();
    	$brands     =Brand::where('publication_stutus',1)->get();
    	return view('admin.product.add-product',[
    		'categories' =>$categories,
    		'brands'     =>$brands
    	]);
    }

    protected function productInfoValidate($request){
    	$this->validate($request,[
    		'product_name'      	=>'required|regex:/^[\pL\s\-]+$/u| max:15|min:4',
    		'product_price'     	=>'required',
    		'producct_quantity' 	=>'required',
    		'short_dis'         	=>'required',
    		'long_dis'          	=>'required',
    		'publication_stutus' 	=>'required',
    		'product_image'      	=>'mimes:jpeg,jpg,png|required|max:1000'
    	]);
    }
    protected function productImageUpload($request){
    	//buildin laravel
    	// $productImage  = $request->file('product_image');
    	// $imageName     = $productImage->getClientOriginalName();
    	// $directory     ='product-images/';
    	// $imageUrl      =$directory.$imageName;
    	// $productImage  ->move($directory, $imageName);

    	$productImage  =$request->file('product_image');
        $fileType      =$productImage->getClientOriginalExtension();
		$imageName     =$request->product_name.'.'.$fileType;
		$directory     ='product-images/';
		$imageUrl      =$directory.$imageName;
		Image::make($productImage)->resize(400,400)->save($imageUrl);

    	return $imageUrl;
    }

    protected function productBasicInfo($request,$imageUrl){
    	$product = new Product();

    	$product->category_id           =$request->category_id;
    	$product->brand_id              =$request->brand_id;
    	$product->product_name          =$request->product_name;
    	$product->product_price         =$request->product_price;
    	$product->producct_quantity     =$request->producct_quantity;
    	$product->short_dis             =$request->short_dis;
    	$product->long_dis              =$request->long_dis;
    	$product->product_image         =$imageUrl;
    	$product->publication_stutus    =$request->publication_stutus;
    	$product->save();
    }
    public function saveProductInfo(Request $request){
    	$this->productInfoValidate($request);
    	$imageUrl=$this->productImageUpload($request);
    	$this->productBasicInfo($request,$imageUrl);
    	

    	return redirect('/product/add-product')->with('message','Product info save successfully'); 	

    }
     public function manageProductInfo() {

     	  $products =DB::table('products')
     				->join('categories','products.category_id','=','categories.id')
     				->join('brands','products.brand_id', '=','brands.id')
     				->select('products.*','categories.category_name','brands.brand_name')
     				->get();
     	
    	return view('admin.product.manage-product',['products'=> $products]);
    }
    public function unpublishedProductInfo($id){
    	$product =Product::find($id);
    	$product->publication_stutus=0;
    	$product->save();
    	return redirect('/product/manage-product')->with('message','Product info Unpublished successfully');
    }
    public function publishedProductInfo($id){
    	$product =Product::find($id);
    	$product->publication_stutus=1;
    	$product->save();
    	return redirect('/product/manage-product')->with('message','Product info published successfully');
    }
    public function editProductInfo($id){
    	$category =Category::where('publication_status',1)->get();
    	$brand    =Brand::where('publication_stutus',1)->get();
    	$product  =Product::find($id);
    	return view('admin.product.edit-product',[
    		'product' =>$product,
    		'category'=>$category,
    		'brand'   =>$brand
    	]);
    }
    public function productBasicInfoUpdate($product,$request,$imageUrl=null){
    	    $product->category_id           =$request->category_id;
	    	$product->brand_id              =$request->brand_id;
	    	$product->product_name          =$request->product_name;
	    	$product->product_price         =$request->product_price;
	    	$product->producct_quantity     =$request->producct_quantity;
	    	$product->short_dis             =$request->short_dis;
	    	$product->long_dis              =$request->long_dis;
	    	if ($imageUrl) {
	    		$product->product_image     =$imageUrl;
	    	}
	    	$product->publication_stutus    =$request->publication_stutus;
	    	$product->save();
    }
    public function updateProductInfo(Request $request){
    	// $productImage =$_FILES['product_image'];
    	// echo '<pre>';
    	// print_r($productImage);
    	// echo $productImage->getMimeType();

       
       $productImage = $request->file('product_image');
       $product      = Product::find($request->product_id);

    	if($productImage) {
    		unlink($product->product_image);
    		$imageUrl= $this->productImageUpload($request);
    		$this->productBasicInfoUpdate($product,$request,$imageUrl);
    	
    	}else{
    	$this->productBasicInfoUpdate($product, $request);
    	}
    return redirect('/product/manage-product')->with('message','product Update Successfully');
    }

    public function deleteProductInfo(Request $request){
    	$product =Product::find($request->id);
    	$product->delete();
    	return redirect('/product/manage-product')->with('message','product delete Successfully');
    }
}
