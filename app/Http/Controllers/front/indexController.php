<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\aboutus;
use App\Models\article;
use App\Models\categories;
use App\Models\contact;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['article'] = article::where('status',1)->orderBy('created_at','DESC')->get();
        $data['categories'] = categories::paginate(10);
        return view('front.index',$data);
    }

    public function single($slug){
        $data['article'] = article::where('slug','=',$slug)->first() ?? abort(403,'Böyle Bir Yazı Bulunamadı');
        $data['categories'] = categories::orderBy('name','ASC')->get();
        return view('front.single',$data);

    }

    public function category($slug){
        $category = categories::where('slug','=',$slug)->first() ?? abort(403,'Böyle Bir Yazı Bulunamadı');
        $data['category'] = $category;
        $data['categories'] = categories::paginate(10);
        $data['article'] = article::where('categoryid',$category->id)->orderBy('created_at','DESC')->get();
        return view('front.category',$data);
    }

    public function aboutus(){
        $data['categories'] = categories::paginate(10);
        $data['aboutus'] = aboutus::all();
        return view('front.aboutus',$data);
    }

    public function contact(){
        $data['categories'] = categories::paginate(10);
        return view('front.contact',$data);
    }

    public function contactpost(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:25',
            'konu' => 'required|max:25',
            'email' => 'required',
            'message' => 'required|min:25',
        ]);

        $contact = new contact;
        $contact->name = $request->name;
        $contact->konu = $request->konu;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $insert = $contact->save();
        if($insert){
            return redirect()->back()->with('status','Form Gönderildi');
        }
        else{
            return redirect()->back()->with('status','GÖnderilmedi');
        }

    }
}
