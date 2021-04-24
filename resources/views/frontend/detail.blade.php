@php
    $have =false;
    $course = null;
    $course= \App\Models\Course::where('slug','=',$slug)->first();
    if(isset($course)){
        $title=$course->name;
        $have =true;
        $tag = $course->tags()->first();
        $courseList =$tag->courses()->get();

    }

@endphp
@extends('layout.app')
@section('content')
    @if(!$have)
        <h1 class="text-center text-success p-5">Không tồn tại khóa học</h1>
    @else
        <style>
            .bg-thumbnail {
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{$course->thumbnail}}');
                background-size: cover;
                background-position: center;

            }
        </style>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous"
                src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0"
                nonce="octYZSHa"></script>
        <div class="bg-thumbnail py-5 text-white">
            <div class="container p-5">
                <div class="h1">{{$course->name}}</div>
                <a class="link-style-none btn booking btn-outline-primary text-white" href="{{route('booking',['key'=>base64_encode($course->slug)])}}">Tư vấn về khóa học này ?</a>
            </div>
        </div>
        <div class="container py-5">
            <div class="h2 p5 w-100 content">Giới thiệu khóa học</div>
            <div>
                {!! $course -> description !!}
            </div>
            <hr>
            <div class="h2 p5 w-100 content-wrapper">Phương pháp học</div>
            <div>
                {!! $course -> learning !!}
            </div>
            <hr>
            <div class="h2 p5 w-100">Nội dung khóa học</div>
            <div id="preview">
                {!! $course -> content !!}
            </div>
        </div>
        <div class="container">

            <a class="btn btn-origin w-100 booking link-style-none text-white" href="{{route('booking',['key'=>base64_encode($course->slug)])}}">Tư vấn về khóa học này ?</a>
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
                                                {{$relateCourse->name}}
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
        <div class="container">
            <div class="fb-comments w-100" data-mobile="true" data-href="http://bizenglish.vn/course/{{$slug}}"
                 data-width="" data-numposts="5"></div>
        </div>
        <div class="list">
            @endif
            <style>
                #preview a,.booking {
                    color: #0B90C4;
                    cursor: pointer;
                }

                .crop-img {
                    height: 150px;
                    overflow: hidden;
                }

                @media screen and (max-width: 576px) {
                    table, img {
                        width: 100% !important;
                        height: auto !important;
                    }
                }
            </style>
           @endsection
