<!DOCTYPE html>
<html lang="vi">
<head>
    @php
        $config = \App\Models\Cofig::first();
    @endphp
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}"/>
    <title>{{isset($title) ? $title : env('APP_NAME')}}</title>
    <meta charset="UTF-8">
    <meta name="description" content="{{$config->description}}"/>
    <meta name="keyword" content="{{$config->keyword}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/app.css')}}">
    <script type="text/javascript" src="{{asset('asset/js/fontawesome.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/js/poper.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/js/sweet.alert.js')}}"></script>
</head>
<body>
<div class="container-fluid">
    <header class="bg-origin">
        <div class="bg-origin text-white font-weight-bold py-2">
            <div class="container-fluid px-5 text-center">
                <div class="row justify-content-between">
                    <span class="col-lg w-100"><i class="fas fa-phone"></i> {{$config->host_phone}}</span>
                    <span class="col-lg w-100"><i class="fas fa-mail-bulk"></i> {{$config->host_mail}}</span>
                    <span class="col-lg w-100"><a>Kiểm tra thử</a></span>
                    @if(backpack_auth()->check() && backpack_user()->role <= 1)
                        <span class="col"><a class="text-white link-style-none"
                                             href="{{route('backpack.dashboard')}}"><i class="fas fa-user"></i> Quản trị</a></span>
                    @endif
                </div>
            </div>
        </div>
        <div class="py-2 bg-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center">
                    <div class=" col-md-4 p-1 mt-2 text-center text-lg-left">
                        <a href="{{route('index')}}">
                            <img src="{{asset('img/logo.png')}}" class="w-50">
                        </a>
                    </div>
                    <div class="col-md-4 mt-2">
                        <div class="input-group">
                            <input class="form-control" id="search" placeholder="Tìm khóa học ..."/>
                            <div class="input-group-append">
                                <button class="btn btn-origin" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-lg-4 py-2 rounded text-center text-white h4 bg-origin mt-2">
                        Hotline: {{$config->host_phone}} </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-origin">
        <div class="container">
            <a class="navbar-brand d-md-none d-block" href="{{route('index')}}">{{env('APP_NAME')}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('index')}}">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  text-white dropdown-toggle" href="http://example.com"
                           id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Khóa học
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('tag','hoc-giao-tiep-online-1-1.html')}}">Học
                                    Giao Tiếp Online 1-1</a></li>
                            <li><a class="dropdown-item" href="{{route('tag','hoc-viet-online-1-1.html')}}">Học Viết
                                    Online 1-1</a></li>
                            <li><a class="dropdown-item" href="{{route('tag','khoa-hoc-theo-yeu-cau.html')}}">Khóa Học
                                    Theo Yêu Cầu</a></li>
                            <li><a class="dropdown-item" href="{{route('tag','cac-khoa-hoc-video.html')}}">Các Khóa Học
                                    Video</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="http://example.com"
                           id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Chia sẻ kinh nghiệm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('posts',['slug'=>'hoc-noi'])}}">Học nói</a></li>
                            <li><a class="dropdown-item" href="{{route('posts',['slug'=>'hoc-viet'])}}">Học viết</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('posts',['slug'=>'hoc-nghe'])}}">Học nghe</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('posts',['slug'=>'hoc-nghe'])}}">Tài liệu</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('index')}}#study-register">Đăng ký học thử</a>
                    </li>
                </ul>
                <div class="text-white">
                    @if(backpack_auth()->check())
                        <a class="text-white px-1" href="{{route('backpack.account.info')}}">
                            <i class="fas fa-user"></i> {{backpack_user()->name}} </a>
                        <a class="text-white px-1" href="{{route('backpack.auth.logout')}}">
                            <i class="fas fa-sign-out-alt"></i> Đăng xuất </a>
                    @else
                        <a class="text-white px-1" href="{{route('backpack.auth.login')}}">
                            <i class="fas fa-sign-in-alt"></i> Đăng nhập </a>
                        <a class="text-white px-1 btn btn-origin py-1" href="{{route('backpack.auth.register')}}">
                            <i class="fas fa-plus-square"></i> Đăng ký </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
@yield('slider')
@yield('content')
<!-- Site footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>Đăng ký nhận thông tin mới nhất về BizEnglish</h6>
                    <form action="#" method="post">
                        @csrf
                        <div class="input-group mb-3 py-3 pr-5">
                            <input type="text" name="email" class="form-control" placeholder="Email của bạn"
                                   aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"><i
                                        class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="">
                        <h6>CÔNG TY TNHH BIZ ENGLISH</h6>
                        <div><i class="fas fa-map-marked"></i> Trụ sở: Số 9, ngõ 908/36 Kim Giang, thành phố Hà Nội.
                        </div>
                        <div><i class="fas fa-building"></i>
                            Văn phòng giao dịch Hà Nội:<br>
                            Phòng 08, tầng 38, Tòa HH3B khu đô thị Linh Đàm, quận Hoàng Mai, Hà Nội.
                        </div>
{{--                        <div><i class="fas fa-building"></i>--}}
{{--                            Văn phòng giao dịch Đà Nẵng:<br>--}}
{{--                            Số 80 Trần Văn Dư, quận Ngũ Hành Sơn, Tp Đà Nẵng.--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Thông tin BizEnglish</h6>
                    <ul class="footer-links">
                        <li><a href="{{route('page',['type'=>'how_learn'])}}#study-regester">Cách thức học</a></li>
                        <li><a href="{{route('page',['type'=>'faq'])}}">Câu hỏi thường gặp</a></li>
                        <li><a href="{{route('page',['type'=>'payment'])}}">Học phí và cách thanh toán</a>
                        </li>
                        <li><a href="{{route('page',['type'=>'be_teacher'])}}">Trở thành giáo viên</a>
                        </li>
                        <li><a href="{{route('page',['type'=>'be_client'])}}">Trờ thành đối tác của BizEnglish</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Kết nối với BizEnglish</h6>
                    <div class="fb-page" data-href="https://www.facebook.com/bizenglishforsuccess/" data-tabs=""
                         data-width="" data-height="" data-small-header="true" data-adapt-container-width="false"
                         data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/bizenglishforsuccess/" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/bizenglishforsuccess/">BIZ English - Dạy Nói và Viết Tiếng
                                Anh Online Cho Người Đi Làm</a></blockquote>
                    </div>
                    <div class="text-white mt-2"><i class="fas fa-phone"></i> Hotline</div>
                    <div class="text-origin h5"> 0977281661</div>
                    <div class="text-white mt-2"><i class="fas fa-mail-bulk"></i> Email</div>
                    <div class="text-origin h5"> bizenglishforsuccess@gmail.com</div>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by
                        <a href="#">BizEnglish</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="bg-primary text-white" href="https://www.facebook.com/bizenglishforsuccess/"><i class="fab fa-facebook"></i></a></li>
                        <li><a class="bg-danger text-white" href="https://www.youtube.com/channel/UCN5yXnMNbee92FQWR2Eq2nQ"><i class="fab fa-youtube"></i></a></li>
                        <li><a class="bg-primary" href="https://zalo.me/0977281661"><img src="https://cdn.freebiesupply.com/logos/large/2x/zalo-1-logo-black-and-white.png" class="w-100 rounded-circle"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script>
        $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
            }
            var $subMenu = $(this).next('.dropdown-menu');
            $subMenu.toggleClass('show');


            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
                $('.dropdown-submenu .show').removeClass('show');
            });


            return false;
        });
    </script>
</div>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v10.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution="setup_tool"
     page_id="400513617073068"
     color="#00B0F0">
</div>
</body>
</html>
