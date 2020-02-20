<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use DB;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public  function  addCategory(){
        return view('admin.category.add-category');
    }
    public function saveCategory(Request $request){
        $this->validate($request,[
            'category_name'       =>'required|regex:/^[\pL\s\-]+$/u|max:15|min:3',
            'cat_dis'             =>'required',
            'publication_status'  =>'required',
        ]);

        $category = new Category();
        $category->category_name           =$request->category_name;
        $category->cat_dis                 =$request->cat_dis;
        $category->publication_status      =$request->publication_status;
        $category->save();

//        Category::create($request->all());

//        Query Builder
//        DB::table('categories')->insert([
//            'category_name'      =>$request->category_name,
//            'cat_dis'            =>$request->cat_dis,
//            'publication_status' =>$request->publication_status
//        ]);


        return redirect('/category/add-category')->with('message', 'Category info save successfully');


    }
    public  function  manageCategory(){
        $categories = Category::all();
        //return $categories;
        return view('admin.category.manage-category',['categories' =>$categories]);
    }
    public function unpublishedCatgory($id){
        $category =Category::find($id);
        $category->publication_status = 0;
        $category->save();

        return redirect('/category/manage-category')->with('message','category Unpublished save successfully');
    }
    public function publishedCategory($id){
        $category =Category::find($id);
        $category->publication_status =1;
        $category->save();
        return redirect('/category/manage-category')->with('message','category Published save successfully' );
   }

   public function editCatagory($id){
    $category =Category::find($id);

    return view('admin.category.edit-category',['category' =>$category ]);
   }

   public function udpateCategoryInfo(Request $request){
    
    $category =Category::find($request->category_id);

    $category->category_name =$request->category_name;
    $category->cat_dis       =$request->cat_dis;
    $category->publication_status=$request->publication_status;
    $category->save();

    return redirect('/category/manage-category')->with('message','Category Update Successfully');
   }

   public function deleteCategory(Request $request){
    $product = Product::where('category_id',$request->id)->first();
    if ($product) {
        return redirect('/category/manage-category')->with('message','Category  info couldnot Deleted.');

     }
    $category =Category::find($request->id);
    $category->delete();
    return redirect('/category/manage-category')->with('message','Category  info Delete Successfully');

   }

}
