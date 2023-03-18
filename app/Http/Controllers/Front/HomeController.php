<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Attributes;
use App\Model\Banner;
use App\Model\Brand;
use App\Model\Campaign;
use App\Model\CampaignProduct;
use App\Model\Cart;
use App\Model\Compare;
use App\Model\GalleryImage;
use App\Model\Order;
use App\Model\Rating;
use App\Model\Slider;
use App\Model\Subscribe;
use App\Model\VendorContact;
use App\Model\Wishlist;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{



   public function index(Request $request){
    $products = Product::where('product_approval','=','Approved')->orderBy('id','DESC')->paginate(5);
    $data['categories'] = Category::limit(11)->get();
    return view('front.home',$data, compact('products'));

}

   public function fetch_category_product(Request $request, $id){

//       $category_id = Crypt::decryptString($id);

       $category = Category::where('id',decrypt($id))->first();

               $products = DB::table('products')
                   ->join('categories','products.product_category_id','categories.id')
                   ->join('users','products.user_id', 'users.id')
                   ->select('categories.*','users.name','products.*')
                   ->where('products.product_category_id',$category->id)->where('product_approval','Approved')->paginate(12);
        $categories = Category::orderBy('id', 'desc')->get();
       return view('front.product',compact('products','categories','category'));

    }
    //    Category wise product function end

    //Shop Page function start
    public function fetch_all_product(Request $request){

            $products = DB::table('products')
                ->join('categories','products.product_category_id','categories.id')
                ->join('users','products.user_id', 'users.id')
                ->select('categories.*','users.name','products.*')->where('product_approval','Approved')->paginate(12);
                $categories = Category::orderBy('id', 'desc')->get();
        return view('front.shop',compact('products','categories'));

    }
    //Shop Page function end

    public function productDetails($id){
       $d_id = decrypt($id);

        $data['product'] = Product::with('category')->findOrFail($d_id);
        $data['related_products'] = Product::where('product_category_id','=', $data['product']->category->id)->where('id', '!=', $data['product']->id)
            ->where('product_approval','=','Approved')
            ->orderBy('id','DESC')
            ->limit(4)->get();

        $data['related_productsId'] = Category::where('id',$data['product']->category->id)->first();

        $categories = Category::orderBy('id', 'desc')->get();
        return view('front.productDetails',$data,compact('categories'));
    }

}

