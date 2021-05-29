@extends('layout.app')
@section('content')
    <div class = "container">
        <form action="#" method="get">
            @csrf
            <div class="row p-3">
                @for($a=1;$a<=4;$a++)
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="font-weight-bold text-origin">Khóa học</div>
                        @for($i=1;$i<=3;$i++)
                            <div class="form-check-inline">
                                <input id="data-{{$i*$a}}" type="checkbox" value="{{$i*$a}}" name="data-teach">
                                <label for="data-{{$i*$a}}">Khóa học mẫu {{$i*$a}}</label>
                            </div>
                        @endfor
                    </div>
                @endfor
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-origin">Lọc</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="p-5 h1 text-origin text-center">
            {{$title}}
        </div>
        <div class="row">
            @foreach($data as $key => $teacher)
                <div class="col-md-3 col-sm-6 col-12 p-3">
                    <div class="card">
                        <a href="{{route('teacher',['id'=>$data[$key]['id']])}}">
                            <div class="avatar position-relative">
                                <img class="img-fluid"
                                     src="{{ $data[$key]['avatar'] != null ? $data[$key]['avatar'] : 'https://cloudcone.com/wp-content/uploads/2019/03/blank-avatar.jpg'}}">
                            </div>
                            <div class="text-dark p-2">
                                <b>{{$data[$key]['name']}}</b>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .avatar {
            image-orientation: grad;
            position: absolute;
            height: 200px;
            overflow: hidden;
        }
    </style>
@endsection
