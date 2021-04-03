@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Chào mừng '.backpack_user()->name,
        'button_link' => 'logout',
        'button_text' => 'Đăng xuất',
    ];
@endphp

@section('content')


@endsection
