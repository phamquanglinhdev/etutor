@extends(backpack_view('layouts.plain'))

<!-- Main Content -->
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-6">
            <h3 class="text-center mb-4">Reset mật khẩu</h3>
            <div class="nav-steps-wrapper">
                <ul class="nav nav-tabs">
                  <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab"><strong>Bước 1.</strong> Nhập email</a></li>
                  <li class="nav-item"><a class="nav-link disabled text-muted"><strong>Bước 2.</strong> Đổi mật khẩu mới</a></li>
                </ul>
            </div>
            <div class="nav-tabs-custom">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    @if (session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                    @else
                    <form class="col-md-12 p-t-10" role="form" method="POST" action="{{ route('backpack.auth.password.email') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label" for="email">Địa chỉ email</label>

                            <div>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary">
                                    Gửi link reset vào email của bạn
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif
                    <div class="clearfix"></div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>

              <div class="text-center mt-4">
                <a href="{{ route('backpack.auth.login') }}">Đăng nhập</a>

                @if (config('backpack.base.registration_open'))
                / <a href="{{ route('backpack.auth.register') }}">Đăng ký</a>
                @endif
              </div>
        </div>
    </div>
@endsection
