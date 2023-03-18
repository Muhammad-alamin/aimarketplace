<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Professional;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class projectsController extends Controller
{
    public function view(){
        $data ['countries'] = DB::table('countries')->get();
        $data['professionals'] = Professional::all();
        return view('admin.projects.create',$data);
    }

    public function index(){
        $data ['projects'] = DB::table('projects')
            ->join('professionals','projects.professional_id', 'professionals.id')
            ->join('countries','projects.location', 'countries.id')
            ->select('professionals.name','countries.country_name','projects.*')
            ->orderBy('projects.id','DESC')
            ->get();
        return view('admin.projects.index' ,$data);
    }

    public function store(Request $request){
        $request->validate([
            'professional_id'   => 'required',
            'project_name'   => 'required',
            'company_name'   => 'required',
            'project_type'   => 'required',
            'description'   => 'required',
            'country'   => 'required',
            'status'   => 'required',
         ]);

         $project = new Project();

         $project->professional_id = $request->professional_id;
         $project->professional_name = $request->professional_name;
         $project->company_name = $request->company_name;
         $project->project_type = $request->project_type;
         $project->project_name = $request->project_name;
         $project->description = $request->description;
         $project->firm = $request->firm;
         $project->area_size = $request->area_size;
         $project->design_style = $request->design_style;
         $project->architect = $request->architect;
         $project->location = $request->country;
         $project->status = $request->status;




         if ($request->hasFile('thumbnail_image')){

             $path = 'images/projects/';
             $img = $request->file('thumbnail_image');
             $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
             $img->move($path,$file_name);
             $project->thumbnail_image = $path .'/'. $file_name;

         }

         $getProduct=[];
            if($request->hasFile('multiple_image'))
            {
                $products = $request->file('multiple_image');

                foreach ( $products as $eachProduct) {
                    $path = 'images/projects/multiple_image/';
                    $file_name = rand(0000,9999).'-'.$eachProduct->getClientOriginalName();
                    $eachProduct->move($path,$file_name);
                    //Image::make($eachProduct)->resize(500,370)->save($path.$file_name);

                    $getProduct[] = $file_name;

                }

                $singleProduct = json_encode($getProduct);

                $project->multiple_image = $singleProduct;

            }


         $project->save();
         session()->flash('success', 'Project Created Successfully');
         return redirect()->route('admin.projects.list');
    }

    public function edit($id){
        $d_id = decrypt($id);
        $professionals = Professional::all();
        $data['countries'] = DB::table('countries')->get();
        $data['project']= Project::find($d_id);
        return view('admin.projects.edit',$data, compact('professionals'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'professional_id'   => 'required',
            'project_name'   => 'required',
            'company_name'   => 'required',
            'project_type'   => 'required',
            'description'   => 'required',
            'country'   => 'required',
            'status'   => 'required',
         ]);
         $d_id = decrypt($id);
        $project = Project::find($d_id);

        $project->professional_id = $request->professional_id;
         $project->professional_name = $request->professional_name;
         $project->company_name = $request->company_name;
         $project->project_type = $request->project_type;
         $project->project_name = $request->project_name;
         $project->description = $request->description;
         $project->firm = $request->firm;
         $project->area_size = $request->area_size;
         $project->design_style = $request->design_style;
         $project->architect = $request->architect;
         $project->location = $request->country;
         $project->status = $request->status;



        if ($request->hasFile('thumbnail_image')){

            $path = 'images/projects/';
            $img = $request->file('thumbnail_image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);


            if ($project->thumbnail_image != null && file_exists($project->thumbnail_image)){
                unlink($project->thumbnail_image);
            }

            $project->thumbnail_image = $path .'/'. $file_name;



        }

            $getProduct=[];
            if($request->hasFile('multiple_image'))
            {
                $products = $request->file('multiple_image');

                foreach ( $products as $eachProduct) {
                    $path = 'images/projects/multiple_image';
                    $file_name = rand(0000,9999).'-'.$eachProduct->getClientOriginalName();
                    $eachProduct->move($path,$file_name);
                    //Image::make($eachProduct)->resize(500,370)->save($path.$file_name);

                    $getProduct[] = $file_name;
                }
                $images = json_decode($project->multiple_image);
                $path = 'images/projects/multiple_image';
                if (isset($images)){
                    foreach ($images as $eachImage){
                        unlink($path . $eachImage);
                    }
                }

                $singleProduct = json_encode($getProduct);

                $project->multiple_image = $singleProduct;

            }

        $project->save();
        session()->flash('success', 'Project Updated Successfully');
         return redirect()->route('admin.projects.list');
    }

    public function delete($id){
        $d_id = decrypt($id);

        Project::destroy($d_id);
        session()->flash('success', 'Project deleted Successfully');
        return redirect()->route('admin.projects.list');
    }
}
