@extends('layout.app')
@section('content')
    <div class="container">
        <div class="p-5 text-center text-origin h1">{{$title}}</div>
        <div class="pb-5 pt-3">
            {!! $data !!}
        </div>
    </div>
@endsection
