<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view(){
        return view('admin.Category.create');
    }

    public function index(){
        $data['categories'] = Category::orderBy('id','DESC')->get();
        return view('admin.Category.index' ,$data);
    }

    public function store(Request $request){
        $request->validate([
            'title'   => 'required'
         ]);

         $category = new Category();

         $category->category_title = $request->title;

         $category->save();
         session()->flash('success', 'Category Created Successfully');
         return redirect()->route('admin.category.list');
    }

    public function edit($id){
        $d_id = decrypt($id);
        $data['category'] = Category::find($d_id);
        return view('admin.Category.edit',$data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'   => 'required'
         ]);
         $d_id = decrypt($id);
        $category = Category::find($d_id);
        $category->category_title = $request->title;

        $category->save();
        session()->flash('success', 'Category Updated Successfully');
         return redirect()->route('admin.category.list');
    }

    public function delete($id){
        $d_id = decrypt($id);

        Category::destroy($d_id);
        session()->flash('success', 'Category deleted Successfully');
        return redirect()->route('admin.category.list');
    }
}
