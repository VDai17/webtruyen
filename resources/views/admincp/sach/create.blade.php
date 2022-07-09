@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm sách</div>
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

                    <form  method="POST" action="{{route('sach.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="">Tên sách</label>
                          <input type="text" name="tensach" class="form-control" value="{{old('tensach')}}" onkeyup="ChangeToSlug()" id="slug">
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Tác giả</label>
                            <input type="text" name="tacgia" class="form-control" value="{{old('tacgia')}}">
                        </div> --}}
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug_sach" class="form-control" value="{{old('slug')}}" id="convert_slug">
                          </div>
                          <div class="form-group">
                            <label for="">Hình ảnh sách</label>
                            <input type="file" name="image" class="form-control" value="{{old('image')}}">
                          </div>
                        <div class="form-group">
                          <label for="">Tóm tắt sách</label>
                          <textarea type="text" name="tomtat" class="form-control" style="resize:none;">{{old('tomtat')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung sách</label>
                            <textarea type="text" id="ckeditor_sach" name="noidung" class="form-control" style="resize:none;">{{old('noidung')}}</textarea>
                          </div>
                        <div class="form-group">
                            <label for="">Lượt xem</label>
                            <input type="text" name="views" class="form-control" value="{{old('views')}}">
                        </div>
                        <div class="form-group">
                            <label for="">Từ khóa</label>
                            <input type="text" name="tukhoa" class="form-control" value="{{old('tukhoa')}}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Danh mục truyện</label>
                            <select name="danhmuc_id" class="form-control">
                            @foreach($danhmuctruyen as $danhmuc)
                              <option value="{{$danhmuc->id}}">{{$danhmuc->tendanhmuc}}</option>
                            @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="">Thể loại truyện</label>
                            <select name="theloai_id" class="form-control">
                            @foreach($theloaitruyen as $theloai)
                              <option value="{{$theloai->id}}">{{$theloai->tentheloai}}</option>
                            @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="">Truyện nổi bật/hot</label>
                            <select name="truyen_noibat" class="form-control">
                                <option value="0">Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option value="2">Truyện xem nhiều</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="kichhoat" class="form-control">
                              <option value="0">Kích hoạt</option>
                              <option value="1">Không kích hoạt</option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Thêm sách</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

