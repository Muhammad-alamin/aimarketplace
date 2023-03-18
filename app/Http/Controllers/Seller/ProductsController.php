<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function view(){
        $data['categories'] = Category::all();
        return view('seller.products.create',$data);
    }

    public function index(){
        $data ['products'] = DB::table('products')
            ->join('categories','products.product_category_id', 'categories.id')
            ->join('users','products.user_id', 'users.id')
            ->select('categories.category_title','users.name','products.*')
            ->where('products.user_id',auth()->user()->id)
            ->orderBy('products.id','DESC')
            ->get();
        return view('seller.products.index',$data);
    }

    public function store(Request $request){
        $request->validate([
            'product_category' => 'required',
            'product_name' => 'required',

            'image' => 'mimes:jpeg,png,webp',
        ]);

        $data = array();
        $data['product_category_id'] = $request->product_category;
        $data['user_id'] = auth()->user()->id;
        $data['product_name'] = $request->product_name;
        $data['size'] = $request->product_size;
        $data['price'] = $request->regular_price;
        $data['description'] = $request->description;
        $data['product_approval'] = 'Unapproved';

        if ($request->hasFile('image')){

            $path = 'products/seller/image/';
            $img = $request->file('image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);

            $data['image'] = $path .'/'. $file_name;


        }
        DB::table('products')->insert($data);
        session()->flash('success', 'Product Created Successfully');
        return redirect()->route('seller.products.list');
    }

    public function edit($id){
        $d_id = decrypt($id);
        $data['categories'] = Category::all();
        $data['product']= Product::find($d_id);
        return view('seller.products.edit',$data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'product_category' => 'required',
            'product_name' => 'required',
            'image' => 'mimes:jpeg,png,webp',
        ]);

        $d_id = decrypt($id);
        $product = Product::find($d_id);
        $product->product_category_id = $request->product_category;
        $product->user_id = auth()->user()->id;
        $product->product_name = $request->product_name;
        $product->price = $request->regular_price;
        $product->size = $request->product_size;
        $product->description = $request->description;
        $product->product_approval = 'Unapproved';

        if ($request->hasFile('image')){

            $path = 'products/seller/image/';
            $img = $request->file('image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);

            if ($product->image != null && file_exists($product->image)){
                unlink($product->image);
            }

            $product->image = $path .'/'. $file_name;


        }

        $product->save();
        session()->flash('success', 'Product Updated Successfully');
        return redirect()->route('seller.products.list');
    }

    public function delete($id){
        $d_id = decrypt($id);

        Product::destroy($d_id);
        session()->flash('success', 'Product deleted Successfully');
        return redirect()->route('seller.products.list');
    }
}
