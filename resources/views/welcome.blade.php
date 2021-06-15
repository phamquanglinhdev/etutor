@extends('layout.app')
@section('slider')
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        {{--        <ol class="carousel-indicators">--}}
        {{--            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
        {{--            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
        {{--            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
        {{--        </ol>--}}
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100"
                     src="{{asset('uploads/banner-1.jpg')}}"
                     alt="First slide">
            </div>
            {{--            <div class="carousel-item">--}}
            {{--                <img class="d-block w-100"--}}
            {{--                     src="{{asset('uploads/banner-2.jpg')}}"--}}
            {{--                     alt="Second slide">--}}
            {{--            </div>--}}
            {{--            <div class="carousel-item">--}}
            {{--                <img class="d-block w-100"--}}
            {{--                     src="{{asset('uploads/banner-3.jpg')}}"--}}
            {{--                     alt="Third slide">--}}
            {{--            </div>--}}
        </div>
        {{--        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
        {{--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
        {{--            <span class="sr-only">Previous</span>--}}
        {{--        </a>--}}
        {{--        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
        {{--            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
        {{--            <span class="sr-only">Next</span>--}}
        {{--        </a>--}}
    </div>
@endsection
@section('content')
    <link href="{{asset('asset/css/index.css')}}" rel="stylesheet">
    <style>
        .contact {
            background-image: url("{{asset('uploads/contact-background.png')}}");
            background-attachment: fixed;
            background-size: contain;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-12 pt-5 h2 text-center"><span class="text-origin text-uppercase">Biz </span>English</div>
            <div class="col-12 p-2 h4 text-center">Chuyên đào tạo tiếng Anh trực tuyến cho người đi làm</div>
            <div class="col-md-4 col-12 text-center">
                <div class="p-3">
                    <img src="{{asset('uploads/intro-1.jpg')}}" class="pb-2 w-100">
                    <p><b>HỌC ONLINE TẠI NHÀ</b></p>
                    <p>Bạn không cần mất thời gian cho việc đi lại hay tắc đường để có thể tới trung tâm học. Bạn có thể
                        ngồi
                        tại nhà để học và giỏi tiếng Anh chỉ với chiếc điện thoại, máy tính hoặc ipad kết nối
                        internet.</p>
                </div>
            </div>
            <div class="col-md-4 col-12 text-center">
                <div class="p-3">
                    <img src="{{asset('uploads/intro-2.jpg')}}" class="pb-2 w-100">
                    <p><b>LỘ TRÌNH CÁ NHÂN HÓA</b></p>
                    <p>Học 1 kèm 1 nên giáo viên có thể hiểu rõ trình độ bạn và dạy bạn theo lộ trình được cá nhân hóa
                        phù hợp nhất với bạn – đảm bảo hiệu quả gấp nhiều lần so với đi học tại trung tâm.</p>
                </div>
            </div>
            <div class="col-md-4 col-12 text-center">
                <div class="p-3">
                    <img src="{{asset('uploads/intro-3.jpg')}}" class="pb-2 w-100">
                    <p><b>CHI PHÍ THẤP</b></p>
                    <p>Học 1 kèm 1 nhưng chi phí cho mỗi buổi học thấp hơn so với học lớp 10 – 12 người tại trung tâm.
                        Đảm bảo bạn có thể học tiếng Anh lâu dài mà không còn lo lắng về vấn đề tài chính.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-12 p-2 py-5 h2 text-center">BẠN CÓ THỂ HỌC GÌ VỚI BIZ ENGLISH?</div>
                <div class="col-md-3 col-sm-6 col-12 tran-shadow d-flex flex-column justify-content-between">
                    <a href="{{route('tag',['slug'=>'hoc-giao-tiep-online-1-1.html'])}}"
                       class="link-style-none text-white">
                        <div class="p-3">
                            <div>
                                <img src="{{asset('uploads/learning-1.png')}}" class="pb-2 w-100">
                            </div>
                            <div class=" text-origin"><b>HỌC GIAO TIẾP
                                    ONLINE 1-1</b></div>
                            <p>Học giao tiếp Online 1 - 1 với giáo viên Việt Nam – gv Philippine – gv Bản Ngữ.</p>
                        </div>
                    </a>
                    <a href="{{route('tag',['slug'=>'hoc-giao-tiep-online-1-1.html'])}}" class="btn btn-origin show">Xem
                        chi tiết</a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 tran-shadow d-flex flex-column justify-content-between">
                    <a href="{{route('tag',['slug'=>'hoc-viet-online-1-1.html'])}}"
                       class="link-style-none text-white">
                        <div class="p-3">
                            <div>
                                <img src="{{asset('uploads/learning-2.png')}}" class="pb-2 w-100">
                            </div>
                            <div class=" text-origin"><b>
                                    HỌC VIẾT ONLINE 1 - 1
                                </b></div>
                            <p>Học viết tiếng Anh từ cơ bản tới nâng cao, các dạng Email và báo cáo trong công việc.</p>
                        </div>
                    </a>
                    <a href="{{route('tag',['slug'=>'hoc-viet-online-1-1.html'])}}" class="btn btn-origin show">Xem chi
                        tiết</a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 tran-shadow  d-flex flex-column justify-content-between">
                    <a href="{{route('tag',['slug'=>'khoa-hoc-theo-yeu-cau.html'])}}"
                       class="link-style-none text-white">
                        <div class="p-3">
                            <div>
                                <img src="{{asset('uploads/learning-3.png')}}" class="pb-2 w-100">
                            </div>
                            <div class=" text-origin"><b>KHÓA HỌC THEO YÊU CẦU</b></div>
                            <p>Học ngữ pháp, phát âm, luyện thi IELTS, TOEIC và tiếng Anh chuyên ngành theo yêu cầu.</p>
                        </div>
                    </a>
                    <a href="{{route('tag',['slug'=>'khoa-hoc-theo-yeu-cau.html'])}}" class="btn btn-origin show">Xem
                        chi tiết</a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 tran-shadow  d-flex flex-column justify-content-between">
                    <a href="{{route('tag',['slug'=>'cac-khoa-hoc-video.html'])}}"
                       class="link-style-none text-white">
                        <div class="p-3">
                            <div>
                                <img src="{{asset('uploads/learning-4.png')}}" class="pb-2 w-100">
                            </div>
                            <div class=" text-origin"><b>CÁC KHÓA HỌC VIDEO</b></div>
                            <p>Học giao tiếp – ngữ pháp – viết – luyện thi IELTS và TOEIC qua các video.</p>
                        </div>
                    </a>
                    <a href="{{route('tag',['slug'=>'cac-khoa-hoc-video.html'])}}" class="btn btn-origin show">Xem chi
                        tiết</a>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-12 pt-5 text-uppercase h2 text-center">GIÁO VIÊN CỦA CHÚNG TÔI</div>
                <div class="col-md-4 col-12 text-center d-flex justify-content-between flex-column mb-5 ">
                    <div class="p-3 ">


                        <img src="{{asset('uploads/teacher-vn.png')}}" class="pb-2 w-100">
                        <p class="mt-1 text-uppercase text-origin"><b>Giáo viên Việt Nam</b></p>
                        <p>Giáo viên Việt Nam với chứng chỉ IELTS 6.5 – 8.0 hoặc du học sinh tại Mỹ - Châu Âu.</p>

                    </div>
                </div>
                <div class="col-md-4 col-12 text-center d-flex justify-content-between flex-column mb-5 ">
                    <div class="p-3">

                        <img src="{{asset('uploads/teacher-pl.png')}}" class="pb-2 w-100">
                        <p class="mt-1 text-uppercase text-origin"><b>Giáo viên Philippines</b></p>
                        <p>Giáo viên Philippines nổi tiếng là những người chuyên dạy tiếng Anh cho học viên trên
                            toàn thế giới.</p>

                    </div>
                </div>
                <div class="col-md-4 col-12 text-center d-flex justify-content-between flex-column mb-5 ">
                    <div class="p-3 ">

                        <img src="{{asset('uploads/teacher-bn.png')}}" class="pb-2 w-100">
                        <p class="mt-1 text-uppercase text-origin"><b>Giáo viên Bản Ngữ</b></p>
                        <p>Giáo viên Mỹ - Châu Âu – Úc – Nam Phi là những nước tiếng Anh là ngôn ngữ chính.</p>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 pt-5 text-uppercase h2 text-center">Tìm kiếm giáo viên</div>
                <div class="col-12 pt-5 text-uppercase text-center">Bạn có thể tìm kiếm giáo viên phù hợp nhất với bạn
                    về khóa học, mức chi phí và thời gian học.
                </div>
                <div class="p-5 d-flex w-100 align-items-center justify-content-center">
                    <button class="btn btn-origin "><a class="link-style-none text-white"
                                                       href="{{route('filter')}}"><i
                                class="fas fa-search"></i> Tìm kiếm ngay</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="p-5 h2 text-center">HỌC VIÊN CỦA CHÚNG TÔI NÓI GÌ ?</div>
        @php
            $comments = \App\Models\Comment::where('teacher_id','=','999999')->orderBy('updated_at','DESC')->get();
        @endphp
        @if(isset($comments))
            <div style="overflow-y: scroll;max-height: 500px">
                @foreach($comments as $comment)
                    @if(isset($comment->users()->first()->name))
                        <div class="media row m-0 px-3 bg-light mt-2 ">
                            <div class="col-sm-2 col-12" style="height: 80px; overflow: hidden;align-self: center">
                                <img
                                    style="width: 120px;"
                                    src="{{$comment->users()->first()->avatar}}"
                                    alt="Generic placeholder image ">
                            </div>
                            <div class="media-body col-sm-10 col-12 ">
                                <div class="mt-0 h5">{{$comment->users()->first()->name}}</div>
                                <div class="font-italic h6">{{$comment->content}}</div>
                                @for($i=1;$i<=$comment->rate;$i++)
                                    <i class="fas fa-star text-warning mr-1"></i>
                                @endfor
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
        @if(backpack_auth()->check())
            <div class="bg-origin p-1 rounded mt-2">
                <div class="p-5">
                    <div class="h3 text-white mb-2">Đánh giá của bạn</div>
                    <form class="rating bg-light rounded p-5" action="{{route('save.comment',['id'=>'999999'])}}"
                          method="post">
                        @csrf
                        <input type="hidden" value="999999" name="teacher_id">
                        <input type="hidden" value="{{backpack_user()->id}}" name="user_id">
                        <input type="radio" id="star5" name="rate" value="5"/>
                        <label for="star5" title="text">5 <i class="fas fa-star text-warning mr-2"></i></label>
                        <input type="radio" id="star4" name="rate" value="4"/>
                        <label for="star4" title="text">4 <i class="fas fa-star text-warning mr-2"></i></label>
                        <input type="radio" id="star3" name="rate" value="3"/>
                        <label for="star3" title="text">3 <i class="fas fa-star text-warning mr-2"></i></label>
                        <input type="radio" id="star2" name="rate" value="2"/>
                        <label for="star2" title="text">2 <i class="fas fa-star text-warning mr-2"></i></label>
                        <input type="radio" id="star1" name="rate" value="1"/>
                        <label for="star1" title="text">1 <i class="fas fa-star text-warning mr-2"></i></label>
                        <div class="mt-2">
                            <textarea class="form-control" name="contents" placeholder="Đánh giá của bạn"
                                      required></textarea>
                        </div>
                        <div class="text-right pt-2">
                            <button class="btn btn-origin pointed" type="submit">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="text-center text-origin">*Bạn cần đăng nhập để đánh giá</div>
        @endif
    </div>
    <div class="container-fluid bg-dark text-white p-5 mb-5">
        <div class="container py-5">
            <div class="row m-0">
                <div class="col-md-4 text-center">
                    <div class="h3">Số giảng viên</div>
                    <div class="h1">{{\App\Models\User::where('role','=',1)->count()}}+</div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="h3">Số học viên</div>
                    <div class="h1">1250+</div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="h3">Khóa học</div>
                    <div class="h1">{{\App\Models\Course::count()}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row m-0 align-items-center contact">
            <div class="col-md-6 col-12 p-5">
                <div class="bg-secondary opacity h2 text-white p-5 text-center">HÃY CHIA SẺ NHU CẦU HỌC TẬP CỦA BẠN
                </div>
            </div>
            <div class="col-md-6 col-12 p-5 bg-light" id="study-register">
                <form action="{{route('save.customer')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="text-origin font-weight-bold" for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label class="text-origin font-weight-bold" for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                               aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Chúng tôi không bao giờ chia sẻ email của
                            bạn</small>
                    </div>
                    <div class="form-group">
                        <label class="text-origin font-weight-bold" for="exampleInputPassword1">Số điện thoại</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label class="text-origin font-weight-bold" for="exampleCheck1">Nhu cầu học tập của bạn</label>
                        <textarea maxlength="255" name="message" class="form-control" id="exampleCheck1"
                                  required></textarea>
                    </div>
                    <button type="submit" class="btn btn-origin show">Gửi đi</button>
                </form>
            </div>
        </div>
    </div>
@endsection

