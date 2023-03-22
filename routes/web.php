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

    //products approval
    Route::get('product/approval',[App\Http\Controllers\Admin\ProductApprovalController::class,'index'])->name('admin.product.approval');
    Route::get('product/edit/{id}',[App\Http\Controllers\Admin\ProductApprovalController::class,'edit'])->name('admin.product.edit');
    Route::put('product/update/{id}',[App\Http\Controllers\Admin\ProductApprovalController::class,'update'])->name('admin.product.update');
    Route::get('admin/products/delete/{id}',[App\Http\Controllers\Admin\ProductApprovalController::class,'delete'])->name('admin.product.delete');
    Route::get('admin/products/details/{id}',[App\Http\Controllers\Admin\ProductApprovalController::class,'details'])->name('admin.product.details');


//admin profile
Route::get('/admin-profile',[App\Http\Controllers\Admin\ProfileController::class,'index'])->name('admin.profile');
Route::get('/admin-profile/pic',[App\Http\Controllers\Admin\ProfileController::class,'updatePic'])->name('admin.profile.pic');
Route::post('/admin-profile-update/{id}',[App\Http\Controllers\Admin\ProfileController::class,'updateAdmin'])->name('admin.profile.update');
Route::post('/admin-profile-pic-update/{id}',[App\Http\Controllers\Admin\ProfileController::class,'updateAdminPic'])->name('admin.profile.pic.update');

    //orderlist
    Route::get('admin/order-list',[App\Http\Controllers\Admin\OrderController::class,'index'])->name('order.index');
    Route::get('admin/order/details/{id}',[App\Http\Controllers\Admin\OrderController::class,'show'])->name('admin.order.show');
    Route::put('admin/order/{id}/{status}',[App\Http\Controllers\Admin\OrderController::class,'change_status'])->name('admin.order.change.status');
    Route::get('admin/orders/export/{status}',[App\Http\Controllers\Admin\OrderController::class,'export'])->name('admin.order.export');

    //Invoice
    Route::get('invoice/{id}',[App\Http\Controllers\Admin\OrderController::class,'invoice'])->name('invoice');

    //Invoice pdf
    Route::get('pdf/{id}','Admin\OrderController@invoicePdf')->name('invoice-pdf');

    //Invoice print
    Route::get('print/{id}',[App\Http\Controllers\Admin\OrderController::class,'invoicePrint'])->name('invoice-print');

     // Sales Report
     Route::get('daily/report',[App\Http\Controllers\Admin\OrderController::class,'dailyReport'])->name('daily.report');
     Route::get('daily/report/details/{id}',[App\Http\Controllers\Admin\OrderController::class,'salesDetails'])->name('admin.sales.details');
     Route::get('monthly/report',[App\Http\Controllers\Admin\OrderController::class,'monthlyReport'])->name('monthly.report');
     Route::get('yearly/report',[App\Http\Controllers\Admin\OrderController::class,'yearlyReport'])->name('yearly.report');

//User Management

        // Add new user on admin panel
        Route::get('admin/create-new-user',[App\Http\Controllers\Admin\UserManageController::class,'addUser'])->name('admin.new.user');
        Route::post('admin/new-user-store',[App\Http\Controllers\Admin\UserManageController::class,'store'])->name('admin.store.user');
        Route::get('admin/user-list',[App\Http\Controllers\Admin\UserManageController::class,'userList'])->name('admin.userList');
        Route::get('admin/edit/user/{id}',[App\Http\Controllers\Admin\UserManageController::class,'editUser'])->name('admin.editUser');
        Route::put('admin/update/user/{id}',[App\Http\Controllers\Admin\UserManageController::class,'updateUser'])->name('admin.updateUser');
        Route::get('admin/delete/user/{id}',[App\Http\Controllers\Admin\UserManageController::class,'deleteUser'])->name('admin.deleteUser');

        //customer manage
        Route::get('admin/customer/list',[App\Http\Controllers\Admin\UserManageController::class,'customerList'])->name('admin.customerList');
        Route::get('admin/edit/customer/{id}',[App\Http\Controllers\Admin\UserManageController::class,'editCustomer'])->name('admin.editCustomer');
        Route::put('admin/update/customer/{id}',[App\Http\Controllers\Admin\UserManageController::class,'updateCustomer'])->name('admin.updateCustomer');
        Route::get('admin/delete/customer/{id}',[App\Http\Controllers\Admin\UserManageController::class,'deleteCustomer'])->name('admin.deleteCustomer');
        Route::get('send-message/customer/{id}',[App\Http\Controllers\Admin\UserManageController::class,'description'])->name('sendMessage.customer');
        Route::post( 'customer-send-email',[App\Http\Controllers\Admin\UserManageController::class,'sendEmail'])->name('customer.send.message');


    //seller manage
        Route::get('admin/seller/list',[App\Http\Controllers\Admin\UserManageController::class,'sellerList'])->name('admin.sellerList');
        Route::get('admin/edit/seller/{id}',[App\Http\Controllers\Admin\UserManageController::class,'editSeller'])->name('admin.editSeller');
        Route::put('admin/update/seller/{id}',[App\Http\Controllers\Admin\UserManageController::class,'updateSeller'])->name('admin.updateSeller');
        Route::get('admin/delete/seller/{id}',[App\Http\Controllers\Admin\UserManageController::class,'deleteSeller'])->name('admin.deleteSeller');


//front
Route::get('/',[App\Http\Controllers\Front\HomeController::class, 'index'])->name('front.home');
Route::get('shop',[App\Http\Controllers\Front\HomeController::class, 'fetch_all_product'])->name('front.shop');
Route::get('category-product/{id}',[App\Http\Controllers\Front\HomeController::class, 'fetch_category_product'])->name('category.product');
Route::get('/product/details/{id}/',[App\Http\Controllers\Front\HomeController::class, 'productDetails'])->name('product.details');

//Customer Account information
Route::middleware('auth')->group(function (){
    Route::match(['get','post'],'/checkout',[App\Http\Controllers\Front\CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('customer/edit/{id}',[App\Http\Controllers\Front\DashboardController::class, 'edit'])->name('customer.edit');
    Route::get('customer/update/{id}',[App\Http\Controllers\Front\DashboardController::class, 'update'])->name('customer.update');
    Route::get('/orders',[App\Http\Controllers\Front\DashboardController::class, 'orders'])->name('customer.orders');
    Route::get('/orders/details/{id}',[App\Http\Controllers\Front\DashboardController::class, 'details'])->name('customer.orders.details');
});

//register
Route::get('/seller-register',[App\Http\Controllers\Seller\SellerRegisterController::class,'index'])->name('seller_register');
Route::post('/seller-store',[App\Http\Controllers\Seller\SellerRegisterController::class,'store'])->name('seller.store');

//add to cart with php
Route::post( '/add-to-cart',[App\Http\Controllers\Front\CartController::class,'addCart'])->name('addToCart');
Route::match(['get','post'], '/cart',[App\Http\Controllers\Front\CartController::class,'cart'])->name('cart');
Route::post( '/cart/delete-products/{id}',[App\Http\Controllers\Front\CartController::class,'delete'])->name('delete.cart.product');
Route::get( '/update/quantity/increment/{id}/{quantity}',[App\Http\Controllers\Front\CartController::class,'increment'])->name('cart.quantity.increment');
Route::get( '/update/quantity/decrement/{id}/{quantity}',[App\Http\Controllers\Front\CartController::class,'decrement'])->name('cart.quantity.decrement');

//cart add Product with ajax
Route::post( '/add-cart-item',[App\Http\Controllers\Front\CartController::class,'ajaxCart'])->name('add-cart-ajax');


//cart item count with ajax
Route::get( 'load-cart-data',[App\Http\Controllers\Front\CartController::class,'cartCount']);

//update cart quantity with ajax
Route::post( '/update-cart-item-qty-ajax',[App\Http\Controllers\Front\CartController::class,'updateCartQtyAjax']);

//remove cart item with ajax
Route::post( 'cart-item/delete/{id}',[App\Http\Controllers\Front\CartController::class,'item'])->name('remove-cart-item');

//delete cart item with ajax
Route::post( '/delete-cart-item-ajax',[App\Http\Controllers\Front\CartController::class,'deleteCartItem']);

Route::match(['get','post'],'/checkout',[App\Http\Controllers\Front\CheckoutController::class,'index'])->name('checkout');

Route::post('/billing-address',[App\Http\Controllers\Front\CheckoutController::class,'store'])->name('billingAddress.store');

//success route
Route::get('success',[App\Http\Controllers\Front\CheckoutController::class,'success'])->name('success');


//Seller

Route::get('seller/dashboard',[App\Http\Controllers\Seller\DashboardController::class,'view'])->name('seller.dashboard');

//products
Route::get('seller/create/products',[App\Http\Controllers\Seller\ProductsController::class,'view'])->name('seller.products');
Route::get('seller/products/list',[App\Http\Controllers\Seller\ProductsController::class,'index'])->name('seller.products.list');
Route::post('seller/store/products',[App\Http\Controllers\Seller\ProductsController::class,'store'])->name('seller.products.store');
Route::get('seller/edit/products/{id}',[App\Http\Controllers\Seller\ProductsController::class,'edit'])->name('seller.products.edit');
Route::post('seller/update/products/{id}',[App\Http\Controllers\Seller\ProductsCsellerontroller::class,'update'])->name('seller.products.update');
Route::get('seller/delete/products/{id}',[App\Http\Controllers\Seller\ProductsController::class,'delete'])->name('seller.products.delete');

//stock Update
Route::get('stock/product/',[App\Http\Controllers\Seller\ProductsController::class,'productList'])->name('stock.product');
Route::get('stock/edit/{id}',[App\Http\Controllers\Seller\ProductsController::class,'stockEdit'])->name('stock.edit');
Route::put('stock/update/{id}',[App\Http\Controllers\Seller\ProductsController::class,'stockUpdate'])->name('stock.update');

//order
Route::get('vendor/order-list',[App\Http\Controllers\Seller\OrderController::class,'index'])->name('vendor.order.index');
Route::get('vendor/order/details/{id}',[App\Http\Controllers\Seller\OrderController::class,'show'])->name('vendor.order.show');

// Sales Report
Route::get('vendor/daily/report',[App\Http\Controllers\Seller\OrderController::class,'dailyReport'])->name('vendor.daily.report');
Route::get('vendor/monthly/report',[App\Http\Controllers\Seller\OrderController::class,'monthlyReport'])->name('vendor.monthly.report');
Route::get('vendor/yearly/report',[App\Http\Controllers\Seller\OrderController::class,'yearlyReport'])->name('vendor.yearly.report');
