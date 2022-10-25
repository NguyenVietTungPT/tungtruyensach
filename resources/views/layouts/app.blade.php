<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Tùng - Sách Truyện - Admin </title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/truyensach.css') }}" rel="stylesheet"> 

  <!-- Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Font Awesome -->
  <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" >
  <!-- Theme style -->
  <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
</head>

<body>
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container-fluid" style="padding-left: 250px;">
        <a class="navbar-brand" href="{{ url('/home') }}"> Admin Sách Truyện </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto"> </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
              @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
              @endif

              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    
    <main class="py-4">
      <div>
        <div class="hold-transition sidebar-mini layout-fixed">
          <div class="wrapper" style="width: 250px; display: flex; position: fixed; left: 0;
          bottom: 0; top: 0;"> 
              
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
                        <i class="nav-icon fas fa-book"></i>
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
                        <i class="nav-icon far fa-copy"></i>
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
                        <i class="nav-icon fas fa-book"></i>
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

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-supple"></i>
                        <p>Quản lý Nhà Cung Cấp <i class="fas fa-angle-left right"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{route('supplieres.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i> <p>Thêm Nhà Cung Cấp</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{route('supplieres.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i> <p>Liệt kê Nhà Cung Cấp</p>
                          </a>
                        </li>
                      </ul>
                    </li> 

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>Quản lý Mặt Hàng <i class="fas fa-angle-left right"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{route('products.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i> <p>Thêm Mặt Hàng</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{route('products.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i> <p>Liệt kê Mặt Hàng</p>
                          </a>
                        </li>
                      </ul>
                    </li> 

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>Quản lý Đơn Đặt Hàng <i class="fas fa-angle-left right"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i> <p>Thêm Đơn Đặt Hàng</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i> <p>Liệt kê Đơn Đặt Hàng</p>
                          </a>
                        </li>
                      </ul>
                    </li> 

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>Quản lý Bài Viết <i class="fas fa-angle-left right"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i> <p>Thêm Bài Viết</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i> <p>Liệt kê Bài Viết</p>
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
      </div>
      @yield('content')
    </main>
  </div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
  <script type="text/javascript">
    CKEDITOR.replace('noidung_chapter');
    CKEDITOR.replace('ckeditor_truyen');
    CKEDITOR.replace('ckeditor_sach');
  </script>

  {{-- Slug --}}
  <script type="text/javascript">
    function ChangeToSlug() {
      var slug;

      //Lấy text từ thẻ input title 
      slug = document.getElementById("slug").value;
      slug = slug.toLowerCase();
      //Đổi ký tự có dấu thành không dấu
      slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
      slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
      slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
      slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
      slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
      slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
      slug = slug.replace(/đ/gi, 'd');
      //Xóa các ký tự đặt biệt
      slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
      //Đổi khoảng trắng thành ký tự gạch ngang
      slug = slug.replace(/ /gi, "-");
      //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
      //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
      slug = slug.replace(/\-\-\-\-\-/gi, '-');
      slug = slug.replace(/\-\-\-\-/gi, '-');
      slug = slug.replace(/\-\-\-/gi, '-');
      slug = slug.replace(/\-\-/gi, '-');
      //Xóa các ký tự gạch ngang ở đầu và cuối
      slug = '@' + slug + '@';
      slug = slug.replace(/\@\-|\-\@|\@/gi, '');
      //In slug ra textbox có id “slug”
      document.getElementById('convert_slug').value = slug;
    }
  </script>

  {{-- Truyện nổi bật --}}
  <script type="text/javascript">
    $('.truyennoibat').change(function() {
      const truyennoibat = $(this).val();
      const truyen_id = $(this).data('truyen_id');
      var _token = $('input[name="_token"]').val();

      if (truyennoibat == 0) {
        var thongbao = 'Thay đổi truyện mới thành công!';
      } else if (truyennoibat == 1) {
        var thongbao = 'Thay đổi truyện đọc nhiều thành công!';
      } else {
        var thongbao = 'Thay đổi truyện nổi bật thành công!';
      }

      $.ajax({
        url: "{{ url('/truyennoibat') }}",
        method: "POST",
        data: {
          truyennoibat: truyennoibat,
          truyen_id: truyen_id,
          _token: _token
        },
        succcess: function(data) {
          $('#thongbao').html('<span class="text text-alert">' + thongbao + '</span>');
          // alert(thongbao);
        }
      });
    })
  </script>
  {{-- <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script> --}}

  <!-- AdminLTE App + jQuery-->
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>
  <script>//<![CDATA[
    $('input.input-qty').each(function() {
      var $this = $(this),
        qty = $this.parent().find('.is-form'),
        min = Number($this.attr('min')),
        max = Number($this.attr('max'))
      if (min == 0) {
        var d = 0
      } else d = min
      $(qty).on('click', function() {
        if ($(this).hasClass('minus')) {
          if (d > min) d += -1
        } else if ($(this).hasClass('plus')) {
          var x = Number($this.val()) + 1
          if (x <= max) d += 1
        }
        $this.attr('value', d).val(d)
      })
    })
    //]]></script> 
</body>
</html>
