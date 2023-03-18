<?php

namespace App\Http\Controllers\Front;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Model\Attributes;
use App\Model\DeliveryCharge;
use App\Models\Admin\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Location;
use phpDocumentor\Reflection\Types\String_;

class CartController extends Controller
{

    public function addCart(Request $request)
    {
        // dd($request->all());
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $data = $request->all();
//        echo "<pre>";print_r($data);die;
        $session_id = Session::get('session_id');

            if (empty($session_id)){
                $session_id = Str::random(40);
                Session::put('session_id',$session_id);
            }
            else{
                $countProducts = DB::table('carts')->where(['pro_id'=>$data['pro_id'],'session_id'=>$session_id])->count();

                    $products_qty = Product::where(['id'=>$data['pro_id']])->first();
                    if($countProducts>0){
                        Toastr::error('Product already exists in cart', 'Error', ["positionClass" => "toast-top-right"]);
                        return redirect()->back();
                    }
                    elseif ($data['quantity'] > $products_qty->quantity)
                    {
                        Toastr::error('stock not available', 'Error', ["positionClass" => "toast-top-right"]);
                        return redirect()->back();
                    }
                    else {
                        DB::table('carts')->insert(['pro_id' => $data['pro_id'],
                            'pro_name' => $data['pro_name'],
                            'user_id' => $data['user_id'],
                            'category_id' => $data['category_id'],
                            'pro_price' => $data['pro_price'],
                            'pro_size' => $data['pro_size'],
                            'pro_quantity' => $data['quantity'],
                            'session_id' => $session_id]);
                    }
            }

        Toastr::success('Item added to your cart', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function ajaxCart(Request $request )
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        if ($request->ajax()){
            $data = $request->all();

            $session_id = Session::get('session_id');
            if (empty($session_id)){
                $session_id = Str::random(40);
                Session::put('session_id',$session_id);
            }
//            echo "<pre>";print_r($data);die;
            $countProducts = DB::table('carts')->where(['pro_id'=>$data['product_id'], 'pro_code'=>$data['product_code'], 'pro_price'=>$data['product_price'],
                'session_id'=>$session_id])->count();

            $products_quantity = Product::where(['id'=>$data['product_id']])->first();

            if($countProducts>0){
                return response()->json(['status'=>false,'action'=>'error']);
//                return redirect()->back()->with('flash_message_error','Product already exists in cart');
            }
            elseif ($data['product_qty'] > $products_quantity->product_quantity)
            {
                return redirect()->back()->with('flash_message_error','stock not available');
            }
            else {
                DB::table('carts')->insert(['pro_id' => $data['product_id'],
                    'pro_name' => $data['product_name'],
                    'brand_id' => $data['brand_id'],
                    'category_id' => $data['category_id'],
                    'pro_code' => $data['product_code'],
                    'pro_price' => $data['product_price'],
                    'pro_quantity' => $data['product_qty'],
                    'session_id' => $session_id]);

//            $cart['id'] =$data['pro_id']; // inique row ID
//            $cart['name'] =$data['pro_name'];
//            $cart['price'] =$data['pro_price'];
//            $cart['quantity'] =$data['quantity'];
//            $cart['attributes'] =['code' => $data['pro_code'], 'size' => $sizeArr[1], 'colour' => $colourArr[1]];
//
//        \Cart::add($cart);
//
//        cardArray();

                return response()->json(['status'=>true,'action'=>'add']);
            }

        }

    }
    public function cartCount(){
        $session_id = \Illuminate\Support\Facades\Session::get('session_id');
        $cartCount = Cart::where('session_id',$session_id)->count();
        return response()->json(['count'=>$cartCount]);
    }

    public function item(Request $request , $id){
        if ($request->ajax()){
            $data = $request->all();
//            echo "<pre>";print_r($id);die;
//            $session_id = Session::get('session_id');
// //            $cartData = Cart::where(['id' => $id,'session_id'=>$session_id])->delete();
            deleteItem($id);
            return response()->json(['success' => 'Cart Delete'], 200);
        }
    }

    public function cart(Request $request){

        $session_id = Session::get('session_id');
        $userCart ['carts']= DB::table('carts')->where(['session_id' =>$session_id])->get();

       foreach ($userCart['carts']as $key=>$products){
           $productsDetails = DB::table('products')->where(['id'=>$products->pro_id])->first();
           $userCart['carts'][$key]->image = $productsDetails->image;
           $userCart['carts'][$key]->quantity = $productsDetails->quantity;
       }

//        echo "<pre>";print_r($attrStock);die;
//       dd($userCart);


        return view('front.cart',$userCart);
    }

    public function ajaxCartDataTopNav(){

        $session_id = Session::get('session_id');
        $userCart = DB::table('carts')->where(['session_id' =>$session_id])->get();

        foreach ($userCart as $key=>$products){
            $productsDetails = DB::table('products')->where(['id'=>$products->pro_id])->first();
            $userCart[$key]->image = $productsDetails->product_thumbnail_image;
        }
//        echo "<pre>";print_r($userCart);die;
        return response()->json(['cartItem'=>$userCart]);
    }

    public function delete($id){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('carts')->where('id',$id)->delete();
        return redirect()->route('Cart');
    }

//    public function increment($id=null, $quantity=null){
//        Session::forget('CouponAmount');
//        Session::forget('CouponCode');
//
//
//        $cartDetails = Cart::find($id);
////        dd($cartDetails->pro_quantity);
//        $product_details = Product::find($cartDetails->pro_id);
//        $attrStock = Attributes::where(['product_id' => $cartDetails->pro_id, 'attributes_size' => $cartDetails->pro_size])->first();
////        dd($attrStock->attributes_stock);
//
//        if (!empty($attrStock)){
//            if ($attrStock->attributes_stock > $cartDetails->pro_quantity ) {
//                DB::table('carts')->where('id', $id)->increment('pro_quantity', $quantity);
//            }
//            else
//            {
//                return redirect()->back()->with('flash_message_error','Stock not available');
//            }
//        }
//        elseif($product_details->product_quantity > $cartDetails->pro_quantity){
//           DB::table('carts')->where('id', $id)->increment('pro_quantity', $quantity);
//       }
//       else
//           {
//               return redirect()->back()->with('flash_message_error','Stock not available');
//       }
//
////        DB::table('carts')->where('id',$id)->increment('pro_quantity',$quantity);
//
//        return redirect()->back();
//    }
//
//    public function decrement($id=null, $quantity=null){
//        Session::forget('CouponAmount');
//        Session::forget('CouponCode');
//
//        $cartDetails = Cart::find($id);
//
//        if ($cartDetails->pro_quantity < 2){
//            return redirect()->back()->with('flash_message_error','Minimum Range 1');
//        }
//        else{
//            DB::table('carts')->where('id',$id)->increment('pro_quantity',$quantity);
//        }
//
//        return redirect()->back();
//    }

    public function ajaxDelCharge(Request $request){
        if ($request->ajax()){
            $data = $request->all();

            $shipping_charge = DeliveryCharge::where(['delivery_amount'=>$data['delivery_Charge']])->first();
//            echo "<pre>";print_r($data);die;
            return response()->json(['shipping_charge'=>$shipping_charge]);
        }
    }

    public function delAllCartItem(Request $request){
        $session_id = Session::get('session_id');
        DB::table('carts')->where(['session_id' =>$session_id])->truncate();
        return redirect()->back();
    }

    public function updateCartQtyAjax(Request $request){
        // dd($request);
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        if ($request->ajax()){
            $data = $request->all();

//            echo '<pre>',print_r($data),die;

            //get Cart details
            $cartDetails = Cart::find($data['cartid']);

            //get available product attributes stock
            // $availableStock = Attributes::select('attributes_stock')->where(['product_id'=>$cartDetails['pro_id'],
            //     'attributes_size'=>$cartDetails['pro_size']])->first();
//            dd($availableStock,$data['qty']);

            //get available product stock
            $productStock = Product::where(['id'=>$cartDetails['pro_id']])->first();



            Cart::where('id',$data['cartid'])->update(['pro_quantity'=> $data['qty']]);
            $session_id = Session::get('session_id');
            $carts = DB::table('carts')->where(['session_id' =>$session_id])->get();

            foreach ($carts as $key=>$products){
                $productsDetails = DB::table('products')->where(['id'=>$products->pro_id])->first();
                $carts [$key]->image = $productsDetails->image;
                $carts [$key]->quantity = $productsDetails->quantity;
            }
            $cartItem = view('front.ajax-cartItem', compact('carts'))->render();
            return response()->json(['item' => $cartItem ]);

//            return response()->json(['item'=>(string)View::make('front.cartDetails')
//                ->with(compact('carts'))->render()]);
        }
    }

    public function deleteCartItem(Request $request){
        if ($request->ajax()) {
            Session::forget('CouponAmount');
            Session::forget('CouponCode');
            $data = $request->all();
//            echo '<pre>',print_r($data),die;
           Cart::where('id',$data['cartid'])->delete();
            // deleteItem($data['cartid']);
            $session_id = Session::get('session_id');
            $carts = DB::table('carts')->where(['session_id' =>$session_id])->get();

            foreach ($carts as $key=>$products){
                $productsDetails = DB::table('products')->where(['id'=>$products->pro_id])->first();
                $carts [$key]->image = $productsDetails->image;
                $carts [$key]->quantity = $productsDetails->quantity;
            }
            $cartItem = view('front.ajax-cartItem', compact('carts'))->render();
            return response()->json(['item' => $cartItem ]);
        }
    }
}
