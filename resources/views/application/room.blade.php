@extends('layout.data')
@section("main")
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Danh sách lớp học</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Danh sách lớp học</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                   Thống kê nhật ký toàn bộ
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Tên lớp</th>
                            <th>Lịch học</th>
                            <th>Học phí 1 giờ</th>
                            <th>Tài liệu</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{$room->name}}</td>
                                <td>{{$room->time}}</td>
                                <td>{{number_format($room->salary)}} đ</td>
                                <td>{{$room->document}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
