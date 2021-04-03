<?php

namespace App\Http\Controllers;

use App\Models\Prolife;
use Illuminate\Http\Request;

class ListTeacherController extends Controller
{
    public function makeData($type)
    {
        switch ($type) {
            case 0:
                $title = 'Giáo viên Việt Nam';
                break;
            case 1:
                $title = 'Giáo viên Philipines';
                break;
            case 2:
                $title = 'Giáo viên Bản ngữ';
                break;
            default :
                '';
        }
        $data = [];
        $prolife = Prolife::where('national', '=', $type)->get();
        if (isset($prolife)) {
            foreach ($prolife as $key => $teacher) {
                if (isset($teacher->users()->first()->name)) {
                    $data[$key]['id']=$teacher->users()->first()->id;
                    $data[$key]['name'] = $teacher->users()->first()->name;
                    $data[$key]['avatar'] = $teacher->users()->first()->avatar;
                }
            }
        }

        return $this->index($data, $title);
    }

    public function index($data,$title)
    {
        return view('frontend.teachers', ['data' => $data,'title'=>$title]);

    }
}
