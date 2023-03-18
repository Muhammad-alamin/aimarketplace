<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Product;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
   public function view(){
    //today sales
    $date = date('d/m/Y');

        // $professionals = DB::table('professionals')->count();
        // $projects = DB::table('projects')->count();
        // $articles = DB::table('articles')->count();
        // $products = DB::table('products')->count();

        // $dataProducts = DB::table('products')
        // ->join('category_products','products.product_category_id', 'category_products.id')
        // ->join('countries','products.location', 'countries.id')
        // ->select('category_products.title','countries.country_name','products.*')
        // ->where('product_approval','Unapproved')->get();


        // $dataProjects = DB::table('projects')
        // ->where('status','Inactive')->get();


        return view('seller.dashboard');
   }

   public function productEdit($id){
    $d_id = decrypt($id);
    $data['product']= Product::find($d_id);
    return view('admin.products.StatusUpdate',$data);
}

public function projectEdit($id){
    $d_id = decrypt($id);
    $data['project']= Project::find($d_id);
    return view('admin.projects.statusUpdate',$data);
}

public function productUpdate(Request $request, $id){

     $d_id = decrypt($id);
    $project = Product::find($d_id);

     $project->product_approval = $request->product_approval;

    $project->save();
    session()->flash('success', 'product Updated Successfully');
     return redirect()->route('admin.dashboard');
}

public function projectUpdate(Request $request, $id){

    $d_id = decrypt($id);
   $project = Project::find($d_id);

    $project->status = $request->status;

   $project->save();
   session()->flash('success', 'Project Updated Successfully');
    return redirect()->route('admin.dashboard');
}

}
