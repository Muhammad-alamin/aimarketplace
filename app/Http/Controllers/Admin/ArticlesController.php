<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function view(){
        $data['professionals'] = Professional::all();
        return view('admin.articles.create',$data);
    }

    public function index(){
        $data ['articles'] = DB::table('articles')
            ->join('professionals','professionals.id', 'articles.professional_id')
            ->select('professionals.name','articles.*')
            ->orderBy('articles.id','DESC')
            ->get();
        return view('admin.articles.index' ,$data);
    }

    public function store(Request $request){
        $request->validate([
            'professional_id'   => 'required',
            'article_title'   => 'required',
            'article_description'   => 'required',
             'image' =>  'mimes:jpeg,png'
         ]);

         $article = new Article();

         $article->professional_id = $request->professional_id;
         $article->article_title = $request->article_title;
         $article->article_description = $request->article_description;



         if ($request->hasFile('image')){

             $path = 'images/articles/';
             $img = $request->file('image');
             $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
             $img->move($path,$file_name);
             $article->image = $path .'/'. $file_name;

         }


         $article->save();
         session()->flash('success', 'Article Created Successfully');
         return redirect()->route('admin.articles.list');
    }

    public function edit($id){
        $d_id = decrypt($id);
        $data['professional'] = Professional::all();
        $data['article']= Article::find($d_id);
        return view('admin.articles.edit',$data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'professional_id'   => 'required',
            'article_title'   => 'required',
            'article_description'   => 'required',
             'image' =>  'mimes:jpeg,png'
         ]);
         $d_id = decrypt($id);
        $article = Article::find($d_id);

        $article->professional_id = $request->professional_id;
         $article->article_title = $request->article_title;
         $article->article_description = $request->article_description;


         if ($request->hasFile('image')){

            $path = 'images/articles/';
            $img = $request->file('image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);


            if ($article->image != null && file_exists($article->image)){
                unlink($article->image);
            }

            $article->image = $path .'/'. $file_name;



        }

        $article->save();
        session()->flash('success', 'Article Updated Successfully');
         return redirect()->route('admin.articles.list');
    }

    public function delete($id){
        $d_id = decrypt($id);

        Article::destroy($d_id);
        session()->flash('success', 'Article deleted Successfully');
        return redirect()->route('admin.Articles.list');
    }
}
