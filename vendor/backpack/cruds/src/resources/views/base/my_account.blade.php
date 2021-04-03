@extends(backpack_view('blank'))

@section('after_styles')
    <style media="screen">
        .backpack-profile-form .required::after {
            content: ' *';
            color: red;
        }
    </style>
@endsection

@php
    $breadcrumbs = [
        trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
        trans('backpack::base.my_account') => false,
    ];
@endphp

@section('header')
    <section class="content-header">
        <div class="container-fluid mb-3">
            <h1>Tài khoản</h1>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">

        @if (session('success'))
            <div class="col-lg-8">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if ($errors->count())
            <div class="col-lg-8">
                <div class="alert alert-danger">
                    <ul class="mb-1">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- UPDATE INFO FORM --}}
        <div class="col-lg-8">
            <form class="form" action="{{ route('backpack.account.info.store') }}" method="post">

                {!! csrf_field() !!}

                <div class="card padding-10">
                    <div class="card-header">
                        Cập nhật thông tin cá nhân
                    </div>

                    <div class="card-body backpack-profile-form bold-labels">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                @php
                                    $label = 'Họ và tên';
                                    $field = 'name';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input required class="form-control" type="text" name="{{ $field }}"
                                       value="{{ old($field) ? old($field) : $user->$field }}">
                            </div>

                            <div class="col-md-6 form-group">
                                @php
                                    $label = config('backpack.base.authentication_column_name');
                                    $field = backpack_authentication_column();
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input required class="form-control"
                                       type="{{ backpack_authentication_column()=='email'?'email':'text' }}"
                                       name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                            </div>
                            <div class="col-md-6 form-group">
                                @php
                                    $label = 'Ảnh đại diện';
                                    $field = 'avatar';
                                @endphp

                                <label class="required">{{ $label }}</label><br>
                                <input type="file" accept="image/*" id="inp" data-handle="uploadImage"
                                       class="form-control" style="
    width: 90px;
    border: none;
    padding: 1px;">
                                <input id="b64" required data-handle="hiddenImage" class="form-control" type="text"
                                       name="{{ $field }}"
                                       value="{{ old($field) ? old($field) : $user->$field }}" hidden>
                                <img id="img" height="150">
                                <script>
                                    document.getElementById("img").src = document.getElementById('b64').value;

                                    function readFile() {
                                        if (this.files && this.files[0]) {
                                            var FR = new FileReader();
                                            FR.addEventListener("load", function (e) {
                                                document.getElementById("img").src = e.target.result;
                                                document.getElementById("b64").value = e.target.result;
                                            });
                                            FR.readAsDataURL(this.files[0]);
                                        }
                                    }

                                    document.getElementById("inp").addEventListener("change", readFile);
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="la la-save"></i> Lưu</button>
                        <a href="{{ backpack_url() }}" class="btn">Hủy</a>
                    </div>
                </div>

            </form>
        </div>

        {{-- CHANGE PASSWORD FORM --}}
        <div class="col-lg-8">
            <form class="form" action="{{ route('backpack.account.password') }}" method="post">

                {!! csrf_field() !!}

                <div class="card padding-10">

                    <div class="card-header">
                        Đổi mật khẩu
                    </div>

                    <div class="card-body backpack-profile-form bold-labels">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                @php
                                    $label = 'Mật khẩu cũ';
                                    $field = 'old_password';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input autocomplete="new-password" required class="form-control" type="password"
                                       name="{{ $field }}" id="{{ $field }}" value="">
                            </div>

                            <div class="col-md-4 form-group">
                                @php
                                    $label ='Mật khẩu mới';
                                    $field = 'new_password';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input autocomplete="new-password" required class="form-control" type="password"
                                       name="{{ $field }}" id="{{ $field }}" value="">
                            </div>

                            <div class="col-md-4 form-group">
                                @php
                                    $label = 'Nhập lại mật khẩu';
                                    $field = 'confirm_password';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input autocomplete="new-password" required class="form-control" type="password"
                                       name="{{ $field }}" id="{{ $field }}" value="">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="la la-save"></i> Đổi mật khẩu</button>
                        <a href="{{ backpack_url() }}" class="btn">Hủy bỏ</a>
                    </div>

                </div>

            </form>
        </div>

    </div>
@endsection
