<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherFrontendController extends Controller
{
    public function index($id){
        return view('frontend.teacher',['id'=>$id]);
    }
}
