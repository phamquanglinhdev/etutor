@extends("layout.data")
@section("main")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Điểm danh giờ dạy</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dành cho giáo viên</li>
        </ol>
    </div>
    <div class="container-fluid bg-white">
        <form action="{{route("app.log.store")}}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="room_id">Phòng học</label>
                <select class="form-control"  id="room_id" name="room_id">
                    @foreach($rooms as $room)
                        <option value="{{$room->id}}">{{$room->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="lesson_name">Tên bài học</label>
                <input type="text" class="form-control" id="lesson_name" name="lesson_name" placeholder="Lesson 01: Hello" required/>
            </div>
            <div class="form-group mb-3">
                <label for="duration">Thời gian dạy (phút)</label>
                <input type="text" class="form-control" id="duration" name="duration" placeholder="VD: 30 phút" required/>
            </div>
            <div class="form-group mb-3">
                <label for="duration">Bình luận thêm</label>
                <textarea type="text" class="form-control" id="comment" name="comment" placeholder="Ghi chú"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Điểm danh</button>
        </form>
    </div>
@endsection
