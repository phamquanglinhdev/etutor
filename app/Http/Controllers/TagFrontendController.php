<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagFrontendController extends Controller
{
    public function index($slug){
        return view('frontend.list',['slug'=>$slug,'type'=>'tag']);
    }
}
