@extends('layout.app')
@php

    $tags= \App\Models\Tags::get();


@endphp
@section('content')
    @if(isset($tags))
        @php
            $title = "Các khoá học";
        @endphp
        <div class="container pt-3">
            @foreach($tags as $tag)
                <div class="h3 text-origin">{{$tag->name}}</div>
                @php
                    $courses = $tag->Courses()->get();
                @endphp
                <div class="row py-3">
                    @foreach ($courses as $course)
                        <div class="col-md-3 col-sm-6 col-12 pb-4">
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
            @endforeach
        </div>
    @else
        <div class="text-origin text-center p-5 h1 container">
            Không tìm thấy !
        </div>
    @endif
@endsection
