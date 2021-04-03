<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseFrontendController extends Controller
{
    public function index($slug){
        return view('frontend.detail',['slug'=>$slug]);
    }
}
