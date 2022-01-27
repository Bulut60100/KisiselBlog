<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class categoryController extends Controller
{
    public function index(){
        $categories = categories::orderBy('created_at', 'ASC')->get();
        return view('admin.categories.index',compact('categories'));
    }
    public function store(Request $request){
        $isexist = categories::whereSlug(str::slug($request->name))->first();
        if($isexist){
            return redirect()->back()->with('status','Bu Kategori Zaten Mevcut');
        }
        $category = new categories;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $insert = $category->save();
            if($insert){
                return redirect()->back()->with('status','Kategori Eklendi');
            }
            else{
                return redirect()->back()->with('status','Eklenemedi');
            }
    }
    public function edit($id)
    {
        $categories = categories::findOrFail($id);
        return view('admin.categories.update',compact('categories'));
    }
    public function update(Request $request, $id)
    {
            $category = categories::findOrFail($id);
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $insert = $category->save();
            if($insert){
                return redirect()->back()->with('status','Kategori Güncellendi');
            }
            else{
                return redirect()->back()->with('status','Güncellenemedi');
            }
    }
    public function delete($id){
        $delete = categories::find($id)->delete();
        if($delete){
            return redirect()->back()->with('status','Kategori Silindi');
        }
        else{
            return redirect()->back()->with('status','Silinemedi');
        }
    }
}
