<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Việt Tùng - Sách Truyện</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/truyensach.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" style="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <!-- Font Awesome -->
        <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" >
        <!-- Theme style -->
        <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    </head>
    <body>
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
          width="60">
      </div>

      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0" nonce="yEoXLn4L"></script>
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0" nonce="ms15Drie"></script>

        <div class="container-fluid" style="background: #00A143 !important">
            {{-- Menu --}}
          <div class="container-fluid ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light"  style="background: #00A143 !important">
                <a class="navbar-brand" href="#">
                  <img src="{{asset('public/logo.jpg/')}}" height="50"; width="100px"> 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{url('/')}}">
                        <i class="fas fa-gift"></i> Trang chủ <span class="sr-only">(current)</span>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="{{url('doc-truyen')}}">
                        <i class="fas fa-book"> </i> Đọc Truyện
                        <span class="sr-only"> </span>
                      </a>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-tags" aria-hidden="true"> </i> Danh mục truyện
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($danhmuc as $key =>$danh)
                          <a class="dropdown-item" href="{{url('danh-muc/'.$danh->slug_danhmuc)}}">{{$danh->tendanhmuc}}</a>
                        @endforeach
                      </div>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-tags" aria-hidden="true"> </i> Thể loại 
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($theloai as $key =>$the)
                        <a class="dropdown-item" href="{{url('the-loai/'.$the->slug_theloai)}}">{{$the->tentheloai}}</a>
                        @endforeach
                      </div>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="{{url('doc-sach')}}">
                        <i class="fas fa-book"> </i> Đọc Sách
                        <span class="sr-only"> </span>
                      </a>
                    </li>
                    @if (Auth::check())
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('theodoi') }}">
                          <i class="fa fa-heart"> </i> Yêu thích
                          <span class="sr-only"> </span>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('lichsu') }}">
                          <i class="fa fa-history"> </i> Lịch sử
                          <span class="sr-only"> </span>
                        </a>
                      </li>
                    @endif
                    @guest
                    @if (Route::has('login'))
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                      </li>
                    @endif

                    @if (Route::has('register'))
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
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
            </nav>
          </div>
        </div>


          <div class="container" style="min-height: 520px">
            <div class="row search-box">
              <div class="col-md-12">
                <form autocomplete="off" class="form-inline my-2 my-lg-0" style="display: flex; margin-left: 18%" action="{{url('tim-kiem')}}" method="GET">
                  @csrf
                  <input class="form-control mr-sm-2" type="search" id="keywords" name="tukhoa" style ="margin-right: 10px; width: 700px" placeholder="Tìm kiếm theo tên tác giả, truyện" aria-label="Search">
                  <div id="search_ajax"> </div>
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style ="width: 120px;">Tìm kiếm</button>
                </form>
              </div>
            </div>  

            {{-- Tìm kiếm nâng cao
            <div class="row">
              <div class="col-md-12">
                // autocomplete: Không lưu lại từ khóa ở thanh tìm kiếm sau khi tìm kiếm 
                <form autocomplete="off" class="form-inline my-2 my-lg-0" style="display: flex;" action="{{url('tim-kiem')}}" method="POST">
                  @csrf
                  <input class="form-control mr-sm-2" type="search" id="keywords" name="tukhoa" style ="height: 40px; margin-right: 10px" placeholder="Tìm kiếm tác giả, truyện,..." aria-label="Search">
                  <div id="search_ajax"> </div>
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style ="height: 40px; width: 120px;">Tìm kiếm</button>
                </form>
              </div>
            </div> --}}

            {{-- <select class="custom-select mr-sm-2" id="switch_color">
              <option value="xam"> Xám </option>
              <option value="den"> Đen </option>
            </select> --}}
                
            {{-- Slide --}}
            @yield('slide')
            {{-- Content --}}
            @yield('content')
        </div>

        
        

        {{-- Footer --}}
        <footer class="text-muted footer-web">
          <div class="container-fluid" style="height: 260px;">
            <div class="container" style="color: white">
              <div class="row">
                <div class="col-md-4">
                  <div class="footer-info">
                    <h3>Tùng - Sách Truyện</h3>
                    <p class="pb-3">
                      <em>
                        Website đọc sách, truyện online chất lượng hàng đầu Việt Nam, với nhiều thể loại truyện 
                        và sách được tác giả và dịch giả chọn lọc và đăng tải. Mang đến trải nghiệm tốt nhất cho 
                        người đọc.
                      </em>
                    </p>
                  </div>
                </div>

                <div class="col-md-4">
                  <p> 235 Hoàng Quốc Việt 
                    <br> Cổ Nhuế, Bắc Từ Liêm, Hà Nội, Việt Nam <br><br> 
                    <strong>Phone:</strong> <a href="tel:0975141928">0975141928</a> <br> 
                    <strong>Email:</strong> <a href = "mailto: tungnv2@fabbi.com.vn">tungnv2@fabbi.com.vn</a> <br>
                  </p>
                  <div class="social-links mt-3"> 
                    <center>
                      <a href="#" class="twitter icon-footer">   <i class="fab fa-twitter"></i> </a> 
                      <a href="#" class="facebook icon-footer">  <i class="fab fa-facebook"></i> </a> 
                      <a href="#" class="instagram icon-footer"> <i class="fab fa-instagram"></i> </a> 
                    </center>
                    
                  </div>
                </div>

                <div class="col-md-4">
                    <a href="#"> Chính sách bảo mật  </a> <br>
                    <a href="#"> Điều khoản sử dụng  </a>  <br>
                    <a href="#"> Quy định về nội dung </a> <br>
                    <a href="#"> Thỏa thuận quyền riêng tư  </a> 
                </div>
              </div>
        
            </div>
            
            <p class="float-right uptotop">
              <a href="#" style="font-size: 50px"> <i class="fas fa-arrow-alt-circle-up"></i> </a>
            </p>

          </div>
        </footer>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer> </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"> </script>
        <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"> </script>
        
        {{-- Xem sách nhanh --}}
        <script type="text/javascript">
          $(document).on('click','.xemsachnhanh',function(){
            var sach_id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
            
            $.ajax({
              url: '{{url('/xemsachnhanh')}}',
              method:"POST",
              dataType:"JSON",
              data:{sach_id:sach_id,_token:_token},
              success:function(data){
                $('#tieude_sach').html(data.tieude_sach);
                $('#noidung_sach').html(data.noidung_sach);
              }
            });
          });
        </script>


        {{-- Tìm kiếm nâng cao --}}
        <script type="text/javascript">
          $('#keywords').keyup(function(){
            var keywords = $(this).val();
              if( keywords != '' )
              {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                  url:"{{url('/timkiem-ajax')}}",
                  method:"POST",
                  data:{keywords:keywords, _token:_token},
                  success:function(data){
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                  }
                });
              }
              else {
                $('#search_ajax').fadeOut();
              }
          });

          $(document).on('click','.li_timkiem_ajax', function(){
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
          });
        </script>


        {{-- Màu nền trang web --}}
        <script type="text/javascript">
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
          $('.select-chapter').on('change',function(){
            var url = $(this).val();

            if(url){
              window.location = url;
            }
            return false;
          });

          current_chapter();

          function current_chapter(){
            var url = window.location.href;

            $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
          }
        </script>


        {{-- Comment Facebook --}}
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" 
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0" nonce="k73iEoIw"></script>
        <!-- AdminLTE App + jQuery-->
        <script src="{{ asset('dist/js/adminlte.js') }}"></script> 
        
        <script>
          const plus = document.querySelector(".plus"),
           minus = document.querySelector(".minus"),
           num = document.querySelector(".num");
           let a = 1;
           plus.addEventListener("click", ()=>{
             a++;
             a = (a < 10) ? "0" + a : a;
             num.innerText = a;
           });
        
           minus.addEventListener("click", ()=>{
             if(a > 1){
               a--;
               a = (a < 10) ? "0" + a : a;
               num.innerText = a;
             }
           });
         </script>
    </body>
</html>
