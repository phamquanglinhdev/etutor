<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::get();
        return view("application.room",['rooms'=>$rooms]);
    }
    public function create(){

    }
    public function store(Request $request){

    }
}
