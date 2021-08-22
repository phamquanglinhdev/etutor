@extends("layout.data")
@section('main')
    <style>
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm > .col, .gutters-sm > [class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3, .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
    <div class="container-fluid">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img
                                    src="{{isset($student->User()->first()->avatar)?$student->User()->first()->avatar:"https://bootdey.com/img/Content/avatar/avatar7.png"}}"
                                    alt="Admin"
                                     class="rounded-circle" width="150px" height="150px">
                                <div class="mt-3">
                                    <h4>{{$student->User()->first()->name}}</h4>
{{--                                    <p class="text-secondary mb-1">Full Stack Developer</p>--}}
{{--                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>--}}
{{--                                    <button class="btn btn-primary">Follow</button>--}}
{{--                                    <button class="btn btn-outline-primary">Message</button>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <i class="text-primary fas fa-mail-bulk"></i> Email
                                </h6>
                                <span class="text-secondary">{{$student->User()->first()->email}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <i class="text-success fas fa-phone"></i> Số điện thoại
                                </h6>
                                <span class="text-secondary">{{$student->User()->first()->phone}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <i class="text-warning fa fa-archive"></i> Khoá học
                                </h6>
                                <span class="text-secondary">{{$student->package_name}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Trạng thái</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$student->state}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Số buổi học</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$student->lesson}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Số phút / buổi học</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$student->daily_time}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tổng số phút học</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                   {{$student->total_time}}
                                </div>
                            </div>
                            <hr>
                            @if(backpack_user()->role==0)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Học phí</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{number_format($student->fee)}} đ
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Đã nộp</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{number_format($student->paid)}} đ
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ngày nộp</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$student->paid_day}}
                                    </div>
                                </div>
                                <hr>
                                @if($student->fee > $student->paid)
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Còn thiếu</h6>
                                        </div>
                                        <div class="col-sm-9 text-danger">
                                            {{number_format($student->fee - $student->paid)}} đ
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Hạn nộp</h6>
                                        </div>
                                        <div class="col-sm-9 text-danger">
                                            {{$student->exp_day}}
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endif
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-success"
                                       href="{{route("student.edit",$student->id)}}">Sửa thông tin</a>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

        </div>
    </div>
@endsection
