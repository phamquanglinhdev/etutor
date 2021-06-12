<?php

namespace App\Http\Controllers;

use App\Models\Prolife;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class Filter extends Controller
{
    public function index(Request $request)
    {
        $match = [];
        $data = array_values($request->all());
        array_shift($data);
        $teachers = Prolife::get();
        foreach ($teachers as $key => $teacher){
            $tmp = [];
            $options = $teacher->options()->get();
            foreach ($options as $option) {
                $tmp[] = (string)$option->id;
            }
            if ($this->filter($data, $tmp)) {
                $match[] = $teacher->id;
            };
        }
        //return $match;
        return $this->render($match);
    }

    public function filter($data, $options)
    {
        $mainType = 0;
        $subType  = 0;
        $main =0;
        $sub =0;
        $active=0;
        foreach ($data as $value) {
            if ((integer)$value > 9998) {
                $main ++;
                if (in_array($value, $options)) {
                    $mainType ++;
                }
            }else{
                $sub++;
                $active =1;
                if(in_array($value,$options)){
                    $subType ++;
                }
            }
        }
        if($mainType == $main && $active == 0){
            return true;
        }else{
            if($mainType == $main && $subType>=1){
                return  true;
            }else{
                return false;
            }
        }
    }
    public function render($match)
    {
        $data = [];
        foreach ($match as $key => $id) {
            $prolife = Prolife::where('id', '=', $id)->first();
            $data[$key]['id'] = $prolife->users()->first()->id;
            $data[$key]['name'] = $prolife->users()->first()->name;
            $data[$key]['avatar'] = $prolife->users()->first()->avatar;
            $data[$key]['level'] = $prolife->description;
            $data[$key]['table'] = $prolife->celendar;
            $data[$key]['video'] = $prolife->video;
            $data[$key]['price'] = $prolife->price;
            $data[$key]['options'] = $prolife->options()->get();
        }
        return view('frontend.teachers', ['data' => $data, 'title' => 'Lọc giáo viên']);
    }
}
