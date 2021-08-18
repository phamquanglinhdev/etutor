<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Room;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(){
        if(backpack_user()->role==0){
            $logs = Log::get();
            return view("application.log",['logs'=>$logs]);
        }else{
            return null;
        }
    }
    public function create(){
        $rooms = Room::get();
        return view("application.checkin",['rooms'=>$rooms]);
    }
    public function store(Request $request){
        $room = Room::where('id','=',$request->room_id)->first();
        $time = explode(" ",$request->duration)[0]/60;
        $data = [
            'user_id'=>backpack_user()->id,
            'room_id'=>$request->room_id,
            'lesson_name'=>$request->lesson_name,
            'duration'=>$request->duration,
            'salary'=>$time*$room->salary,
            'comment'=>$request->comment,
        ];
        Log::create($data);
        return $this->index();
    }
}
