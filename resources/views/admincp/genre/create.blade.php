@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm thể loại truyện</div>
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

                    <form  method="POST" action="{{route('theloai.store')}}">
                        @csrf
                        <div class="form-group">
                          <label for="">Tên thể loại</label>
                          <input type="text" name="tentheloai" class="form-control" value="{{old('tendanhmuc')}}" onkeyup="ChangeToSlug()" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{old('slug')}}" id="convert_slug">
                          </div>
                        <div class="form-group">
                          <label for="">Mô tả thể loại</label>
                          <textarea type="text" name="mota" class="form-control" style="resize:none;">{{old('mota')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="kichhoat" class="form-control">
                              <option value="0">Kích hoạt</option>
                              <option value="1">Không kích hoạt</option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Thêm thể loại</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
