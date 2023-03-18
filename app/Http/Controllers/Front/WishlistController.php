<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Wishlist;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        if (Auth::check()){
            $wishlist['wishlist'] = Wishlist::with('product')->where('user_id', Auth::user()->id)
                ->orderBy('id','DESC') ->get();
            return view('front.wishlist',$wishlist);
        }
        else{
            session()->flash('success', 'Wishlist Empty');
            return view('front.emptyWishlist');
        }

    }
    public function delete($id){
        Toastr::success('Delete item successfully', 'Success', ["positionClass" => "toast-top-right"]);
        Wishlist::where('id',$id)->delete();
        return redirect()->back();
    }
}
