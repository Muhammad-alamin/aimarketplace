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
            'title'   => 'required',
            'image' =>  'mimes:jpeg,png,webp'
         ]);

         $category = new Category();

         $category->category_title = $request->title;

         if ($request->hasFile('image')){

            $path = 'images/category';
            $img = $request->file('image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);
            $category->category_image = $path .'/'. $file_name;

        }


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
            'title'   => 'required',
            'image' =>  'mimes:jpeg,png,webp'
         ]);
         $d_id = decrypt($id);
        $category = Category::find($d_id);
        $category->category_title = $request->title;

        if ($request->hasFile('image')){

            $path = 'images/category';
            $img = $request->file('image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);


            if ($category->category_image != null && file_exists($category->category_image)){
                unlink($category->category_image);
            }

            $category->category_image = $path .'/'. $file_name;

        }


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
