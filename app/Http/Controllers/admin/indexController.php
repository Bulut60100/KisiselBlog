<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\article;
use App\Models\categories;

class indexController extends Controller
{
    public function index(){
        $article = article::all()->count();
        $categories = categories::all()->count();
        return view('admin.index',compact('article','categories'));
    }
}
