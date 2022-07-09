@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm danh mục truyện</div>
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

                    <form  method="POST" action="{{route('danhmuc.store')}}">
                        @csrf
                        <div class="form-group">
                          <label for="">Tên danh mục</label>
                          <input type="text" name="tendanhmuc" class="form-control" value="{{old('tendanhmuc')}}" onkeyup="ChangeToSlug()" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{old('slug')}}" id="convert_slug">
                          </div>
                        <div class="form-group">
                          <label for="">Mô tả danh mục</label>
                          <textarea type="text" name="mota" class="form-control" style="resize:none;">{{old('mota')}}</textarea>
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
