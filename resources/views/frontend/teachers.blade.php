@extends('layout.app')
@section('content')
    <div class="container ">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
            Lọc giáo viên
        </button>
        <div class="collapse" id="collapseExample">
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
    </div>
    <div class="container">
        <div class="p-5 h1 text-origin text-center">
            {{$title}}
        </div>
        @foreach($data as $key => $teacher)
            <div class="border p-3 shadow">
                    <div class="row">
                        <div class="col-md-3 col-sm-6-col-12">
                            <img class="img-fluid" alt="noe"
                                 src="{{ $data[$key]['avatar'] != null ? $data[$key]['avatar'] : 'https://cloudcone.com/wp-content/uploads/2019/03/blank-avatar.jpg'}}">
                        </div>
                        <div class="text-dark p-2 col-md-9 col-sm-6 col-12">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <b class="h4">{{$data[$key]['name']}}</b>
                                    <div class="w-100">
                                        {!! $data[$key]['level']!!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home-{{$key}}" role="tab" aria-controls="nav-home-{{$key}}" aria-selected="true">Home</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile-{{$key}}" role="tab" aria-controls="nav-profile-{{$key}}" aria-selected="false">Lịch dạy</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact-{{$key}}" role="tab" aria-controls="nav-contact-{{$key}}" aria-selected="false">Tôi muốn học</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home-{{$key}}" role="tabpanel" aria-labelledby="nav-home-tab">
                                            TAV
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile-{{$key}}" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            {!!  $data[$key]['table'] !!}
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact-{{$key}}" role="tabpanel" aria-labelledby="nav-contact-tab">
                                            BB
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
    <script>
        $("table").css('width',"400px");
        $( "td" ).each(function() {
            if($(this).html() != "&nbsp;"){
                $(this).addClass("text-origin")
                $(this).addClass("bg-origin")
                $(this).html("Hav")

            }
        });
    </script>
@endsection
