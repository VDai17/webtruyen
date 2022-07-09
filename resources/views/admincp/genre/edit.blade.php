@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa thể loại truyện</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  method="POST" action="{{route('theloai.update', [$theloai->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label for="">Tên danh mục</label>
                          <input type="text" name="tentheloai" class="form-control" value="{{$theloai->tentheloai}}" onkeyup="ChangeToSlug()" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{$theloai->slug}}" id="convert_slug">
                        </div>
                        <div class="form-group">
                          <label for="">Mô tả danh mục</label>
                          <textarea type="text" name="mota" class="form-control" style="resize:none;">{{$theloai->mota}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="kichhoat" class="form-control">
                                @if($theloai->kichhoat==0)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Cập nhật thể loại</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
