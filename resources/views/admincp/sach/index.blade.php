@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liệt kê sách</div>

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
                            <th scope="col">Tên sách</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($listsach as $key=>$sach)
                          <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$sach->tensach}}</td>
                            <td>{{$sach->slug_sach}}</td>
                            <td>
                                <img src="{{asset('public/uploads/sach/'.$sach->hinhsach)}}" style="width:140px;">
                            </td>
                            <td>{{$sach->tomtat}}</td>
                            <td>{{$sach->noidung}}</td>
                            <td>{{$sach->create_at}} - {{$sach->create_at->diffForHumans()}}</td>
                            <td>
                                @if($sach->update_at!='')
                                    {{$sach->update_at}} - {{$sach->update_at->diffForHumans()}}
                                @endif
                            </td>
                            <td>
                                @if($sach->kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <form onclick="return confirm('Bạm có chắc muốn xóa danh mục?');" action="{{route('sach.destroy',[$sach->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Xóa</button>
                                </form>
                                <a href="{{route('sach.edit', [$sach->id])}}" class="btn btn-warning">Sửa</a>
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

