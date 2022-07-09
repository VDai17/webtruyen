@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liệt kê truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên truyện</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col" width="12%">Truyện nổi bật</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($listtruyen as $key=>$truyen)
                          <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$truyen->tentruyen}}</td>
                            <td>{{$truyen->tacgia}}</td>
                            <td>{{$truyen->slug}}</td>
                            <td>
                                <img src="{{asset('public/uploads/truyen/'.$truyen->image)}}" style="width:140px;">
                            </td>
                            <td>{{$truyen->tomtat}}</td>
                            <td>
                                @foreach($truyen->thuocnhieudanhmuctruyen as $key=>$danh)
                                {{-- {{$truyen->danhmuctruyen->tendanhmuc}} --}}
                                    <span class="badge badge-pill badge-dark">{{$danh->tendanhmuc}}</span>
                                @endforeach
                            </td>
                            <td>
                                {{-- {{$truyen->theloaitruyen->tentheloai}} --}}
                                @foreach($truyen->thuocnhieutheloaitruyen as $key=>$the)
                                    <span class="badge badge-pill badge-primary">{{$the->tentheloai}}</span>
                                @endforeach
                            </td>
                            <td>{{$truyen->create_at}} - {{$truyen->create_at->diffForHumans()}}</td>
                            <td>
                                @if($truyen->update_at!='')
                                    {{$truyen->update_at}} - {{$truyen->update_at->diffForHumans()}}
                                @endif
                            </td>
                            <td>
                                @if($truyen->kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                @if($truyen->truyen_noibat==0)
                                    <span class="badge badge-pill badge-success">Truyện mới</span>
                                @elseif($truyen->truyen_noibat==1)
                                    <span class="badge badge-pill badge-dark">Truyện nổi bật</span>
                                @else
                                    <span class="badge badge-pill badge-danger">Truyện xem nhiều</span>
                                @endif
                                {{-- <form>
                                    @csrf
                                    <select name="truyen_noibat" data-truyen_id="{{$truyen->id}}"class="form-control truyennoibat">
                                        <option {{$truyen->truyen_noibat=='0'?'selected':''}} value="0">Truyện mới</option>
                                        <option {{$truyen->truyen_noibat=='1'?'selected':''}} value="1">Truyện nổi bật</option>
                                        <option {{$truyen->truyen_noibat=='2'?'selected':''}} value="2">Truyện xem nhiều</option>
                                    </select>
                                </form> --}}
                            </td>
                            <td>
                                <form onclick="return confirm('Bạm có chắc muốn xóa danh mục?');" action="{{route('truyen.destroy',[$truyen->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Xóa</button>
                                </form>
                                <a href="{{route('truyen.edit', [$truyen->id])}}" class="btn btn-warning">Sửa</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

