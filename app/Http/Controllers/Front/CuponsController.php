<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Cupon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CuponsController extends Controller
{
    //cupon apply with ajax
//    public function applyCoupon(Request $request){
//        Session::forget('CouponAmount');
//        Session::forget('CouponCode');
//        if ($request->ajax()){
//            $data  = $request->all();
////            echo "<pre>"; print_r($data); die;
//            // echo "<pre>";print_r($data);die;
//            $couponCount = Cupon::where('coupon_code',$data['coupon_code'])->count();
//            if($couponCount == 0){
//                $session_id = Session::get('session_id');
//                $carts = DB::table('carts')->where(['session_id' =>$session_id])->get();
//
//                foreach ($carts as $key=>$products){
//                    $productsDetails = DB::table('products')->where(['id'=>$products->pro_id])->first();
//                    $carts [$key]->image = $productsDetails->product_thumbnail_image;
//                    $carts [$key]->product_quantity = $productsDetails->product_quantity;
//                }
//                $cartItem = view('front.ajax-cartItem', compact('carts'))->render();
//                return response()->json(['status'=>false, 'message'=> 'this coupon is not valid','item' => $cartItem]);
//            }
//            else{
//                // echo "Success";die;
//                $couponDetails = Cupon::where('coupon_code',$data['coupon_code'])->first();
//                //Coupon code status
//                if($couponDetails->status==0){
//                    $session_id = Session::get('session_id');
//                    $carts = DB::table('carts')->where(['session_id' =>$session_id])->get();
//
//                    foreach ($carts as $key=>$products){
//                        $productsDetails = DB::table('products')->where(['id'=>$products->pro_id])->first();
//                        $carts [$key]->image = $productsDetails->product_thumbnail_image;
//                        $carts [$key]->product_quantity = $productsDetails->product_quantity;
//                    }
//                    $cartItem = view('front.ajax-cartItem', compact('carts'))->render();
//                    return response()->json(['status'=>false, 'message'=> 'Coupon code is not active','item' => $cartItem]);
//                }
//                //Check coupon expiry date
//                $expiry_date = $couponDetails->expiry_date;
//                $current_date = date('d-m-Y');
//                if($expiry_date < $current_date){
//                    $session_id = Session::get('session_id');
//                    $carts = DB::table('carts')->where(['session_id' =>$session_id])->get();
//
//                    foreach ($carts as $key=>$products){
//                        $productsDetails = DB::table('products')->where(['id'=>$products->pro_id])->first();
//                        $carts [$key]->image = $productsDetails->product_thumbnail_image;
//                        $carts [$key]->product_quantity = $productsDetails->product_quantity;
//                    }
//                    $cartItem = view('front.ajax-cartItem', compact('carts'))->render();
//                    return response()->json(['status'=>false, 'message'=> 'Coupon Code is Expired','item' => $cartItem]);
//                }
//                //Coupon is ready for discount
//                $session_id = Session::get('session_id');
//
////                if(Auth::check()){
////                    $user_email = Auth::user()->email;
////                    $userCart = DB::table('carts')->where(['user_email'=>$user_email])->get();
////                }else{
//                    $session_id = Session::get('session_id');
//                    $carts = DB::table('carts')->where(['session_id'=>$session_id])->get();
////                }
//                $total_amount = 0;
//                foreach($carts as $item){
//                    $total_amount = $total_amount + ($item->pro_price*$item->pro_quantity);
//                }
//                //Check if coupon amount is fixed or percentage
//                if($couponDetails->amount_type=="Fixed"){
//                    $couponAmount = $couponDetails->amount;
//                }else{
//                    $couponAmount = $total_amount * ($couponDetails->amount/100);
//                    $coupon = intval($couponAmount);
//                    // echo $coupon;die;
//                }
//                //Add Coupon code in session
//                Session::put('CouponAmount',$couponAmount);
//                Session::put('CouponCode',$data['coupon_code']);
//
//                foreach ($carts as $key=>$products){
//                    $productsDetails = DB::table('products')->where(['id'=>$products->pro_id])->first();
//                    $carts [$key]->image = $productsDetails->product_thumbnail_image;
//                    $carts [$key]->product_quantity = $productsDetails->product_quantity;
//                }
//                $cartItem = view('front.ajax-cartItem', compact('carts'))->render();
//                return response()->json(['status'=>true, 'message'=> 'Coupon Code is Successfully Applied.You are Availing Discount','item' => $cartItem]);
//            }
//        }
//    }
    public function applyCouponPhp(Request $request){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        if ($request->isMethod('post')){
            $data  = $request->all();
//            echo "<pre>"; print_r($data); die;
            // echo "<pre>";print_r($data);die;
            $couponCount = Cupon::where('coupon_code',$data['coupon_code'])->count();
            if($couponCount == 0){
                Toastr::error('this coupon is not valid', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
            else{
                // echo "Success";die;
                $couponDetails = Cupon::where('coupon_code',$data['coupon_code'])->first();
                //Coupon code status
                if($couponDetails->status==0){
                    Toastr::error('Coupon code is not active', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
                //Check coupon expiry date
                $expiry_date = $couponDetails->expiry_date;
                $current_date = date('d-m-Y');
                if($expiry_date < $current_date){
                    Toastr::error('Coupon Code is Expired', 'Error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
                //Coupon is ready for discount
                $session_id = Session::get('session_id');

//                if(Auth::check()){
//                    $user_email = Auth::user()->email;
//                    $userCart = DB::table('carts')->where(['user_email'=>$user_email])->get();
//                }else{
                $session_id = Session::get('session_id');
                $carts = DB::table('carts')->where(['session_id'=>$session_id])->get();
//                }
                $total_amount = 0;
                foreach($carts as $item){
                    $total_amount = $total_amount + ($item->pro_price*$item->pro_quantity);
                }
                //Check if coupon amount is fixed or percentage
                if($couponDetails->amount_type=="Fixed"){
                    $couponAmount = $couponDetails->amount;
                }else{
                    $couponAmount = $total_amount * ($couponDetails->amount/100);
                    $coupon = intval($couponAmount);
                    // echo $coupon;die;
                }
                //Add Coupon code in session
                Session::put('CouponAmount',$couponAmount);
                Session::put('CouponCode',$data['coupon_code']);
                Toastr::success('Coupon Code is Successfully Applied.You are Availing Discount', 'Success', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        }
    }
}
