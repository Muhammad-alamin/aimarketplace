<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//register
Route::get('/user-register',[App\Http\Controllers\CustomRegisterController::class,'index'])->name('custom_register');
Route::post('/user-store',[App\Http\Controllers\CustomRegisterController::class,'store'])->name('user.store');

//admin
Route::get('admin/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'view'])->name('admin.dashboard');

// category
Route::get('create/admin/category',[App\Http\Controllers\Admin\CategoryController::class,'view'])->name('admin.category');
Route::get('admin/category/list',[App\Http\Controllers\Admin\CategoryController::class,'index'])->name('admin.category.list');
Route::post('store/admin/category',[App\Http\Controllers\Admin\CategoryController::class,'store'])->name('admin.category.store');
Route::get('store/admin/category/{id}',[App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('admin.category.edit');
Route::post('update/admin/category/{id}',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('admin.category.update');
Route::get('delete/admin/category/{id}',[App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('admin.category.delete');


//slider
Route::get('create/slider',[App\Http\Controllers\Admin\SliderController::class,'view'])->name('admin.slider');
Route::get('slider/list',[App\Http\Controllers\Admin\SliderController::class,'index'])->name('admin.slider.list');
Route::post('store/slider',[App\Http\Controllers\Admin\SliderController::class,'store'])->name('admin.slider.store');
Route::get('edit/slider/{id}',[App\Http\Controllers\Admin\SliderController::class,'edit'])->name('admin.slider.edit');
Route::post('update/slider/{id}',[App\Http\Controllers\Admin\SliderController::class,'update'])->name('admin.slider.update');
Route::get('delete/slider/{id}',[App\Http\Controllers\Admin\SliderController::class,'delete'])->name('admin.slider.delete');


//product category
Route::get('create/product/category','Admin\ProductCategoryController@view')->name('admin.product.category');
Route::get('product/category/list','Admin\ProductCategoryController@index')->name('admin.product.category.list');
Route::post('store/product/category','Admin\ProductCategoryController@store')->name('admin.product.category.store');
Route::get('store/product/category/{id}','Admin\ProductCategoryController@edit')->name('admin.product.category.edit');
Route::post('update/product/category/{id}','Admin\ProductCategoryController@update')->name('admin.product.category.update');
Route::get('delete/product/category/{id}','Admin\ProductCategoryController@delete')->name('admin.product.category.delete');

//professional
Route::get('create/professional','Admin\ProfessionalController@view')->name('admin.professional');
Route::get('professional/list','Admin\ProfessionalController@index')->name('admin.professional.list');
Route::post('store/professional','Admin\ProfessionalController@store')->name('admin.professional.store');
Route::get('edit/professional/{id}','Admin\ProfessionalController@edit')->name('admin.professional.edit');
Route::post('update/professional/{id}','Admin\ProfessionalController@update')->name('admin.professional.update');
Route::get('delete/professional/{id}','Admin\ProfessionalController@delete')->name('admin.professional.delete');


//projects
Route::get('create/projects','Admin\projectsController@view')->name('admin.projects');
Route::get('projects/list','Admin\projectsController@index')->name('admin.projects.list');
Route::post('store/projects','Admin\projectsController@store')->name('admin.projects.store');
Route::get('edit/projects/{id}','Admin\projectsController@edit')->name('admin.projects.edit');
Route::post('update/projects/{id}','Admin\projectsController@update')->name('admin.projects.update');
Route::get('delete/projects/{id}','Admin\projectsController@delete')->name('admin.projects.delete');

//products
Route::get('admin/create/products',[App\Http\Controllers\Admin\ProductsController::class,'view'])->name('admin.products');
Route::get('admin/products/list',[App\Http\Controllers\Admin\ProductsController::class,'index'])->name('admin.products.list');
Route::post('admin/store/products',[App\Http\Controllers\Admin\ProductsController::class,'store'])->name('admin.products.store');
Route::get('admin/edit/products/{id}',[App\Http\Controllers\Admin\ProductsController::class,'edit'])->name('admin.products.edit');
Route::post('admin/update/products/{id}',[App\Http\Controllers\Admin\ProductsController::class,'update'])->name('admin.products.update');
Route::get('admin/delete/products/{id}',[App\Http\Controllers\Admin\ProductsController::class,'delete'])->name('admin.products.delete');

//articles
Route::get('admin/create/articles','Admin\ArticlesController@view')->name('admin.articles');
Route::get('admin/articles/list','Admin\ArticlesController@index')->name('admin.articles.list');
Route::post('admin/store/articles','Admin\ArticlesController@store')->name('admin.articles.store');
Route::get('admin/edit/articles/{id}','Admin\ArticlesController@edit')->name('admin.articles.edit');
Route::post('admin/update/articles/{id}','Admin\ArticlesController@update')->name('admin.articles.update');
Route::get('admin/delete/articles/{id}','Admin\ArticlesController@delete')->name('admin.articles.delete');

//admin
Route::get('/admin-profile','Admin\ProfileController@index')->name('admin.profile');
Route::get('/admin-profile/pic','Admin\ProfileController@updatePic')->name('admin.profile.pic');
Route::post('/admin-profile-update/{id}','Admin\ProfileController@updateAdmin')->name('admin.profile.update');
Route::post('/admin-profile-pic-update/{id}','Admin\ProfileController@updateAdminPic')->name('admin.profile.pic.update');



//Supplier

Route::get('seller/dashboard',[App\Http\Controllers\Seller\DashboardController::class,'view'])->name('seller.dashboard');

//products
Route::get('seller/create/products',[App\Http\Controllers\Seller\ProductsController::class,'view'])->name('seller.products');
Route::get('seller/products/list',[App\Http\Controllers\Seller\ProductsController::class,'index'])->name('seller.products.list');
Route::post('seller/store/products',[App\Http\Controllers\Seller\ProductsController::class,'store'])->name('seller.products.store');
Route::get('seller/edit/products/{id}',[App\Http\Controllers\Seller\ProductsController::class,'edit'])->name('seller.products.edit');
Route::post('seller/update/products/{id}',[App\Http\Controllers\Seller\ProductsCsellerontroller::class,'update'])->name('seller.products.update');
Route::get('seller/delete/products/{id}',[App\Http\Controllers\Seller\ProductsController::class,'delete'])->name('seller.products.delete');

//front
Route::get('/',[App\Http\Controllers\Front\HomeController::class, 'index'])->name('front.home');
Route::get('shop',[App\Http\Controllers\Front\HomeController::class, 'fetch_all_product'])->name('front.shop');
Route::get('category-product/{id}',[App\Http\Controllers\Front\HomeController::class, 'fetch_category_product'])->name('category.product');
Route::get('/product/details/{id}/',[App\Http\Controllers\Front\HomeController::class, 'productDetails'])->name('product.details');

//register
Route::get('/seller-register',[App\Http\Controllers\Seller\SellerRegisterController::class,'index'])->name('seller_register');
Route::post('/seller-store',[App\Http\Controllers\Seller\SellerRegisterController::class,'store'])->name('seller.store');

//add to cart with php
Route::post( '/add-to-cart',[App\Http\Controllers\Front\CartController::class,'addCart'])->name('addToCart');
Route::match(['get','post'], '/cart',[App\Http\Controllers\Front\CartController::class,'cart'])->name('cart');
Route::post( '/cart/delete-products/{id}',[App\Http\Controllers\Front\CartController::class,'delete'])->name('delete.cart.product');
Route::get( '/update/quantity/increment/{id}/{quantity}',[App\Http\Controllers\Front\CartController::class,'increment'])->name('cart.quantity.increment');
Route::get( '/update/quantity/decrement/{id}/{quantity}',[App\Http\Controllers\Front\CartController::class,'decrement'])->name('cart.quantity.decrement');

//update cart quantity with ajax
Route::post( '/update-cart-item-qty-ajax',[App\Http\Controllers\Front\CartController::class,'updateCartQtyAjax']);

//remove cart item with ajax
Route::post( 'cart-item/delete/{id}',[App\Http\Controllers\Front\CartController::class,'item'])->name('remove-cart-item');

//delete cart item with ajax
Route::post( '/delete-cart-item-ajax',[App\Http\Controllers\Front\CartController::class,'deleteCartItem']);

Route::match(['get','post'],'/checkout',[App\Http\Controllers\Front\CheckoutController::class,'index'])->name('checkout');

Route::post('/billing-address',[App\Http\Controllers\Front\CheckoutController::class,'store'])->name('billingAddress.store');

