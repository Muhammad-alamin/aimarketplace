<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Professional;
use App\ProfessionalCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessionalController extends Controller
{
    public function view(){
        $data['countries'] = DB::table('countries')->get();
        $data['categories'] = ProfessionalCategory::all();
        return view('admin.professional.create',$data);
    }

    public function index(){
        $data ['professionals'] = DB::table('professionals')
            ->join('professional_categories','professionals.professional_cat_id', 'professional_categories.id')
            ->join('countries','professionals.location', 'countries.id')
            ->select('professional_categories.category_title','countries.country_name','professionals.*')
            ->orderBy('professionals.id','DESC')
            ->get();
        return view('admin.professional.index' ,$data);
    }

    public function store(Request $request){
        $request->validate([
            'product_category'   => 'required',
            'name'   => 'required',
            'address'   => 'required',
            'mobile'   => 'required',
            'email'   => 'required',
            'country'   => 'required',
            'about'   => 'required',
            'company_name'   => 'required',
             'image' =>  'mimes:jpeg,png'
         ]);

         $professional = new Professional();

         $professional->professional_cat_id = $request->product_category;
         $professional->product_category_title = $request->product_category_title;
         $professional->name = $request->name;
         $professional->address = $request->address;
         $professional->mobile = $request->mobile;
         $professional->email = $request->email;
         $professional->visiting_time = $request->visiting_time;
         $professional->website = $request->website;
         $professional->instagram = $request->instagram;
         $professional->facebook = $request->facebook;
         $professional->about = $request->about;
         $professional->company_name = $request->company_name;
         $professional->location = $request->country;



         if ($request->hasFile('image')){

             $path = 'images/professional/';
             $img = $request->file('image');
             $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
             $img->move($path,$file_name);
             $professional->image = $path .'/'. $file_name;

         }

         if ($request->hasFile('pro_pic')){

            $path = 'images/professional/pro_pic/';
            $img = $request->file('pro_pic');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);
            $professional->pro_pic = $path .'/'. $file_name;

        }

        dd($professional);
         $professional->save();
         session()->flash('success', 'Professional Created Successfully');
         return redirect()->route('admin.professional.list');
    }

    public function edit($id){
        $d_id = decrypt($id);
        $categories = ProfessionalCategory::all();
        $data['countries'] = DB::table('countries')->get();
        $data['professional']= Professional::find($d_id);
        return view('admin.professional.edit',$data, compact('categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'product_category'   => 'required',
            'name'   => 'required',
            'address'   => 'required',
            'mobile'   => 'required',
            'email'   => 'required',
            'country'   => 'required',
            'about'   => 'required',
            'company_name'   => 'required',
             'image' =>  'mimes:jpeg,png'
         ]);
         $d_id = decrypt($id);
        $professional = Professional::find($d_id);

        $professional->professional_cat_id = $request->product_category;
        $professional->product_category_title = $request->product_category_title;
         $professional->name = $request->name;
         $professional->address = $request->address;
         $professional->mobile = $request->mobile;
         $professional->email = $request->email;
         $professional->visiting_time = $request->visiting_time;
         $professional->website = $request->website;
         $professional->instagram = $request->instagram;
         $professional->facebook = $request->facebook;
         $professional->about = $request->about;
         $professional->company_name = $request->company_name;
         $professional->location = $request->country;


        if ($request->hasFile('image')){

            $path = 'images/professional/';
            $img = $request->file('image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);


            if ($professional->image != null && file_exists($professional->image)){
                unlink($professional->image);
            }

            $professional->image = $path .'/'. $file_name;
        }

        if ($request->hasFile('pro_pic')){

            $path = 'images/professional/pro_pic/';
            $img = $request->file('pro_pic');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);


            if ($professional->pro_pic != null && file_exists($professional->pro_pic)){
                unlink($professional->pro_pic);
            }

            $professional->pro_pic = $path .'/'. $file_name;



        }

        $professional->save();
        session()->flash('success', 'Professional Updated Successfully');
         return redirect()->route('admin.professional.list');
    }

    public function delete($id){
        $d_id = decrypt($id);

        Professional::destroy($d_id);
        session()->flash('success', 'Professional deleted Successfully');
        return redirect()->route('admin.professional.list');
    }
}
