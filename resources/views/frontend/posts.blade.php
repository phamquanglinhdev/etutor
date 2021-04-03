@php
switch ($type){
    case 0:$title = 'Học nói';break;
    case 1:$title = 'Học viết';break;
    case 2:$title = 'Học nghe';break;
    default :;
}
$posts = \App\Models\Post::where('type','=',$type)->get();
@endphp
@extends('layout.app')

@section('content')
    <div class="container">
        @if (isset($posts))
        <div class="text-center text-origin h2 pt-5">{{$title}}</div>
        <div class="py-5">
            @foreach($posts as $post)
                <div class="h5 text-origin">
                    <i class="fas fa-eye"></i>
                    <a  class="link-style-none text-origin" href="{{route('post',['slug'=>$post->slug])}}">{{$post->title}}</a>
                </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
