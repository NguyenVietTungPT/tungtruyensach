<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">                      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('home')}}">Admin <span class="sr-only">(current)</span></a>
            </li>
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
                  Quản lý Sách Truyện
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('truyen.create')}}">Thêm sách truyện</a>
                  <a class="dropdown-item" href="{{route('truyen.index')}}">Liệt kê sách truyện</a>
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

          </ul>
          <form class="form-inline my-2 my-lg-0" style="display: flex; ">
            <input class="form-control mr-sm-2" type="search" style ="height: 40px; margin-right: 10px" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style ="height: 40px; width: 120px;">Tìm kiếm</button>
          </form>
        </div>
    </nav>    
</div>