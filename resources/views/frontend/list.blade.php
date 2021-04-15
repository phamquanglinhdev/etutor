@extends('layout.app')
@php

    $result= \App\Models\Tags::where('slug','=',$slug)->first();
    if(isset($result)){
        $listCourse =$result->Courses()->get();
        $last = explode(' ',$result->name)[0];
        $relate = \App\Models\Tags::limit(8)->get();
    }


@endphp
@section('content')
    @if(isset($result))
        @php
            $title = $result->name.' :: '.env('APP_NAME');
        @endphp
        <div class="container">
            <div class="row py-3">
                <div class="col-md-3 col-12 p-3">
                    <div class="bg-origin text-white p-2 text-uppercase h6">Khóa học liên quan</div>
                    @foreach($relate as $tag)
                        @if($tag->name != $result->name)
                            <div class="p-2 bg-light border">
                                <a class="text-dark link-style-none" href="{{route('tag',$tag->slug)}}">{{$tag->name}}</a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-9 col-12 p-1">
                    <div class="h3">
                        <span class="text-origin">{{$result->name}}</span> có {{$result->courses()->count()}} khóa học
                    </div>
                    <div class="row">
                        @foreach($listCourse as $course)
                            <div class="col-md-4 col-sm-6 col-12 pb-4">
                                <a class="link-style-none" href="{{route('course',['slug'=>$course->slug])}}">
                                    <div class="card">
                                        <div class="overflow-hidden bg-white" style="height: 150px;overflow: hidden">
                                            <img src="{{$course->thumbnail}}"
                                                 class="w-100">
                                        </div>
                                        <div class="card-header">
                                            <b>{{$course->name}}</b>
                                            {{--                                            <div class="text-danger h5">{{$course->price}}</div>--}}
                                            <div>
                                            </div>
                                            <div class="rate">Đánh giá 5 (<i class="fas fa-star text-warning"></i>)
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-origin text-center p-5 h1 container">
            Không tìm thấy !
        </div>
    @endif
@endsection
