<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Else_;

class DashboardController extends Controller
{
   public function  index($id){

       $decrypt_id = Crypt::decryptString($id);

       if ($decrypt_id) {

           $data ['userId'] = User::where('id',$decrypt_id)->first();
       }
       else{
           return 'Something Went wrong';
       }
       return view('front.customerInformation.index',$data);
   }
   public function orders(){
       $user_id = Auth::user()->id;

       $data['orders'] = Order::with('order_details')->where('user_id',$user_id)->get();

       return view('front.customerInformation.index',$data);
   }

   public function details($id){
       $order_id = Crypt::decrypt($id);

       $data ['order'] = Order::with('order_details')->find($order_id);
       $data['orders'] = Order::where('id',$order_id)->first();
//       $data['order'] = DB::table('orders')
//           ->join('order_details','orders.id', 'order_details.order_id')
//           ->join('billing_addresses','orders.id', 'billing_addresses.order_id')
//           ->join('shipping_addresses','orders.id', 'shipping_addresses.order_id')
//           ->select('shipping_addresses.*','billing_addresses.*','order_details.*','orders.*')
//           ->find($order_id,'DESC')
//           ->get();

       return view('front.customerInformation.orderDetails',$data);
   }

   public function address(){
       $user_id = Auth::user()->id;

       if ($user_id){
           $data['address'] = User::where('id','=',$user_id)->first();

       }else{
           'nothing data found';
       }
       return view('front.customerInformation.address',$data);
   }

   public function edit($id){
       $user_id = Crypt::decrypt($id);
       $data ['users'] = User::find($user_id);
       $data['orders'] = Order::with('order_details')->where('user_id',$user_id)->get();
       return view('front.customerInformation.editAddress',$data);
   }

   public function update(Request $request, $id){
       if (auth()->user()->demo_id == 1) {
           Toastr::error('Demo account are not change anything!', 'error', ["positionClass" => "toast-top-right"]);
           return redirect()->route('customer.address');
       }
       else
       {
        $decrypt_id = decrypt($id);
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users,phone,'.$decrypt_id,
            'email' => 'required|unique:users,email,'.$decrypt_id,

        ]);

        $user = User::findOrFail($decrypt_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->location = $request->location;
        if ($request->has('password') && $request->password != null ){

            $user->password = Hash::make($request->password);
        }
        $user->save();
        session()->flash('success', 'User Updated Successfully');
        return redirect()->back();
       }


   }



}
