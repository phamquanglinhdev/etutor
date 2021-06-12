<?php

namespace App\Http\Controllers;

use App\Models\Option_Teacher;
use App\Models\Prolife;
use Illuminate\Http\Request;

class ListTeacherController extends Controller
{
    public function makeData($id){
        $id=$id+10001;
        switch ($id){
            case 10001:$title="Giáo viên Việt Nam";break;
            case 10002:$title="Giáo viên Philippine";break;
            case 10003:$title="Giáo viên Bản Xứ";break;
            default:$title="Không tìm thấy";
        }
        $tags = Option_Teacher::where('option_id','=',$id)->get();
        return $this->render($tags,$title);
    }
    public function render($match,$title)
    {
        $data = [];
        foreach ($match as $key => $id) {
            $prolife = Prolife::where('id', '=', $id->{'teacher_id'})->first();
            $data[$key]['id'] = $prolife->users()->first()->id;
            $data[$key]['name'] = $prolife->users()->first()->name;
            $data[$key]['avatar'] = $prolife->users()->first()->avatar;
            $data[$key]['level'] = $prolife->description;
            $data[$key]['table'] = $prolife->celendar;
            $data[$key]['video'] = $prolife->video;
            $data[$key]['price'] = $prolife->price;
            $data[$key]['options'] = $prolife->options()->get();
        }
        return view('frontend.teachers', ['data' => $data, 'title' => $title]);
    }
}
