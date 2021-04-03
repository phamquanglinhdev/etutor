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
        <link rel="stylesheet" href="{{asset('asset/css/teacher.css')}}">
        <div class="text-dark">
            <div class="bg-thumbnail">
                <div class="container py-5 text-white">
                    <div class="row align-items-center">
                        <div class="d-none col-md-3 d-lg-block">
                            <img src="{{$teacher->avatar}}" class="img-fluid">
                        </div>
                        <div class="h1 col-md-9">Giảng Viên : {{$teacher->name}}</div>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class=" rounded  p-3">
                    <div class="h4"><i class="fas fa-book pb-2"></i> Giới thiệu</div>
                    <div class="h5">{!! $prolife->level !!}</div>
                    <div class="h4"><i class="fas fa-clock"></i> Thời gian nhận lớp</div>
                    <div class="teaching" id="teaching">
                        {!! $prolife->teaching !!}
                    </div>
                </div>
            </div>
        </div>
        {{--        Result--}}
        <div class="container">
            <div class="text-center text-origin py-5 h1">Đánh giá</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="bg-light p-5">
                        <div class="text-dark h5">Đánh giá trung bình</div>
                        <div class="h1">5 <i class=" text-warning fas fa-star text-warning mr-2"></i></div>
                        <div>13 đánh giá</div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="my-3 progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                             role="progressbar" style="width: 100%" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="my-3 progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"
                             style="width: 0%" aria-valuenow="50"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="my-3 progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                             role="progressbar" style="width: 0%" aria-valuenow="75"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="my-3 progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                             role="progressbar" style="width: 0%" aria-valuenow="100"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="my-3 progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar"
                             style="width: 0%" aria-valuenow="100"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="media p-5">
                <img class="mr-3 " style="max-width: 80px ;height: auto" src="https://thuthuatnhanh.com/wp-content/uploads/2019/12/anh-gai-xinh-de-thuong-cap-3-580x580.jpg" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0">Trần Thị Linh</h5>
                    <h5>@for($i=1;$i<=5;$i++)
                        <i class="fas fa-star text-warning"></i>
                        @endfor</h5>
                    Khóa học rất hay và bỗ ích, cảm ơn cô rất nhiều !!
                </div>
            </div>
        </div>
        <div class="container">
            <div class="">
                @if(backpack_auth()->check())
                <div class="h3">Đánh giá của bạn</div>
                <form class="rating bg-light" action="{{route('save.comment',['id'=>$teacher->id])}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$teacher->id}}" name="teacher_id">
                    <input type="hidden" value="{{backpack_user()->id}}" name="user_id">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 <i class="fas fa-star text-warning mr-2"></i></label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 <i class="fas fa-star text-warning mr-2"></i></label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 <i class="fas fa-star text-warning mr-2"></i></label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 <i class="fas fa-star text-warning mr-2"></i></label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 <i class="fas fa-star text-warning mr-2"></i></label>
                    <div>
                        <textarea class="form-control" name="content" placeholder="Đánh giá của bạn"></textarea>
                    </div>
                    <div class="text-right pt-2">
                        <button  class="btn btn-origin pointed" type="submit">Gửi</button>
                    </div>
                </form>
                @endif
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
