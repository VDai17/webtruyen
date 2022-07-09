@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')
{{-- Sách mới --}}
</div>
<h3>SÁCH MỚI CẬP NHẬT</h3>

<div class="album py-5 bg-light">
<div class="container">
    <div class="row">
        @foreach($sach as $key => $sc)
        <div class="col-md-3">
            <div class="card mb-3 box-shadow" style="height: 500px;">
                {{-- <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_180fd61b933%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_180fd61b933%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71249771118164%22%20y%3D%22120.18000011444092%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true"> --}}
                <a href="{{route('xem-sach', $sc->slug_sach)}}">
                <img style="width:100%;height: 360px;"src="{{asset('public/uploads/sach/'.$sc->hinhsach)}}">
                <div class="card-body">
                        <h5>{{$sc->tensach}}</h5>
                    </a>
                    {{-- <p class="card-text">{{$tr->tomtat}}</p> --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        {{-- <a href="{{route('xem-sach', $sc->slug_sach)}}" type="button" class="btn btn-sm btn-outline-secondary">View</a> --}}
                        <!-- Button trigger modal -->
                        <form action="">

                            <button type="button" id="{{$sc->id}}" class="btn btn-primary xemsachnhanh" data-toggle="modal" data-target="#exampleModalLong">
                                Xem nhanh sách
                            </button>
                            @csrf
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div id="tieude_sach"></div>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="noidung_sach"></div>

                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{$sach->onEachSide(1)->links('pagination::bootstrap-4')}}
</div>
</div>

{{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($danhmuc as $key=>$tab_danhmuc)
    <li class="nav-item">
      <a class="nav-link" id="home-tab" data-toggle="tab" href="#{{$tab_danhmuc->slug}}" role="tab" aria-controls="home" aria-selected="true">{{$tab_danhmuc->tendanhmuc}}</a>
    </li>
    @endforeach
  </ul>
  <div class="tab-content" id="myTabContent">
    @foreach($danhmuc as $key=>$tab_danhmuc)
    <div class="tab-pane fade" id="{{$tab_danhmuc->slug}}" role="tabpanel" aria-labelledby="home-tab">{{$tab_danhmuc->tendanhmuc}}</div>
    @endforeach
  </div> --}}

{{-- Sách xem nhiều --}}
<h3>SÁCH MỚI HAY XEM NHIỀU</h3>

<div class="album py-5 bg-light">
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_180fd61b933%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_180fd61b933%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71249771118164%22%20y%3D%22120.18000011444092%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
                </div>
            </div>
        </div>

    </div>
    <a href="" class="btn btn-primary">Xem tất cả</a>
</div>
</div>
@endsection
