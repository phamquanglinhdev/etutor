@extends('layout.app')
@section('content')
    <div class = "container">
        <form action="#" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <label>Khóa học</label>
                    <div class="form-check-inline">
                        <input type="checkbox" value="1" name="data-teach"> Khóa học cho người dz
                    </div>
                    <div class="form-check-inline">
                        <input type="checkbox" value="2" name="data-teach"> Khóa học cho người dz
                    </div>
                    <div class="form-check-inline">
                        <input type="checkbox" value="3" name="data-teach"> Khóa học cho người dz
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <label>Thời Gian</label>
                    <div class="form-check-inline">
                        <input type="checkbox" value="4" name="data-teach"> Khóa học cho người dz
                    </div>
                    <div class="form-check-inline">
                        <input type="checkbox" value="5" name="data-teach"> Khóa học cho người dz
                    </div>
                    <div class="form-check-inline">
                        <input type="checkbox" value="6" name="data-teach"> Khóa học cho người dz
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <label>Học Phí</label>
                    <div class="form-check-inline">
                        <input type="checkbox" value="7" name="data-teach"> Khóa học cho người dz
                    </div>
                    <div class="form-check-inline">
                        <input type="checkbox" value="8" name="data-teach"> Khóa học cho người dz
                    </div>
                    <div class="form-check-inline">
                        <input type="checkbox" value="9" name="data-teach"> Khóa học cho người dz
                    </div>
                </div>
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
