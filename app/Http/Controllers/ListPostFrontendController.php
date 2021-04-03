<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListPostFrontendController extends Controller
{
    public function index($slug){
        switch ($slug){
            case 'hoc-noi':
                $type=0;
                break;
            case 'hoc-viet':
                $type=1;
                break;
            case 'hoc-nghe':
                $type=2;
                break;
            default : $type=null;
        }
        return view('frontend.posts',['type'=>$type]);
    }
}
