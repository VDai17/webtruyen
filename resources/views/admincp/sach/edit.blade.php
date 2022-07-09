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

                    <form  method="POST" action="{{route('sach.update', [$sach->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label for="">Tên sách</label>
                          <input type="text" name="tensach" class="form-control" value="{{$sach->tensach}}" onkeyup="ChangeToSlug()" id="slug">
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Tác giả</label>
                            <input type="text" name="tacgia" class="form-control" value="{{old('tacgia')}}">
                        </div> --}}
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug_sach" class="form-control" value="{{$sach->slug_sach}}" id="convert_slug">
                          </div>
                          <div class="form-group">
                            <label for="">Hình ảnh sách</label>
                            <input type="file" name="image" class="form-control" value="{{$sach->hinhsach}}">
                            <img src="{{asset('public/uploads/sach/'.$sach->hinhsach)}}" style="width:140px;">
                          </div>
                        <div class="form-group">
                          <label for="">Tóm tắt sách</label>
                          <textarea type="text" name="tomtat" class="form-control" style="resize:none;">{{$sach->tomtat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung sách</label>
                            <textarea type="text" id="ckeditor_sach" name="noidung" class="form-control" style="resize:none;">{{$sach->noidung}}</textarea>
                          </div>
                        <div class="form-group">
                            <label for="">Lượt xem</label>
                            <input type="text" name="views" class="form-control" value="{{$sach->views}}">
                        </div>
                        <div class="form-group">
                            <label for="">Từ khóa</label>
                            <input type="text" name="tukhoa" class="form-control" value="{{$sach->tukhoa}}">
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
                                @if($sach->kichhoat==0)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif
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

