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
        if(! isset($request->rate)){
            $request->rate =5;
        }
        $data=[
            'teacher_id'=>$request->teacher_id,
            'user_id'=>$request->user_id,
            'rate'=>$request->rate,
            'content'=>$request->contents,
        ];
        Comment::create($data);
        if($data['teacher_id']==999999){
            return redirect('/');
        }
        return redirect('/teacher/'.$id);
    }
    public function delete($teacher,$id){
        Comment::find($id)->delete();
        return redirect('/teacher/'.$teacher);
    }
}
