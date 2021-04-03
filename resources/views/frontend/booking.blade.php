@php
    $course = \App\Models\Course::where('slug','=',base64_decode($key))->first();
   if(isset($course) && backpack_auth()->check()){
           $title=$course->name;
           $have =true;
           $tag = $course->tags()->first();
           $courseList =$tag->courses()->get();
           $data = [
                'name'=> backpack_user()->name,
                'email' => backpack_user()->email,
                'phone' => backpack_user()->phone,
                'message' => 'Tôi muốn tư vấn khóa '.$course->name,];
           \App\Models\Customer::insert($data);
       }
@endphp
@extends('layout.app')
@section('content')
    @if(! backpack_auth()->check() || ! isset($course))
        <script>
            location.assign('{{route('index')}}');
        </script>
    @else
        <div class="container py-3 ">
            <div class="h2 text-origin text-center">
                Bạn đã đăng ký tư vấn khóa học <a class="link-style-none text-success"
                                                  href="{{route('course',['slug'=>$course->slug])}}">{{$course->name}}</a>
                <p>Chúng tôi sẽ liên hệ cho bạn sớm nhất có thể</p>
            </div>
        </div>
        @if(isset($courseList))
            <div class="text-center text-origin h2 py-5">Các khóa học liên quan</div>
            <div class="container py-5">
                <div class="row">
                    @foreach($courseList  as $relateCourse)
                        @if($relateCourse->name != $course->name)
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card">
                                    <a href="{{route('course',['slug'=>$relateCourse->slug])}}"
                                       class="link-style-none">
                                        <div class="bg-white">
                                            <div class="crop-img">
                                                <img src="{{$relateCourse->thumbnail}}" class="w-100">
                                            </div>
                                            <div class="p-1 card-header">
                                                <b>{{$course->name}}</b>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-between pb-2 container">
            <a class="btn btn-origin" href="{{route('course',['slug'=>$course->slug])}}">Quay lại khóa học</a>
            <a class="btn btn-origin" href="{{route('index')}}">Trở về trang chủ</a>
        </div>
    @endif
@endsection
