@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-danger"><h5>Cấp vai trò User: {{$user->name}}</h5></div>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  method="POST" action="{{url('insert-roles', [$user->id])}}">
                        @csrf
                        @if(isset($name_roles))
                            <span class="text-info">Vai trò hiện tại: {{$name_roles}}</span><hr>
                        @else
                            <span class="text-info">Chưa cấp vai trò</span><hr>
                        @endif
                        @foreach ($role as $key=>$r)
                            @if(isset($all_column_roles))
                                <div class="form-check form-check-inline">
                                    <input type="radio" {{$r->id==$all_column_roles->id ? 'checked':''}} name="role" id="{{$r->id}}" value="{{$r->name}}"class="form-check-input">
                                    <label for="{{$r->id}}" class="form-check-label">{{$r->name}}</label>
                                </div>
                            @else
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="role" id="{{$r->id}}" value="{{$r->name}}"class="form-check-input">
                                    <label for="{{$r->id}}" class="form-check-label">{{$r->name}}</label>
                                </div>
                            @endif
                        @endforeach
                        <br>
                        <button type="submit" class="btn btn-primary">Cấp vai trò User</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-danger"><h5>Thêm vai trò user</h5></div>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="card-body">
                    @if (session('status_per'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status_per') }}
                        </div>
                    @endif
                    <form  method="POST" action="{{url('/insert-roles')}}">
                        @csrf
                        <div class="form-group">
                        <label for="">Tên vai trò</label>
                        <input type="text" name="roles" class="form-control" value="{{old('roles')}}" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm vai trò</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
