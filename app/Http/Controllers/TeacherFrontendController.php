<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class TeacherFrontendController extends Controller
{
    public function index($id){
        $comments=null;
        $comments = Comment::where('teacher_id','=',$id)->orderBy('updated_at','DESC')->get();
        return view('frontend.teacher',['id'=>$id,'comments'=>$comments]);
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
    public function delete($teacher,$id){
        Comment::find($id)->delete();
        return redirect('/teacher/'.$teacher);
    }
}
