<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use Redirect;
use Session;

class BrandController extends Controller
{
    public function index(){

    	return view('admin.brand.add-brand');
    }

    public function saveBrandInfo(Request $request){
    	$this->validate($request, [
    		'brand_name'         => 'required|regex:/[\pL\s\-]+$/u| max:15|min:4',
    		'brand_dis'          => 'required',
    		'publication_stutus' => 'required'
    	]);

    	$brand = new Brand();
    	$brand->brand_name        = $request->brand_name;
    	$brand->brand_dis         = $request->brand_dis;
    	$brand->publication_stutus= $request->publication_stutus;
    	$brand->save();
    	
    	Session::flash('message','Successfully Added');
        return Redirect::back();
    }
    public function manageBrandInfo(){
    	$brands =Brand::all();
    	//return $brands;
    	return view('admin.brand.manage-brand',['brands'=>$brands]);
    }
    public function unpublishedBrandInfo($id){
    	$brand =Brand::find($id);
    	$brand->publication_stutus=0;
    	$brand->save();

    	return redirect('/brand/manage-brand')->with('message','Brand unpublished Successfully');

    }
    public function publishedBrandInfo($id){
    	$brand =Brand::find($id);
    	$brand->publication_stutus=1;
    	$brand->save();
    	return redirect('/brand/manage-brand')->with('message','Brand Published Successfully');
    }
    public function editBrandInfo($id){
    	$brand =Brand::find($id);

    	return view('admin.brand.edit-brand',['brand'=>$brand]);
    }

    public function updateBrandInfo(Request $request){
    	$brand =new Brand();

    	$brand->brand_name        = $request->brand_name;
    	$brand->brand_dis         = $request->brand_dis;
    	$brand->publication_stutus= $request->publication_stutus;
    	$brand->save();
    	return redirect('/brand/manage-brand')->with('message','Brand Update Successfully');
    }
    public function deleteBrandInfo(Request $request){
        $product =Product::where('brand_id',$request->id)->first();
        if ($product) {
            return redirect('/brand/manage-brand')->with('message','Brand could not Delete Successfully'); 
        }
    	$brand=Brand::find($request->id);
    	$brand->delete();
    return redirect('/brand/manage-brand')->with('message','Brand Delete Successfully');
    }
}
