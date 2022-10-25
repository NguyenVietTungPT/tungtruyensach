<div class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    {{-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> --}}
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->   
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>Quản lý Danh Mục Truyện <i class="right fas fa-angle-left"></i> </p>
              </a>
              
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('danhmuc.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"> </i> <p>Thêm danh mục</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('danhmuc.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i> <p>Liệt kê danh mục</p>
                  </a>
                </li>
              </ul>
            </li>
      
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>Quản lý Thể Loại Truyện <i class="fas fa-angle-left right"></i> </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('theloai.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i> <p>Thêm thể loại</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('theloai.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i> <p>Liệt kê thể loại</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Quản lý Truyện <i class="fas fa-angle-left right"></i> </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('truyen.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i> <p>Thêm truyện</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('truyen.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i> <p>Liệt kê truyện</p>
                  </a>
                </li>
              </ul>
            </li> 

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Quản lý Chapter <i class="fas fa-angle-left right"></i> </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('chapter.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i> <p>Thêm Chapter</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('chapter.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i> <p>Liệt kê Chapter</p>
                  </a>
                </li>
              </ul>
            </li> 

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Quản lý Sách <i class="fas fa-angle-left right"></i> </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('sach.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i> <p>Thêm sách</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('sach.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i> <p>Liệt kê sách</p>
                  </a>
                </li>
              </ul>
            </li> 

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
</div>