@extends('layout')
@section('content')
    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
    </nav> --}}

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('the-loai/'.$truyen->danhmuctruyen->slug)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-9">
            <h4>THÔNG TIN TRUYỆN</h4>
            <div class="row">
                <div class="col-md-3">
                    <img class="card-img-top" style="width:100%;"src="{{asset('public/uploads/truyen/'.$truyen->image)}}" style="width:140px;">
                </div>
                <div class="col-md-9">
                    <h6 style="justify-content: center;">{{$truyen->tentruyen}}</h6>
                    <style>
                        .infotruyen {
                            list-style: none;
                        }
                    </style>
                    <ul class="infotruyen">
                        {{-- Lấy biến wishlist--}}
                        <input type="hidden" value="{{$truyen->tentruyen}}" class="wishlist_tentruyen">
                        <input type="hidden" value="{{\URL::current()}}" class="wishlist_url">
                        <input type="hidden" value="{{$truyen->id}}" class="wishlist_id">
                        <li>Tác giả:{{$truyen->tacgia}}</li>
                        <li>Danh mục:<a href="{{url('the-loai/'.$truyen->danhmuctruyen->slug)}}">
                            {{$truyen->danhmuctruyen->tendanhmuc}}
                        </a></li>

                        <li>Thể loại:<a href="{{url('the-loai/'.$truyen->theloaitruyen->slug)}}">
                            {{$truyen->theloaitruyen->tentheloai}}
                        </a></li>
                        <li>Ngày đăng: {{$truyen->create_at}}</li>
                        <li>Số chapter:</li>
                        <li>Số lượt xem:</li>
                        <a href="">Xem mục lục</a>
                        @if (isset($chapter_dau))
                            <li><a href="{{url('xem-chapter/'.$chapter_dau->slug)}}" class="btn btn-primary">Đọc ngay</a></li>
                        @endif
                        <button class="btn btn-danger btn-thichtruyen">
                            <i class="fa-solid fa-heart" aria-hidden="true"></i>Thích truyện
                        </button>
                        @if (isset($chapter_moinhat))
                            <li><a href="{{url('xem-chapter/'.$chapter_moinhat->slug)}}" class="btn btn-primary">Chapter mới nhất</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <h3>Giới thiệu:</h3>
                <span>{{$truyen->tomtat}}</span>
            </div>
            {{-- <h3>Tags:</h3>
            @php
                $tukhoa = explode(',', $truyen->tags);
            @endphp
            <div class="tag-cloud" style="display: inline-block;">
                <ul>
                    @foreach ($tukhoa as $key=>$tu)
                    <li><a href="{{url('tags/'.\Str::slug($tu))}}"><span></span>{{$tu}}</a></li>
                    @endforeach
                </ul>
            </div> --}}
            {{-- <div class="fb-comments" data-href="http://localhost/laravel/webtruyen/xem-truyen/the-gioi-hoan-my" data-width="" data-numposts="10"></div> --}}
            <h3>Mục lục truyện</h3>
            <ul>
            @if(count($chapter)>0)
                @foreach($chapter as $key=>$chap)
                    <li><a href="{{url('xem-chapter/'.$chap->slug)}}">{{$chap->tieude}}</a></li>
                @endforeach
            @else
                <li>Đang cập nhật...</li>
            @endif
            </ul>


            <h3>Sách cùng danh mục</h3>
            <div class="row">
                @foreach($cungdanhmuc as $key => $tr)
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <a href="{{route('xem-truyen', $tr->slug)}}">
                                <img style="width:100%;"src="{{asset('public/uploads/truyen/'.$tr->image)}}" style="width:140px;">
                                <div class="card-body">
                                <h5>{{$tr->tentruyen}}</h5>
                            </a>
                                {{-- <p class="card-text">{{$tr->tomtat}}</p> --}}
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
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <h3>Truyện mới</h3>
            @foreach($truyenmoi as $moi)
                <div class="row mt-2">
                    <div class="col-md-5"><img width="100%" class="img img-responsive card-img-top" src="{{asset('public/uploads/truyen/'.$moi->image)}}" alt="{{$moi->tentruyen}}"></div>
                    <div clasa="col-md-7 sidebar">
                        <a href="{{url('xem-truyen/'.$moi->slug)}}">
                            <p style="color:#666;">{{$moi->tentruyen}}</p>
                        </a>
                    </div>
                </div>
            @endforeach
            <h3>Truyện xem nhiều</h3>
            @foreach($truyenxemnhieu as $xemnhieu)
                <div class="row mt-2">
                    <div class="col-md-5"><img width="100%" class="img img-responsive card-img-top" src="{{asset('public/uploads/truyen/'.$xemnhieu->image)}}" alt="{{$xemnhieu->tentruyen}}"></div>
                    <div clasa="col-md-7 sidebar">
                        <a href="{{url('xem-truyen/'.$xemnhieu->slug)}}">
                            <p style="color:#666;">{{$xemnhieu->tentruyen}}</p>
                        </a>
                    </div>
                </div>
            @endforeach
            <h3>Sách hay nổi bật</h3>
            @foreach($truyennoibat as $noibat)
                <div class="row mt-2">
                    <div class="col-md-5"><img width="100%" class="img img-responsive card-img-top" src="{{asset('public/uploads/truyen/'.$noibat->image)}}" alt="{{$noibat->tentruyen}}"></div>
                    <div clasa="col-md-7 sidebar">
                        <a href="{{url('xem-truyen/'.$noibat->slug)}}">
                            <p style="color:#666;">{{$noibat->tentruyen}}</p>
                        </a>
                    </div>
                </div>
            @endforeach

            <h3 class="tentruyen_truyen">Sách yêu thích</h3>
            <div id="yeuthich"></div>
        </div>
    </div>

    {{-- <style>
        /* body {
			background: #fafafa url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAIAAAACUFjqAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkE0NTM1NzNEQ0RCMTExRTFCNEY4OTI4MTU2ODk0RUMwIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkE0NTM1NzNFQ0RCMTExRTFCNEY4OTI4MTU2ODk0RUMwIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QTQ1MzU3M0JDREIxMTFFMUI0Rjg5MjgxNTY4OTRFQzAiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QTQ1MzU3M0NDREIxMTFFMUI0Rjg5MjgxNTY4OTRFQzAiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5YIglRAAAAN0lEQVR42mL4+vXrf9yAAYhxqQCKM8BZmHJQ3Zgq4GwGTB3I6hiwmoldGp9ufHbjczkefwMEGADDCyjIWuJVaQAAAABJRU5ErkJggg==');
		} */
		.tag-cloud {
			width: 332px;
			margin: auto;
		}
		.tag-cloud ul {
			list-style-type: none;
			padding: 0;
		}
		.tag-cloud li {
			margin: 5px 5px 5px 10px;
			float: left;
		}
		.tag-cloud a {
			display: inline-block;
			position: relative;
			color: #996633;
			text-shadow: 0 1px 0 rgba(255,255,255, 0.4);
			text-decoration: none;
			text-align: center;
			padding: 4px 9px 6px 6px;
			font: bold 11px Tahoma, sans-serif;
			border-radius: 3px;
			border: 1px solid #cc912d;

			-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.12);
			box-shadow: 0 1px 2px rgba(0,0,0,0.2),
						0 1px 0px rgba(255,255,255,0.4) inset;

			background-image: -webkit-linear-gradient(top, rgba(254,218,113,1) 0%,rgba(254,205,97,1) 60%,rgba(254,188,74,1) 100%);
			background-image: -moz-linear-gradient(top, rgba(254,218,113,1) 0%,rgba(254,205,97,1) 60%,rgba(254,188,74,1) 100%);
			background-image: -o-linear-gradient(top, rgba(254,218,113,1) 0%,rgba(254,205,97,1) 60%,rgba(254,188,74,1) 100%);
			background-image: -ms-linear-gradient(top, rgba(254,218,113,1) 0%,rgba(254,205,97,1) 60%,rgba(254,188,74,1) 100%);
			background-image: linear-gradient(top, rgba(254,218,113,1) 0%,rgba(254,205,97,1) 60%,rgba(254,188,74,1) 100%);
		}
		.tag-cloud a:hover {
			color: #492a0b;
		}
		.tag-cloud a:after {
			content: '';
			position: absolute;
			height: 50%;
			width: 15px;
			border-left: 1px solid #cc912d;

			background-image: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(254,218,113,1) 1%,rgba(254,205,97,1) 100%);
			background-image: -moz-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(254,218,113,1) 1%,rgba(254,205,97,1) 100%);
			background-image: -o-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(254,218,113,1) 1%,rgba(254,205,97,1) 100%);
			background-image: -ms-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(254,218,113,1) 1%,rgba(254,205,97,1) 100%);
			background-image: linear-gradient(top, rgba(255,255,255,0) 0%,rgba(254,218,113,1) 1%,rgba(254,205,97,1) 100%);
			left: -5px;
			top: 1px;

			-webkit-transform: skewX(-35deg);
			-moz-transform: skewX(-35deg);
			-o-transform: skewX(-35deg);
			-ms-transform: skewX(-35deg);
			transform: skewX(-35deg);
		}

		.tag-cloud a:before {
			content: '';
			position: absolute;
			height: 48%;
			width: 15px;
			border-left: 1px solid #cc912d;
			bottom: 1px;
			left: -5px;

			-webkit-transform: skewX(35deg);
			-moz-transform: skewX(35deg);
			-o-transform: skewX(35deg);
			-ms-transform: skewX(35deg);
			transform: skewX(35deg);

			background-image: -webkit-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(254,205,97,1) 10%,rgba(254,188,74,1) 100%);
			background-image: -moz-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(254,205,97,1) 10%,rgba(254,188,74,1) 100%);
			background-image: -o-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(254,205,97,1) 10%,rgba(254,188,74,1) 100%);
			background-image: -ms-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(254,205,97,1) 10%,rgba(254,188,74,1) 100%);
			background-image: linear-gradient(top, rgba(240,240,240,1) 0%,rgba(254,205,97,1) 10%,rgba(254,188,74,1) 100%);

			-webkit-box-shadow: -2px 1px 2px rgba(100,100,100,0.1);
			box-shadow: -2px 1px 2px rgba(100,100,100,0.1);
		}
		.tag-cloud a span {
			background-color: #FFFFFF;
		    border: 1px solid #CC912D;
		    border-radius: 5px 5px 5px 5px;
		    box-shadow: 0 1px 1px rgba(255, 255, 255, 0.4),
		    			0 1px 1px rgba(0, 0, 0, 0.2) inset;
		    display: inline-block;
		    height: 5px;
		    left: -5px;
		    position: relative;
		    top: -1px;
		    vertical-align: middle;
		    width: 5px;
		    z-index: 10;
		}
    </style> --}}
@endsection
