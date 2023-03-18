<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aadmin\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function view(){
        return view('admin.slider.create');
    }

    public function index(){
        $data['sliders'] = Slider::orderBy('id','DESC')->paginate(5);
        return view('admin.slider.index' ,$data);
    }

    public function store(Request $request){
        $request->validate([
            'title'   => 'required',
             'image' =>  'mimes:jpeg,png'
         ]);

         $slider = new Slider();

         $slider->slider_title = $request->title;

         if ($request->hasFile('image')){

             $path = 'images/slider/';
             $img = $request->file('image');
             $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
             $img->move($path,$file_name);
             $slider->slider_image = $path .'/'. $file_name;

         }


         $slider->save();
         session()->flash('success', 'slider Created Successfully');
         return redirect()->route('admin.slider.list');
    }

    public function edit($id){
        $d_id = decrypt($id);
        $data['slider'] = Slider::find($d_id);
        return view('admin.slider.edit',$data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'   => 'required',
             'image' =>  'mimes:jpeg,png'
         ]);
         $d_id = decrypt($id);
        $slider = Slider::find($d_id);
        $slider->slider_title = $request->title;


        if ($request->hasFile('image')){

            $path = 'images/slider/';
            $img = $request->file('image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);


            if ($slider->slider_image != null && file_exists($slider->slider_image)){
                unlink($slider->slider_image);
            }

            $slider->slider_image = $path .'/'. $file_name;



        }

        $slider->save();
        session()->flash('success', 'slider Updated Successfully');
         return redirect()->route('admin.slider.list');
    }

    public function delete($id){
        $d_id = decrypt($id);

        Slider::destroy($d_id);
        session()->flash('success', 'slider deleted Successfully');
        return redirect()->route('admin.slider.list');
    }
}
