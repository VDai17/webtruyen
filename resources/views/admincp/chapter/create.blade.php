@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm chapter truyện</div>
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

                    <form  method="POST" action="{{route('chapter.store')}}">
                        @csrf
                        <div class="form-group">
                          <label for="">Tên chapter</label>
                          <input type="text" name="tieude" class="form-control" value="{{old('tieude')}}" onkeyup="ChangeToSlug()" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{old('slug')}}" id="convert_slug">
                          </div>
                        <div class="form-group">
                          <label for="">Tóm tắt chapter</label>
                          <textarea type="text" name="tomtat" class="form-control" style="resize:none;">{{old('tomtat')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung chapter</label>
                            <textarea type="text" id="desc" name="noidung" class="form-control" rows="10" style="resize:none;">{{old('noidung')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Thuộc truyện</label>
                            <select name="truyen_id" class="form-control">
                                @foreach($truyen as $tr)
                                <option value="{{$tr->id}}">{{$tr->tentruyen}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="kichhoat" class="form-control">
                              <option value="0">Kích hoạt</option>
                              <option value="1">Không kích hoạt</option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
