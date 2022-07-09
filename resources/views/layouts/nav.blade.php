<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        {{-- <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> --}}

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('home')}}">Admin <span class="sr-only">(current)</span></a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li> --}}
            @role('admin')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Quản lý User
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @can('add category')
                  <a class="dropdown-item" href="{{route('user.create')}}">Thêm user</a>
                  @endcan
                  <a class="dropdown-item" href="{{route('user.index')}}">Hiển thị user</a>
                </div>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản lý danh mục
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @can('add category')
                <a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a>
                @endcan
                <a class="dropdown-item" href="{{route('danhmuc.index')}}">Hiển thị danh mục</a>
              </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Quản lý thể loại
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('theloai.create')}}">Thêm thể loại</a>
                  <a class="dropdown-item" href="{{route('theloai.index')}}">Hiển thị thể loại</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Quản lý sách
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('sach.create')}}">Thêm sách</a>
                  <a class="dropdown-item" href="{{route('sach.index')}}">Hiển thị sách</a>
                </div>
              </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Quản lý truyện
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('truyen.create')}}">Thêm truyện</a>
                  <a class="dropdown-item" href="{{route('truyen.index')}}">Hiển thị truyện</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Quản lý Chapter
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('chapter.create')}}">Thêm chapter</a>
                  <a class="dropdown-item" href="{{route('chapter.index')}}">Hiển thị chapter</a>
                </div>
              </li>
              @endrole
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
          </form>
        </div>
      </nav>
</div>
