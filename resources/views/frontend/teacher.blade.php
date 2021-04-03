@php
    $teacher = \App\Models\User::where('id','=',$id)->first();
    if(isset($teacher) && $teacher->role == 1){
       $prolife = $teacher->prolife()->first();
    }

@endphp
@extends('layout.app')
@section('content')
    @if(isset($teacher) && $teacher->role==1 && isset($prolife))
        @php
            $title ='Giảng viên '.$teacher->name;
        @endphp
        <div class="text-dark">
            <div class="bg-thumbnail">
                <div class="container py-5 text-white">
                    <div class="h1">Giảng Viên : {{$teacher->name}}</div>
                    <div class="d-none d-lg-block">
                        <img src="{{$teacher->avatar}}" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class=" rounded  p-3">
                    <div class="h4"><i class="fas fa-book"></i>Giới thiệu</div>
                    <div class="h5">{!! $prolife->level !!}</div>
                    <div class="h4"><i class="fas fa-clock"></i> Thời gian nhận lớp</div>
                    <div class="teaching" id="teaching">
                        {!! $prolife->teaching !!}
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="container text-center p-5 text-origin h1">Không tìm thấy thông tin giáo viên</div>
    @endif
    <style>
        .bg-thumbnail {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{$teacher->avatar}}');
            background-size: cover;
            background-position: center;

        }
        #teaching::-webkit-scrollbar {
            width: 6px;
            background-color: white;
        }

        #teaching::-webkit-scrollbar-thumb {
            background-color: black;
        }

        .teaching {
            overflow-x: scroll
        }

        .teaching td {
            padding: 6px;
            border: 4px solid white;
        }

        .teaching table {
            min-width: 100% !important;

        }

        .box-shadow-white {
            box-shadow: 0 0 11px 6px #ffffff85
        }

        .bg-card {
            background: linear-gradient(
                100deg, #844646, transparent);
            background-size: cover;
        }
    </style>
@endsection
