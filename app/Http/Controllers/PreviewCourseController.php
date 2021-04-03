<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreviewCourseController extends Controller
{
    public function __construct(){
        $this->middleware('preview');
    }
    public function index($url){
        $url = str_replace(md5('preview'),'/',$url);
        return redirect($url);
    }
}
