@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê danh mục truyện</div>

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
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($danhmuctruyen as $key=>$danhmuc)
                          <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$danhmuc->tendanhmuc}}</td>
                            <td>{{$danhmuc->slug}}</td>
                            <td>{{$danhmuc->mota}}</td>
                            <td>
                                @if($danhmuc->kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <form onclick="return confirm('Bạm có chắc muốn xóa danh mục?');" action="{{route('danhmuc.destroy',[$danhmuc->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Xóa</button>
                                </form>
                                <a href="{{route('danhmuc.edit', [$danhmuc->id])}}" class="btn btn-warning">Sửa</a>
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
