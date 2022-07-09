<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">                      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" style="font-size: 20px;">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản lý Danh Mục
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a>
                <a class="dropdown-item" href="{{route('danhmuc.index')}}">Liệt kê danh mục</a>
              </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Quản lý Truyện
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('truyen.create')}}">Thêm truyện</a>
                  <a class="dropdown-item" href="{{route('truyen.index')}}">Liệt kê truyện</a>
                </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản lý Chapter
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('chapter.create')}}">Thêm Chapter</a>
                <a class="dropdown-item" href="{{route('chapter.index')}}">Liệt kê Chapter</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản lý Sách 
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('sach.create')}}">Thêm sách </a>
                <a class="dropdown-item" href="{{route('sach.index')}}">Liệt kê sách </a>
              </div>
            </li>
          </ul>
        </div>
    </nav>    


      {{-- <div class="row">
        <div class="col-md-12">
          <form autocomplete="off" class="form-inline my-2 my-lg-0" style="display: flex;" action="{{url('tim-kiem')}}" method="GET">
            @csrf
            <input class="form-control mr-sm-2" type="search" id="keywords" name="tukhoa" style ="height: 40px; margin-right: 10px" placeholder="Tìm kiếm tác giả, truyện,..." aria-label="Search">
            <div id="search_ajax"> </div>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style ="height: 40px; width: 120px;">Tìm kiếm</button>
          </form>
        </div>
      </div> --}}

</div>
        
    