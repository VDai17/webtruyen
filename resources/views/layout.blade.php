<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sách truyện</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .switch_color {
                background: #181818;
                color: #fff;
            }
            .switch_color_light {
                background: #181818 !important;
                color: #000;
            }
            .noidung_color {
                /* color: #000; */
                /* color: #fff; */
            }
        </style>
    </head>
    <body>
        <div class="container">
            {{-- Menu --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{url('/')}}">Sách truyện</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Danh mục truyện
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($danhmuc as $key=>$danh)
                            <a class="dropdown-item" href="{{route('danh-muc', $danh->slug)}}">{{$danh->tendanhmuc}}</a>
                        @endforeach
                    </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/doc-sach')}}">
                            Sách
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thể loại truyện
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($theloai as $key=>$the)
                                <a class="dropdown-item" href="{{route('the-loai', $the->slug)}}">{{$the->tentheloai}}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
                {{-- <form class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="GET" >
                    @csrf
                    <input class="form-control mr-sm-2" name="tukhoa" type="search" placeholder="Tìm kiếm truyện, tác giả..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form> --}}
                <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="GET" >
                    @csrf
                    <input class="form-control mr-sm-2" id="keywords" name="tukhoa" type="search" placeholder="Tìm kiếm truyện, tác giả..." aria-label="Search">
                    <div id="search-ajax"></div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    <select class="custom-select mr-sm-2" name="" id="switch_color">
                        <option value="xam">Xám</option>
                        <option value="den">Đen</option>
                    </select>
                </form>
                </div>
            </nav>
            {{-- Slide --}}
            @yield('slide')
            {{-- Content --}}
            @yield('content')
            {{-- footer --}}
            <footer class="text-muted">
                <div class="container">
                  <p class="float-right">
                    <a href="#">Back to top</a>
                  </p>
                  <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
                  <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
                </div>
            </footer>
        </div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62952dbf7d558eb0"></script>

        <script src="{{asset('js/app.js')}}" defer></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        {{-- <script src="{{asset('js/owl.carousel.js')}}" defer></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- <script>
            $('#keywords').keyup(function() {
                var keywords = $(this).val();
                // alert(keywords);
                if(keywords != '') {
                    var _token = $('input[name="_token"]').val();
                    // alert(_token);
                    $.ajax({
                        url:"{{url('/timkiem-ajax')}}",
                        method:"POST",
                        data:{keywords:keywords, _token:_token},
                        success:function(data)
                            {
                                $('#search-ajax').fadeIn();
                                $('#search-ajax').html(data);
                            }
                    });
                }else{
                    $('#search-ajax').fadeOut();
                }
            })
        </script> --}}
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0" nonce="vTmobeqO"></script>
        <script>
            $(document).on('click', '.xemsachnhanh', function() {
                var sach_id = $(this).attr('id');
                var _token =  $('input[name="_token"]').val();
                // alert(sach_id);
                $.ajax({
                    url:'{{url('/xemsachnhanh')}}',
                    method:"POST",
                    dataType: "JSON",
                    data:{sach_id:sach_id, _token:_token},
                    success:function(data) {
                        $('#tieude_sach').html(data.tieude_sach);
                        $('#noidung_sach').html(data.noidung_sach);
                    }
                });
            })
        </script>
        <script type="text/javascript">
            show_wishlist();

            function show_wishlist() {
                if(localStorage.getItem('wishlist_truyen')!=null) {
                    var data = JSON.parse(localStorage.getItem('wishlist_truyen'));
                    data.reverse();
                    for(i=0; i<data.length; i++) {
                        var title = data[i].title;
                        var img = data[i].img;
                        var id = data[i].id;
                        var url = data[i].url;
                        $('#yeuthich').append(`
                            <div class="row mt-2">
                                <div class="col-md-5"><img class="img img-responsive card-img-top" src="`+img+`" alt="`+title+`"></div>
                                <div clasa="col-md-7 sidebar">
                                    <a href="`+url+`">
                                        <p style="color:#666;">`+title+`</p>
                                    </a>
                                </div>
                            </div>
                        `);

                    }
                }
            }

            $('.btn-thichtruyen').click(function() {
                $('.fa-solid.fa-heart').css('color', '#000');
                const id = $('.wishlist_id').val();
                const title = $('.wishlist_title').val();
                const img = $('.card-img-top').attr('src');
                const url = $('.wishlist_url').val();
                // alert(id);
                // alert(title);
                // alert(img);
                // alert(url);
                const item = {
                    'id' : id,
                    'title' : title,
                    'img' : img,
                    'url' : url
                }
                if(localStorage.getItem('wishlist_truyen')==null) {
                    localStorage.setItem('wishlist_truyen', '[]');
                }
                var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
                var matches = $.grep(old_data, function(obj) {
                    return obj.id == id;
                })
                if(matches.length){
                    alert('Truyện đã có trong danh sách yêu thích');
                }else {
                    if(old_data.length<=10) {
                        old_data.push(item);
                    }else {
                        alert('Đã đạt tới giới hạn lưu!');
                    }
                    $('#yeuthich').append(`
                        <div class="row mt-2">
                            <div class="col-md-5"><img class="img img-responsive card-img-top" src="`+img+`" alt="`+title+`"></div>
                            <div clasa="col-md-7 sidebar">
                                <a href="`+url+`">
                                    <p style="color:#666;">`+title+`</p>
                                </a>
                            </div>
                        </div>
                    `);
                    localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
                    alert('Đã lưu vào danh sách truyện yêu thích')
                }
                localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
            })
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                if(localStorage.getItem('switch_color')!==null) {
                    const data = localStorage.getItem('switch_color');
                    const data_obj = JSON.parse(data);
                    $(document.body).addClass(data_obj.class1);
                    $('album').addClass(data_obj.class2);
                    $('.card-body').addClass(data_obj.class);
                    $('ul.mucluctruyen > li > a').css('color', '#fff');
                    $("select option[value='den']").attr("selected", "selected");
                }

                $('#switch_color').on('change', function() {
                    $(document.body).toggleClass('switch_color');
                    $('.album').toggleClass('switch_color_light');
                    $('.card-body').toggleClass('switch_color');
                    $('.noidung').addClass('noidung_color');
                    $('ul.mucluctruyen > li > a').css('color', '#fff');
                    $('.slide > a').css('color', ' #fff');

                    if ($(this).val()== 'den') {
                        var item = {
                            'class1' : 'switch_color',
                            'class2' : 'switch_color_light',
                        }
                        localStorage.setItem('switch_color', JSON.stringify(item));
                    }else if($(this).val()== 'xam') {
                        localStorage.removeItem('switch_color');
                        $('ul.mucluctruyen > li > a').css('color', '#000');
                    }
                });
            });
        </script>
        <script>
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })
        </script>
        <script type="text/javascript">
            $('#select-chapter').on('change', function() {
                var url = $(this).val();
                // alert(url);
                if(url) {
                    window.location = url;
                }
                return false;
            })
        </script>
        <script type="text/javascript">
            $('#select-chapter-last').on('change', function() {
                var url = $(this).val();
                // alert(url);
                if(url) {
                    window.location = url;
                }
                return false;
            })
        </script>
    </body>
</html>
