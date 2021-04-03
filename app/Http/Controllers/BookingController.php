<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index($key){
        return view('frontend.booking',['key'=>$key]);
    }
}
