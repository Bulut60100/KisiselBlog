<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\article;
use App\Models\categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = article::orderBy('created_at', 'ASC')->get();
        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::all();
        return view('admin.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpeg,png,jpg,jfif|max:8192'
        ]);
            $article = new article;
            $article->title = $request->title;
            $article->categoryid = $request->kategori;
            $article->content = $request->content;
            $article->slug = Str::slug($request->title);

            if ($request->file('image')) {

                $imagename = str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads'),$imagename);
                $article->image='uploads/'.$imagename;
            }
            $insert = $article->save();
            if($insert){
                return redirect()->back()->with('status','Makale eklendi');
            }
            else{
                return redirect()->back()->with('status','Eklenemedi');
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
        $article = article::findOrFail($id);
        $categories = categories::all();
        return view('admin.articles.update',compact('categories','article'));
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
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg,jfif|max:8192'
        ]);
            $article = article::findOrFail($id);
            $article->title = $request->title;
            $article->categoryid = $request->kategori;
            $article->content = $request->content;
            $article->slug = Str::slug($request->title);

            if ($request->hasFile('image')) {

                $imagename = str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads'),$imagename);
                $article->image='uploads/'.$imagename;
            }
            $insert = $article->save();
            if($insert){
                return redirect()->back()->with('status','Makale Güncellendi');
            }
            else{
                return redirect()->back()->with('status','Güncellenemedi');
            }
    }

    public function switch(Request $request){
        $article = article::findOrFail($request->id);
        $article->status=$request->statu=="true" ? 1 : 0;
        $article->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $delete = article::find($id)->delete();
        if($delete){
            return redirect()->back()->with('status','Makale Silindi');
        }
        else{
            return redirect()->back()->with('status','Silinemedi');
        }
    }
    public function trashed(){
        $articles = article::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('admin.articles.trashed',compact('articles'));
    }
    public function recover($id){
        $recover = article::onlyTrashed()->find($id)->restore();
        if($recover){
            return redirect()->back()->with('status','Makale Geri Kurtarıldı');
        }
        else{
            return redirect()->back()->with('status','Kurtarılamadı');
        }
    }
    public function destroyed($id){
        $article = article::onlyTrashed()->find($id);
        if(File::exists($article->image)){
            File::delete(public_path($article->image));
        }
        $delete  = $article->forceDelete();
        if($delete){
            return redirect()->back()->with('status','Makale Silindi');
        }
        else{
            return redirect()->back()->with('status','Silinemedi');
        }
    }
    public function destroy($id)
    {
        //
    }
}
