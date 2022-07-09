@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật chapter truyện</div>
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

                    <form  method="POST" action="{{route('chapter.update', [$chapter->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label for="">Tên chapter</label>
                          <input type="text" name="tieude" class="form-control" value="{{$chapter->tieude}}" onkeyup="ChangeToSlug()" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{$chapter->slug}}" id="convert_slug">
                          </div>
                        <div class="form-group">
                          <label for="">Tóm tắt chapter</label>
                          <textarea type="text" name="tomtat" class="form-control" style="resize:none;">{{$chapter->tomtat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung chapter</label>
                            <textarea type="text" id="desc" name="noidung" class="form-control" rows="10" style="resize:none;">{{$chapter->noidung}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Thuộc truyện</label>
                            <select name="truyen_id" class="form-control">
                                @foreach($truyen as $tr)
                                    <option {{$tr->id==$chapter->truyen_id?'selected':''}} value="{{$tr->id}}">{{$tr->tentruyen}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="kichhoat" class="form-control">
                                @if($chapter->kichhoat==0)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Cập nhật chapter</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
