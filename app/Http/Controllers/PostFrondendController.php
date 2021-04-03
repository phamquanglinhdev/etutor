<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostFrondendController extends Controller
{
    public function index($slug){
        return view('frontend.post',['slug'=>$slug]);
    }
}
