<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $guarded = ['id'];
    public function getTeacher(){
        return $this->belongsToMany(User::class,'room_teacher','room_id','teacher_id');
    }
    public function getStudent(){
        return $this->belongsToMany(User::class,'room_student','room_id','student_id');
    }


}
