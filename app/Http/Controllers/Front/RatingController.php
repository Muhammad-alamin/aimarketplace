<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Rating;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;
use MongoDB\Driver\Session;

class RatingController extends Controller
{
   public function addRating(Request $request)
   {

       if ($request->isMethod('post'))
       {
           $data = $request->all();
//           dd($data);
           //echo "<pre>";print_r($userCart);die;

           if (!Auth::check()) {
               Toastr::warning('Login to rate this product', 'Error', ["positionClass" => "toast-top-right"]);
               return redirect()->back();
           }
           $ratingCount = Rating::where(['user_id' => Auth::user()->id, 'product_id' => $data['pro_id']])->count();
           if ($ratingCount > 0) {
               Toastr::error('Your Rating already exist for this product', 'Error', ["positionClass" => "toast-top-right"]);
               return redirect()->back();
           }
           else {
                   $rating = new Rating();
                   $rating->rating = $data['rating'];
                   $rating->user_id = Auth::user()->id;
                   $rating->product_id = $data['pro_id'];
                   $rating->review = $data['review'];
                   $rating->rating_status = 'Active';
                   $rating->rating_approval = 'Unapproved';

                   $getProduct=[];
                   if($request->hasFile('image'))
                   {
                       $products = $request->file('image');

                       foreach ( $products as $eachProduct) {
                           $path = 'images/rating/images/';
                           $file_name = rand(0000,9999).'-'.$eachProduct->getClientOriginalName();
                           $eachProduct->move($path,$file_name);
//                       \Intervention\Image\Facades\Image::make($eachProduct)->resize(500,370)->save(public_path($path).$file_name);

                           $getProduct[] = $file_name;

                       }

                       $singleProduct = json_encode($getProduct);

                       $rating->rating_image = $singleProduct;

                   }

                   $rating->save();
                   Toastr::success('Thanks for rating this product! It will shown once approved', 'Success', ["positionClass" => "toast-top-right"]);
                   return redirect()->back();

               }
       }

   }
}
