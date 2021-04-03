@extends('layout.app')
@php

        $result= \App\Models\Tags::where('slug','=',$slug)->first();
        if(isset($result)){
            $listCourse =$result->Courses()->get();
            $last = explode(' ',$result->name)[0];
            $relate = \App\Models\Tags::where('name','like','%'.$last.'%')->limit(8)->get();
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
                    <div class="card">
                        <div
                            class="card-header text-uppercase h5 text-center">Liên quan</div>

                            <ul class="py-2">
                                @foreach($relate as $tag)
                                <li class="badge badge-secondary text-white">
                                    <a class="text-white" href="{{route('tag',$tag->slug)}}">{{$tag->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                    </div>
                </div>
                <div class="col-md-9 col-12 p-1">
                    <div class="h3">Từ khóa <span
                            class="text-origin">{{$result->name}}</span> có {{$result->courses()->count()}}
                        khóa học
                    </div>
                    <div class="row">
                        @foreach($listCourse as $course)
                            <div class="col-md-4 col-sm-6 col-12 pb-4">
                                <a class="link-style-none" href="{{route('course',['slug'=>$course->slug])}}">
                                    <div class="card">
                                        <div class="overflow-hidden" style="height: 150px;overflow: hidden">
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
