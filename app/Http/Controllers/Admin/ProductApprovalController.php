<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductApprovalController extends Controller
{
    public function index()
    {
        $data ['products'] = DB::table('products')
            ->join('categories','products.product_category_id', 'categories.id')
            ->join('users','products.user_id', 'users.id')
            ->select('categories.category_title','users.name','products.*')
            ->where('product_approval','Unapproved')
            ->orderBy('products.id','DESC')
            ->get();
        return view('admin.product_approval.index',$data);
    }

    public function details($id){
        $d_id = decrypt($id);
        $data ['product'] = DB::table('products')
            ->join('categories','products.category_id', 'categories.id')
            ->join('users','products.user_id', 'users.id')
            ->join('brands','products.brand_id', 'brands.id')
            ->select('categories.category_name','users.name','brands.brand_name','products.*')
            ->where('products.id',$d_id)
            ->first();
        return view('admin.product_approval.details',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data ['users'] = User::all();
        return view('vendor.product.create',$data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('products.index');
        }
        else
        {
            $request->validate([
                'category_id' => 'required',
                'product_name' => 'required',
                'product_image' => 'mimes:jpeg,png',
                'product_regular_price' => 'required',
                'product_quantity' => 'required',
                'product_status' => 'required',
            ]);

            $data = array();

            $data['category_id'] = $request->category_id;
            $data['user_id'] = auth()->user()->id;
            $data['brand_id'] = $request->brand_id;
            $data['product_name'] = $request->product_name;
            $data['product_description'] = $request->product_description;
            $data['product_sku'] = $request->product_sku;
            $data['product_code'] = $request->product_code;
            $data['product_colour'] = json_encode($request->product_colour);
            $data['product_buying_date'] = $request->product_buying_date;
            $data['product_regular_price'] = $request->product_regular_price;
            $data['product_discount_price'] = $request->product_discount_price;
            $data['product_quantity'] = $request->product_quantity;
            $data['product_stock'] = $request->product_stock;
            $data['product_discount_percent'] = $request->product_discount_percent;
            $data['product_discount_amount'] = $request->product_discount_amount;
            $data['product_size'] = json_encode($request->product_size);
            $data['product_status'] = $request->product_status;

            if ($request->hasFile('thumbnail_image')){

                $path = 'images/products/';
                $img = $request->file('thumbnail_image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);


                if ($data['product_thumbnail_image'] != null && file_exists($data['product_thumbnail_image'])){
                    unlink($data['product_thumbnail_image']);
                }

                $data['product_thumbnail_image'] = $path .'/'. $file_name;


            }

            $getProduct=[];
            if($request->hasFile('images'))
            {
                $products = $request->file('images');

                foreach ( $products as $eachProduct) {
                    $path = 'images/products/';
                    $file_name = rand(0000,9999).'-'.$eachProduct->getClientOriginalName();
                    $eachProduct->move($path,$file_name);
                    //Image::make($eachProduct)->resize(500,370)->save($path.$file_name);

                    $getProduct[] = $file_name;

                }

                $singleProduct = json_encode($getProduct);

                $data['product_image'] = $singleProduct;

            }
            DB::table('products')->insert($data);
            session()->flash('success', 'Product Created Successfully');
            return redirect()->route('products.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d_id = decrypt($id);
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['product']= Product::find($d_id);
        return view('admin.product_approval.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.product.approval');
        }
        else
        {
            $request->validate([
                'category_id' => 'required',
                'product_name' => 'required',
                'product_image' => 'mimes:jpeg,png',
                'product_regular_price' => 'required',
            ]);
            $d_id = decrypt($id);
            $product = Product::find($d_id);

            $product->category_id = $request->category_id;
//        $product->user_id = auth()->user()->id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_sku = $request->product_sku;
            $product->product_code = $request->product_code;
            $product->product_buying_date = $request->product_buying_date;
            $product->product_regular_price = $request->product_regular_price;
            $product->product_discount_price = $request->product_discount_price;
            $product->product_quantity = $request->product_quantity;
            $product->product_stock = $request->product_stock;
            $product->product_discount_percent = $request->product_discount_percent;
            $product->product_discount_amount = $request->product_discount_amount;
            $product->product_size = json_encode($request->product_size);
            $product->product_status = $request->product_status;
            $product->product_approval = $request->product_approval;

            if ($request->has('featured_products'))
            {
                $product->featured_products = $request->featured_products;
            }

            if ($request->has('best_selling_products'))
            {
                $product->best_selling_products = $request->best_selling_products;
            }

            if ($request->has('popular_products'))
            {
                $product->popular_products = $request->popular_products;
            }


            if ($request->hasFile('thumbnail_image')){

                $path = 'images/products/';
                $img = $request->file('thumbnail_image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);


                if ($product->product_thumbnail_image != null && file_exists($product->product_thumbnail_image)){
                    unlink($product->product_thumbnail_image);
                }

                $product->product_thumbnail_image = $path .'/'. $file_name;



            }
            $getProduct=[];
            if($request->hasFile('images'))
            {
                $products = $request->file('images');

                foreach ( $products as $eachProduct) {
                    $path = 'images/products/';
                    $file_name = rand(0000,9999).'-'.$eachProduct->getClientOriginalName();
                    $eachProduct->move($path,$file_name);
                    //Image::make($eachProduct)->resize(500,370)->save($path.$file_name);

                    $getProduct[] = $file_name;
                }
                $images = json_decode($product->product_image);
                $path = 'images/products/';
                if (isset($images)){
                    foreach ($images as $eachImage){
                        unlink($path . $eachImage);
                    }
                }

                $singleProduct = json_encode($getProduct);

                $product->product_image = $singleProduct;

            }

            $product->save();
            session()->flash('success', 'Product Updated Successfully');
            return redirect()->route('admin.product.approval');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }

    public function delete($id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.product.approval');
        }
        else
        {
            $d_id = decrypt($id);
            $attribute = DB::table('attributes')
                ->join('products','attributes.product_id', 'products.id')
                ->select('attributes.product_id','products.*')
                ->where('attributes.product_id',$d_id)
                ->first();
            $product = Product::find($d_id);


            if (!empty($attribute->product_id)){
                session()->flash('warning','Product not deleted  because at first deleted Attribute');
                return redirect()->route('admin.product.approval');
            }
            else{
                $images = json_decode($product->product_image);
                $path = 'images/products/';

                foreach ($images as $eachImage) {
                    unlink($path . $eachImage);
                }
                Product::destroy($d_id);
                session()->flash('success', 'Product Deleted Successfully');
                return redirect()->route('admin.product.approval');
            }
        }
    }
}
