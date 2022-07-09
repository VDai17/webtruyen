@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên user</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Vai trò(Role)</th>
                            <th scope="col">Quyền(Permissions)</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $u)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <th scope="row">{{$u->name}}</th>
                                    <th scope="row">{{$u->email}}</th>
                                    <th scope="row">{{$u->password}}</th>
                                    <th scope="row">
                                        @foreach ($u->roles as $key=>$role)
                                            <p class="badge badge-success">{{$role->name}}</p>
                                        @endforeach
                                    </th>
                                    <th scope="row">
                                        @foreach ($role->permissions as $key=>$per)
                                            <p class="badge badge-dark">{{$per->name}}</p>
                                        @endforeach</th>
                                    <th scope="row">
                                        <a class="btn btn-success" href="{{url('phan-quyen/'.$u->id)}}">Phân quyền</a>
                                        <a class="btn btn-warning" href="{{url('phan-vai-tro/'.$u->id)}}">Phân vai trò</a>
                                        <a class="btn btn-info" href="{{url('/impersonate/user/'.$u->id)}}">Chuyển quyền nhanh</a>
                                        <form onclick="return confirm('Bạm có chắc muốn xóa danh mục?');" action="{{route('user.destroy',[$u->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">Xóa</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
