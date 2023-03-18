<?php

namespace App\Http\Controllers\Admin;

use App\category_product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function view(){
        return view('admin.productCategory.create');
    }

    public function index(){
        $data['categories'] = category_product::orderBy('id','DESC')->get();
        return view('admin.productCategory.index' ,$data);
    }

    public function store(Request $request){
        $request->validate([
            'title'   => 'required',
         ]);

         $category = new category_product();

         $category->title = $request->title;

         $category->save();
         session()->flash('success', 'Category Created Successfully');
         return redirect()->route('admin.product.category.list');
    }

    public function edit($id){
        $d_id = decrypt($id);
        $data['category'] = category_product::find($d_id);
        return view('admin.productCategory.edit',$data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'   => 'required',
         ]);
         $d_id = decrypt($id);
        $category = category_product::find($d_id);
        $category->title = $request->title;

        $category->save();
        session()->flash('success', 'Category Updated Successfully');
         return redirect()->route('admin.product.category.list');
    }

    public function delete($id){
        $d_id = decrypt($id);

        category_product::destroy($d_id);
        session()->flash('success', 'Category deleted Successfully');
        return redirect()->route('admin.product.category.list');
    }
}
