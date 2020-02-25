<?php

//Front-end
Route::get('/',[
    'uses' =>'NewshopController@index',
    'as'   =>'/'
]);

Route::get('/category-product/{id}',[
    'uses' =>'NewshopController@productCategory',
    'as'   =>'category-product'
]);
Route::get('/product-details/{id}/{name}',[ 
    'uses' =>'NewshopController@productDetails',
    'as'   =>'product-details'
]);
//Add to cart
Route::post('/cart/add',[
    'uses' =>'CartController@addToCart',
    'as'   =>'add-to-cart'
]);
Route::get('/cart/show',[
    'uses' =>'CartController@showCart',
    'as'   =>'show-cart'
]);
Route::get('/cart/delete/{id}',[
    'uses'=>'CartController@deleteCart',
    'as'   =>'delete-cart-item'
]);
Route::post('/cart/update-cart',[
    'uses'=>'CartController@UpdateCart',
    'as'   =>'update-cart'
]);
Route::get('/checkout',[
    'uses'=>'CheckoutController@index',
    'as'   =>'checkout'
]);
Route::post('/customer/registration',[
    'uses' =>'CheckoutController@customerSignUp',
    'as'   =>'customer-sign-up'
]);
Route::post('/customer/coustomer-login',[
    'uses' =>'CheckoutController@customerLogin',
    'as'   =>'coustomer-login'
]);
Route::get('/customer/new-coustomer-login',[
    'uses' =>'CheckoutController@newCustomerLogin',
    'as'   =>'new-coustomer-login'
]);
Route::post('/customer/coustomer-logout',[
    'uses' =>'CheckoutController@customerLogout',
    'as'   =>'coustomer-logout'
]);
Route::get('/checkout/shipping',[
    'uses' =>'CheckoutController@shipingForm',
    'as'   =>'checkout-shiping'
]);
Route::post('/shipping/save',[
    'uses' =>'CheckoutController@shipingInfoSave',
    'as'   =>'new-shiping'
]);
Route::get('/checkout/payment',[
    'uses' =>'CheckoutController@paymentForm',
    'as'   =>'checkout-payment'
]);

Route::post('/checkout/order',[
    'uses' =>'CheckoutController@newOrder',
    'as'   =>'new-order'
]);

Route::get('/complete/order',[
    'uses' =>'CheckoutController@completeOrder',
    'as'   =>'complete-order'
]);
// Back-end

//Category
Route::get('/category/add-category',[
   'uses' => 'CategoryController@addCategory',
    'as'  =>'add-category'
]);
Route::post('/category/new-category',[
    'uses' => 'CategoryController@saveCategory',
    'as'   =>'new-category'
]);
Route::get('/category/unpublished/{id}',[
    'uses' =>'CategoryController@unpublishedCatgory',
    'as'   =>'unpublished-category'
 ]);
Route::get('/category/published/{id}',[
    'uses' =>'CategoryController@publishedCategory',
    'as'   =>'published-category'
]);
Route::get('/category/edit/{id}', [
    'uses' =>'CategoryController@editCatagory',
    'as'   =>'edit-category'
]);
Route::post('/category/update',[
    'uses' =>'CategoryController@udpateCategoryInfo',
    'as'   =>'update-category'
]);
Route::get('/category/manage-category',[
    'uses' =>'CategoryController@manageCategory',
    'as'   =>'manage-category'
]);
Route::post('/category/delete',[
    'uses' =>'CategoryController@deleteCategory',
    'as'   =>'delete-category'
]);
//End Category

//Brand
Route::get('/brand/add-brand',[
    'uses' =>'BrandController@index',
    'as'   =>'add-brand'
]);
Route::post('/brand/new-brand',[
    'uses' =>'BrandController@saveBrandInfo',
    'as'   =>'new-brand'
]);
Route::get('/brand/manage-brand',[
    'uses' =>'BrandController@manageBrandInfo',
    'as'   =>'manage-brand'
]);
Route::get('/brand/unpublished-brand/{id}',[
    'uses' =>'BrandController@unpublishedBrandInfo',
    'as'   =>'unpublished-brand'
]);
Route::get('/brand/published-brand/{id}',[
    'uses' =>'BrandController@publishedBrandInfo',
    'as'   =>'published-brand'
]);
Route::get('/brand/edit-brand/{id}',[
    'uses' =>'BrandController@editBrandInfo',
    'as'   =>'edit-brand'
]);
Route::post('/brand/update-brand',[
    'uses' =>'BrandController@updateBrandInfo',
    'as'   =>'update-brand'
]);
Route::post('/brand/delete',[
    'uses' =>'BrandController@deleteBrandInfo',
    'as'   =>'delete-brand'
]);
//Brand End
//Product 
Route::get('/product/add-product',[
    'uses' =>'ProductController@index',
    'as'   =>'add-product'
]);
Route::get('/product/manage-product',[
    'uses' =>'ProductController@manageProductInfo',
    'as'   =>'manage-product'
]);
Route::post('/product/new-product',[
    'uses' =>'ProductController@saveProductInfo',
    'as'   =>'new-product'
]);
Route::get('/product/unpublished-product/{id}',[
    'uses' =>'ProductController@unpublishedProductInfo',
    'as'   =>'unpublished-product'
]);
Route::get('/product/published-product/{id}',[
    'uses' =>'ProductController@publishedProductInfo',
    'as'   =>'published-product'
]);
Route::get('/product/edit-product/{id}',[
    'uses' =>'ProductController@editProductInfo',
    'as'   =>'edit-product'
]);
Route::post('/product/update-product',[
    'uses' =>'ProductController@updateProductInfo',
    'as'   =>'update-product'
]);
Route::post('/product/delete',[
    'uses' =>'ProductController@deleteProductInfo',
    'as'   =>'delete-product'
]);
Route::get('/order/manage-order',[
    'uses' =>'OrderController@manageOrderInfo',
    'as'   =>'manage-order'
]);

Route::get('/order/view-order-details/{id}',[
    'uses' =>'OrderController@viewOrderInfo',
    'as'   =>'view-order-details'
]);

Route::get('/order/invoice-order/{id}',[
    'uses' =>'OrderController@invoiceOrderInfo',
    'as'   =>'invoice-order'
]);
//Product End

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
