@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liệt kê chapter truyện</div>

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
                            <th scope="col">Tên chapter</th>
                            <th scope="col">Truyện</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($chapter as $key=>$chap)
                          <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$chap->tieude}}</td>
                            <td>{{$chap->truyen->tentruyen}}</td>
                            <td>{{$chap->slug}}</td>
                            <td>{{$chap->tomtat}}</td>
                            <td>{!!substr($chap->noidung, 0 , 200)!!}</td>
                            <td>
                                @if($chap->kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <form onclick="return confirm('Bạm có chắc muốn xóa danh mục?');" action="{{route('chapter.destroy',[$chap->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Xóa</button>
                                </form>
                                <a href="{{route('chapter.edit', [$chap->id])}}" class="btn btn-warning">Sửa</a>
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
