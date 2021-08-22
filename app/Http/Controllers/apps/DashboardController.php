<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        $count = (object) null;
        $count->student = User::where('role','=','2')->count();
        $count->room = Room::count();
        $count->teacher = User::where('role','=','1')->count();
        $count->admin = User::where('role','=','0')->count();
        return view('application.dashboard',['count'=>$count]);
    }
}
