<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Attributes;
use App\Model\Banner;
use App\Model\Brand;
use App\Model\Campaign;
use App\Model\CampaignProduct;
use App\Model\Category;
use App\Model\GalleryImage;
use App\Model\Product;
use App\Model\Rating;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function show(){
        $data ['campaigns'] = Campaign::all();
        return view('front.campaign.view',$data);
    }

    public function details($id){
        $d_id = decrypt($id);
        $single_campaign = Campaign::where('id',$d_id)->first();
        $data ['products'] = CampaignProduct::with('camPro')->where('campaign_id',$d_id)
            ->orderBy('id','DESC')->paginate(12);
        foreach ($data['products']as $key=>$products){
            $productsDetails = Product::where(['id'=>$products->product_id])->first();
            $data['products'][$key]->image = $productsDetails->product_thumbnail_image;
            $data['products'][$key]->product_name = $productsDetails->product_name;
//            $data['products'][$key]->product_id = $productsDetails->product_id;
            $data['products'][$key]->brand_id = $productsDetails->brand_id;
            $data['products'][$key]->category_id = $productsDetails->category_id;
            $data['products'][$key]->product_regular_price = $productsDetails->product_regular_price;
            $data['products'][$key]->product_discount_price = $productsDetails->product_discount_price;
            $data['products'][$key]->product_status = $productsDetails->product_status;
            $data['products'][$key]->product_approval = $productsDetails->product_approval;
            $data['products'][$key]->product_quantity = $productsDetails->product_quantity;
        }
//        echo "<pre>";print_r($data);die;
        return view('front.campaign.details',$data)->with('single_campaign',$single_campaign);
    }

    public function campaignProductDetails($id){

        //$data['product_attributes']= Attributes::with('product')->where('product_id',$id)->get();
        $data['marketing_banners'] = Banner::orderBy('id','DESC')->limit(1)->get();
        $data['product'] = Product::with('brand','category','attributes')->findOrFail($id);
        $data['brandImage'] = Brand::where('id',$data['product']->brand_id)->first();
        $galleryImage = GalleryImage::where('product_id',$id)->get();

        $data['featured_products'] = Product::where('product_approval','=','Approved')->
        where( 'product_status','=','Active')->where('featured_products',1)->get();

        $data['brand_products'] = Product::where('brand_id','=', $data['product']->brand->id)->where('id', '!=', $data['product']->id)
            ->where('product_approval','=','Approved')
            ->where( 'product_status','=','Active')->orderBy('id','DESC')->limit(4)->get();

        $data['related_products'] = Product::where('category_id','=', $data['product']->category->id)->where('id', '!=', $data['product']->id)
            ->where('product_approval','=','Approved')
            ->where( 'product_status','=','Active')->orderBy('id','DESC')->limit(4)->get();

        $data['related_productsId'] = Category::where('id',$data['product']->category->id)->first();

        //campaign Products
        $data['campaign_pro'] = CampaignProduct::where('product_id',$id)->first();
        if (isset($data['campaign_pro'])){
            $campaignProducts = Campaign::where('id',$data['campaign_pro']->campaign_id)->first();
        }


        //rating display
        $data['ratings'] = Rating::with('users')->where('rating_approval','=', 'Approved')
            ->where('product_id',$id)->orderBy('id','DESC')
            ->limit(6)->get();

        //All-rating display with modal
        $data['AllRatings'] = Rating::with('users')->where('rating_approval','=', 'Approved')
            ->where('product_id',$id)->orderBy('id','DESC')
            ->get();

        //get avarage rating of product

        $ratingSum = Rating::where('rating_approval','=', 'Approved')
            ->where('product_id',$id)->sum('rating');
        $ratingCount = Rating::where('rating_approval','=', 'Approved')
            ->where('product_id',$id)->count();

        if ($ratingCount>0){
            $avarageRating = round($ratingSum/$ratingCount,2);
            $avarageStarRating = round($ratingSum/$ratingCount);
        }else{
            $avarageRating = 0;
            $avarageStarRating = 0;
        }

        $attribute_products = Attributes::where('product_id', $data['product']->id)->get();
        //campaign Products
        $data['campaign_pro'] = CampaignProduct::where('product_id',$id)->first();
        if (isset($data['campaign_pro'])){
            $campaignProducts = Campaign::where('id',$data['campaign_pro']->campaign_id)->first();
        }

        return view('front.campaign.productDetails',$data)->with(compact('avarageStarRating','avarageRating','ratingCount', 'attribute_products','galleryImage','campaignProducts'));
    }

}
