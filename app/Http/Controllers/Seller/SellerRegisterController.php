<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellerRegisterController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('seller.register',compact('categories'));
    }

    public function store (Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->role = 'seller';
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login');

    }
}
