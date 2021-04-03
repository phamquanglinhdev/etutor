<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class TeacherFrontendController extends Controller
{
    public function index($id){
        return view('frontend.teacher',['id'=>$id]);
    }
    public function save(Request $request,$id){
        $data=[
            'teacher_id'=>$request->teacher_id,
            'user_id'=>$request->user_id,
            'rate'=>$request->rate,
            'content'=>$request->content,
        ];
        Comment::create($data);
        return redirect('/teacher/'.$id);
    }
}
