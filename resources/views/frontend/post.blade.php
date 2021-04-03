@php
    $have =false;
    $post = null;
    $post= \App\Models\Post::where('slug','=',$slug)->first();
    if(isset($post)){
        $title=$post->title;
        $have =true;
    }
@endphp
@extends('layout.app')
@section('content')

    @if($have)
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous"
                src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0"
                nonce="octYZSHa"></script>
        <div class="container py-5">
            <h1>{{$post->title}}</h1>
            <div class="text-origin">
                <span><i class="fas fa-user"></i> {{$post->author}}</span> | <span><i class="fas fa-clock"></i> {{$post->updated_at}}</span>
            </div>
        </div>
        <div class="container box-shadow py-5">
            {!! $post->content !!}
        </div>
        <div class="container py-5">
            <div class="fb-comments w-100" data-mobile="true" data-href="http://bizenglishintern.com.vn/post/{{$slug}}"
                 data-width="" data-numposts="5"></div>
        </div>
    @else
        <h1 class="text-center text-origin p-5">Không tìm thấy bài viết </h1>
    @endif
    <style>
        @media screen and (max-width: 768px) {
            table, img {
                width: 100% !important;
                height: auto !important;
            }
        }
    </style>
@endsection
