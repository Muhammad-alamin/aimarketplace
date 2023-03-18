<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\BillingAddress;
use App\Model\Brand;
use App\Model\Category;
use App\Model\DeliveryCharge;
use App\Models\Admin\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(Request $request){
            $data = $request->all();
//        echo "<pre>";print_r($data);die;
        $session_id = Session::get('session_id');
        if (Auth::check()){
            // $delivery_charge = DeliveryCharge::all();
            $userCart = DB::table('carts')->where(['session_id' =>$session_id])->get();
            $cartItem = Cart::where('session_id',$session_id)->sum('pro_quantity');
            foreach($userCart as $key=>$product){
                $productDetails = Product::where('id',$product->pro_id)->first();
                $userCart[$key]->image = $productDetails->image;
            }
           // return view('wayshop.products.order_review')->with(compact('userDetails','shippingDetails','userCart'));
            return view('front.checkout')->with(compact('userCart','cartItem') );
        }
        else{
            return view('front.checkout');
        }
    }

    public function store(Request $request){

            $data = $request->all();
            // echo "<pre>";print_r($data);
            $order = new Order();
            $order->order_id = 'O-' . time();
            $order->user_id = Auth::user()->id;
            $order->category_id = $data['category_id'];
            $order->seller_id = $data['seller_id'];
            $order->invoice_id = time();
            $order->full_name = $request->shipping_name;
            $order->phone = $request->shipping_phone;
            $order->email = $request->shipping_email;
            $order->address = $request->shipping_address;
            $order->city = $request->shipping_city;
            $order->state = $request->shipping_state;
            $order->zip = $request->shipping_zipcode;
            $order->product_price = $data['product_price'];
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];
            $order->order_date = date('d/m/Y');
            $order->order_month = date('F');
            $order->order_year = date('Y');
            if ($request->payment_method != 'card') {
                $order->status = Order::STATUS_PROCESSING;
            }
        $order->Save();

        $session_id = Session::get('session_id');

        $catProducts = Cart::with('product')->where(['session_id' =>$session_id])->get();

        foreach($catProducts as $pro){
            $cartPro = new OrderDetails();
            $cartPro->order_id = $order->id;
            $cartPro->user_id = Auth::user()->id;
            $cartPro->seller_id = $pro->product->user_id;
            $cartPro->category_id = $pro->product->product_category_id;
            $cartPro->product_id = $pro->pro_id;
            $cartPro->product_name = $pro->pro_name;
            $cartPro->product_size = $pro->pro_size;
            $cartPro->product_price = $pro->pro_price;
            $cartPro->product_qty = $pro->pro_quantity;
            $cartPro->save();


                DB::table('products')->where('id',$pro->pro_id)
                    ->update(['quantity' => DB::raw('quantity -' . $pro->pro_quantity)]);


        }



        $shippingAddress = new ShippingAddress();
        $shippingAddress->user_id = Auth::user()->id;
        $shippingAddress->order_id = $order->id;
        $shippingAddress->shipping_phone = $request->shipping_phone;
        $shippingAddress->shipping_email = $request->shipping_email;
        $shippingAddress->shipping_name = $request->shipping_name;
        $shippingAddress->shipping_address = $request->shipping_address;
        $shippingAddress->shipping_city = $request->shipping_city;
        $shippingAddress->shipping_state = $request->shipping_state;
        $shippingAddress->shipping_zipcode = $request->shipping_zipcode;
        $shippingAddress->save();


        if($data['payment_method']=="cod"){
            Session::put('order_id',$order->order_id);
            Session::put('status',$order->status);
            Session::put('date',date('d/m/Y'));
            Session::put('grand_total',$data['grand_total']);
            Session::put('payment_method',$data['payment_method']);
            Session::remove('session_id');
            return redirect()->route('success');
        }else{
            return redirect()->route('online_payment');
        }

    }

    public function success(){
        return view('front.success');
    }

    public function onlinePayment(){
        $session_id = Session::get('session_id');
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $userInformation = User::findorFail($user_id);
//            $delivery_charge = $request['delivery_charge'];
            $delivery_charge = DeliveryCharge::all();;
            $user_email = Auth::user()->email;
            $userDetails = User::find($user_id);
            $userCart = DB::table('carts')->where(['session_id' =>$session_id])->get();
            $cartItem = Cart::where('session_id',$session_id)->sum('pro_quantity');
            foreach($userCart as $key=>$product){
                $productDetails = Product::where('id',$product->pro_id)->first();
                $userCart[$key]->image = $productDetails->product_thumbnail_image;
            }
            // return view('wayshop.products.order_review')->with(compact('userDetails','shippingDetails','userCart'));
            return view('front.online-payment')->with(compact('userInformation','userDetails','userCart','delivery_charge','cartItem') );
        }
        else{
            return view('front.checkout');
        }
    }

}
