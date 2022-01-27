<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\aboutus;
use App\Models\contact;

class pagesController extends Controller
{
    public function indexcontact(){
        $contact = contact::all();
        return view('admin.pages.contact',compact('contact'));
    }
    public function contactdelete($id){
        $delete = contact::find($id)->delete();
        if($delete){
            return redirect()->back()->with('status','İletişim Silindi');
        }
        else{
            return redirect()->back()->with('status','Silinemedi');
        }
    }
    public function indexaboutus(){
        $aboutus = aboutus::all();
        return view('admin.pages.aboutus',compact('aboutus'));
    }
    public function aboutusdelete($id){
        $delete = aboutus::find($id)->delete();
        if($delete){
            return redirect()->back()->with('status','Hakkımızda Silindi');
        }
        else{
            return redirect()->back()->with('status','Silinemedi');
        }
    }
}
