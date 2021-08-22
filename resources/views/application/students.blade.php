@extends("layout.data")
@section("main")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Hồ sơ các học sinh</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dành cho nhân viên và giáo viên</li>
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
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th colspan="3" class="text-center">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student )
                        @if(isset($student->id))
                            <tr>
                                <td>{{$student->User()->first()->name}}</td>
                                <td>{{$student->User()->first()->phone}}</td>
                                <td>{{$student->User()->first()->email}}</td>
                                <td>{{$student->state}}</td>
                                <td>
                                    <a class="w-100 btn btn-success btn-block" href="{{route("student.show",$student->id)}}">Xem</a>
                                </td>
                                @if(backpack_user()->role == 0)
                                    <td>
                                        <a class="w-100 btn btn-warning btn-block" href="{{route("student.edit",$student->id)}}">Sửa</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('student.destroy', ['student' => $student->id]) }}" method="POST">
                                            @csrf

                                            @method('DELETE')
                                            <button type="submit" class="w-100 btn btn-danger btn-block">Xoá</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
