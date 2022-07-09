@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật sách truyện</div>
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

                    <form  method="POST" action="{{route('truyen.update', [$truyen->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label for="">Tên truyện</label>
                          <input type="text" name="tentruyen" class="form-control" value="{{$truyen->tentruyen}}" onkeyup="ChangeToSlug()" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="">Tác giả</label>
                            <input type="text" name="tacgia" class="form-control" value="{{$truyen->tacgia}}">
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{$truyen->slug}}" id="convert_slug">
                          </div>
                          <div class="form-group">
                            <label for="">Hình ảnh truyện</label>
                            <input type="file" name="image" class="form-control" value="{{$truyen->image}}">
                            <img src="{{asset('public/uploads/truyen/'.$truyen->image)}}" style="width:140px;">
                          </div>
                        <div class="form-group">
                          <label for="">Tóm tắt truyện</label>
                          <textarea type="text" name="tomtat" class="form-control" style="resize:none;">{{$truyen->tomtat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Tags</label>
                            <textarea type="text" name="tags" class="form-control" style="resize:none;">{{$truyen->tags}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục truyện</label>
                            <select name="danhmuc_id" class="form-control">
                            @foreach($danhmuc as $muc)
                              <option {{$muc->id==$truyen->danhmuc_id?'selected':''}} value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Thể loại truyện</label>
                            <select name="theloai_id" class="form-control">
                            @foreach($theloai as $the)
                              <option {{$the->id==$truyen->theloai_id?'selected':''}} value="{{$the->id}}">{{$the->tentheloai}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Truyện nổi bật/hot</label>
                            <select name="truyen_noibat" class="form-control">
                                <option {{$truyen->truyen_noibat=='0'?'selected':''}} value="0">Truyện mới</option>
                                <option {{$truyen->truyen_noibat=='1'?'selected':''}} value="1">Truyện nổi bật</option>
                                <option {{$truyen->truyen_noibat=='2'?'selected':''}} value="2">Truyện xem nhiều</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="kichhoat" class="form-control">
                                @if($truyen->kichhoat==0)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Cập nhật truyện</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

