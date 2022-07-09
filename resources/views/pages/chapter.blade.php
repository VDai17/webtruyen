@extends('../layout')
{{-- @section('slide')
    @include('pages.slide')
@endsection --}}
@section('content')
{{-- Sách mới --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('the-loai/'.$truyen_breadcrumb->danhmuctruyen->slug)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$truyen_breadcrumb->tentruyen}}</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>{{$chapter->truyen->tentruyen}}</h4>
            <p>Chương hiện tại: {{$chapter->tieude}}</p>
            <div class="col-md-5">
                <style type="text/css">
                    .isDisabled {
                        color: currentColor;
                        pointer-events: none;
                        opacity: 0.5;
                        text-decoration: none;
                    }
                    </style>
                <div class="form-group">
                    <label for="">Chọn chương</label>
                    <p><a href="{{url('xem-chapter/'.$previous_chapter)}}" class="btn btn-primary {{$chapter->id==$min_id->id?'isDisabled':''}} ">Tập trước</a></p>
                    <select name="" id="select-chapter">
                        @foreach($all_chapter as $key=>$chap)
                            <option value="{{url('xem-chapter/'.$chap->slug)}}" {{$chap->tieude==$chapter->tieude?'selected':''}}>{{$chap->tieude}}</option>
                        @endforeach
                    </select>
                    <p><a href="{{url('xem-chapter/'.$next_chapter)}}" class="btn btn-primary {{$chapter->id==$max_id->id?'isDisabled':''}} ">Tập sau</a></p>
                </div>
            </div>
            {{-- <div class="tieudechapter">Chương 1: Oan hồn</div> --}}
            <div class="noidung">
                {!!$chapter->noidung!!}
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="">Chọn chương</label>
                    <p><a href="{{url('xem-chapter/'.$previous_chapter)}}" class="btn btn-primary {{$chapter->id==$min_id->id?'isDisabled':''}} ">Tập trước</a></p>
                    <select name="" id="select-chapter-last">
                        @foreach($all_chapter as $key=>$chap)
                            <option value="{{url('xem-chapter/'.$chap->slug)}}" {{$chap->tieude==$chapter->tieude?'selected':''}}>{{$chap->tieude}}</option>
                        @endforeach
                    </select>
                    <p><a href="{{url('xem-chapter/'.$next_chapter)}}" class="btn btn-primary {{$chapter->id==$max_id->id?'isDisabled':''}} ">Tập sau</a></p>
                </div>
            </div>
            <h4>Lưu và chia sẻ truyện:  </h4>
            <a href=""><i class="fa-brands fa-facebook-square"></i></a>
            <a href=""><i class="fa-brands fa-twitter-square"></i></a>
        </div>
    </div>
</div>
{{-- Sách xem nhiều --}}
{{-- <h3>SÁCH MỚI HAY XEM NHIỀU</h3>

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
</div> --}}
@endsection
