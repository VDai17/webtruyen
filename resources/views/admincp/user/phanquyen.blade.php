@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-danger"><h5>Cấp quyền User: {{$user->name}}</h5></div>
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

                    <form  method="POST" action="{{url('/insert-permission', [$user->id])}}">
                        @csrf
                        @if(isset($name_roles))
                            <span class="text-info">Vai trò hiện tại: {{$name_roles}}</span><hr>
                        @else
                            <span class="text-info">Chưa cấp vai trò</span><hr>
                        @endif
                        <span class="text-primary">Cấp quyền</span>
                        @foreach($permission as $key=>$per)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    @foreach($get_permission_via_role as $key =>$get)
                                        @if($get->id == $per->id)
                                            checked
                                        @endif
                                    @endforeach
                                name="permission[]" multiple value="{{$per->id}}" id="{{$per->id}}">
                                <label class="form-check-label" for="{{$per->id}}">
                                    {{$per->name}}
                                </label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Cấp quyền User</button>
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
                <div class="card-header text-danger"><h5>Thêm quyền user</h5></div>
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
                    <form  method="POST" action="{{url('/insert-permission')}}">
                        @csrf
                        <div class="form-group">
                        <label for="">Tên quyền</label>
                        <input type="text" name="permission" class="form-control" value="{{old('permission')}}" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm quyền</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
