@extends('layout.app')
@section('content')
    <link rel="stylesheet" href="{{asset('asset/nicelabel/css/jquery-nicelabel.css')}}">
    <script src="{{asset('asset/nicelabel/js/jquery.nicelabel.js')}}"></script>
    <div class="container pb-5">
        <div class="p-5 h1 text-origin text-center">
            {{$title}}
        </div>
        <div class="w-100 btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
             aria-expanded="false" aria-controls="collapseExample">
            Lọc giáo viên
        </div>
        <div class="collapse" id="collapseExample">
            <form action="{{route('filter')}}" method="post">
                @csrf
                <div class="row p-3">
                    @php
                        $filters = \App\Models\Option::get();
                    @endphp
                    @for($i=0;$i<4;$i++)
                        <div class="col-md-3 col-sm-6 col-12 ">
                            @if($i==0)
                                <div class="font-weight-bold text-origin py-2">Bạn muốn học gì?</div>
                            @endif
                            @if($i==1)
                                <div class="font-weight-bold text-origin py-2">Mức học phí bạn có thể chi trả?</div>
                            @endif
                            @if($i==2)
                                <div class="font-weight-bold text-origin py-2">Bạn muốn học với giáo viên nước nào?
                                </div>
                            @endif
                            @if($i==3)
                                <div class="font-weight-bold text-origin py-2">Bạn có thể học vào thời gian nào trong
                                    ngày?
                                </div>
                            @endif
                            @foreach($filters as $option)
                                @if($option->type==$i)
                                    <div class="px-1">
                                        <input class="text-nicelabel"
                                               type="checkbox"
                                               data-nicelabel='{"checked_text": "{{$option->name}}", "unchecked_text": "{{$option->name}}"}'
                                               value="{{$option->id}}" name="data-teach-{{$option->id}}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endfor
                </div>
                <div class="row p-3">
                    @for($w=2;$w<=7;$w++)
                        <div class="px-1">
                            <input class="text-nicelabel" name="999{{$w}}" value="999{{$w}}"
                                   data-nicelabel='{"checked_text": "Thứ {{$w}}", "unchecked_text": "Thứ {{$w}}"}'
                                   type="checkbox">
                        </div>
                    @endfor
                    <div class="px-1">
                        <input class="text-nicelabel" name="9998" value="999{{$w}}"
                               data-nicelabel='{"checked_text": "Chủ nhật", "unchecked_text": "Chủ nhật"}'
                               type="checkbox">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-origin">Lọc</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
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
                                <div>
                                    <div>
                                        Giáo viên dạy: <br> @if(isset($data[$key]['options']))
                                            @foreach($data[$key]['options'] as  $option)
                                                @if($option->type==0)
                                                    <span class="badge badge-danger p-2 my-2">{{$option->name}}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div>
                                        Các mức học phí : <br> @if(isset($data[$key]['options']))
                                            @foreach($data[$key]['options'] as  $option)
                                                @if($option->type==1)
                                                    <span class="badge badge-danger p-2 my-2">{{$option->name}}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div>
                                        Giáo viên nước  : <br> @if(isset($data[$key]['options']))
                                            @foreach($data[$key]['options'] as  $option)
                                                @if($option->type==2)
                                                    <span class="badge badge-danger p-2 my-2">{{$option->name}}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div>
                                        Thời gian có thể dạy trong ngày : <br> @if(isset($data[$key]['options']))
                                            @foreach($data[$key]['options'] as  $option)
                                                @if($option->type==3)
                                                    <span class="badge badge-danger p-2 my-2">{{$option->name}}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div>
                                        Các ngày có thể dạy : <br> @if(isset($data[$key]['options']))
                                            @foreach($data[$key]['options'] as  $option)
                                                @if($option->type==5)
                                                    <span class="badge badge-danger p-2 my-2">{{$option->name}}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="text-white">
                                    <button class="btn btn-origin text-white"><a
                                            href="{{route('teacher',$data[$key]['id'])}}"
                                            class="link-style-none text-white">Xem chi tiết</a></button>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <nav class="pb-4">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                           href="#nav-home-{{$key}}" role="tab" aria-controls="nav-home-{{$key}}"
                                           aria-selected="true">Đánh giá chung
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                               href="#nav-profile-{{$key}}" role="tab"
                                               aria-controls="nav-profile-{{$key}}"
                                               aria-selected="false">Lịch dạy</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                               href="#nav-contact-{{$key}}" role="tab"
                                               aria-controls="nav-contact-{{$key}}"
                                               aria-selected="false">Video dạy mẫu</a>
                                    </div>
                                </nav>
                                <div class="tab-content " id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home-{{$key}}" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        @php
                                            $comments = \App\Models\Comment::where('teacher_id','=',$data[$key]['id'])->orderBy('updated_at','DESC')->get();
                                        @endphp
                                        @foreach($comments as $comment)
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="{{$comment->users()->first()->avatar}}"
                                                         class="media-object" style="width:60px">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{$comment->users()->first()->name}}</h4>
                                                    <p>{{$comment->content}}</p>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile-{{$key}}" role="tabpanel"
                                         aria-labelledby="nav-profile-tab">
                                        {!!$data[$key]['table']!!}
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact-{{$key}}" role="tabpanel"
                                         aria-labelledby="nav-contact-tab">
                                        <iframe width="100%" height="100%"
                                                src="https://www.youtube.com/embed/7Q1I5nuBa6w"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
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
        $("table").css('width', "400px");
        $("td").each(function () {
            if ($(this).html() != "&nbsp;") {
                $(this).addClass("text-origin")
                $(this).addClass("bg-origin")
                $(this).html("Hav")
            }
        });
    </script>
    <script>
        $('input').nicelabel({

            // use labels
            uselabel: true,

            // text for checked state
            checked_text: 'Checked',

            // text for unchecked state
            unchecked_text: 'Unchecked',

            // icon for checked state
            checked_ico: '{{asset('asset//nicelabel/ico/tick-checked.png')}}',

            // icon for unchecked state
            unchecked_ico: '{{asset('asset//nicelabel/ico/tick-unchecked.png')}}',

        });
    </script>
@endsection
