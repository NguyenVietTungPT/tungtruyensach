@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
      <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}"> {{$truyen->danhmuctruyen->tendanhmuc}} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{$truyen->tentruyen}} </li>
    </ol>
</nav>

<div class="row" style="font-size: 20px;">
    {{-- Trang chính --}}
  <div class="col-md-9">
    <div class="row">
      <div class="col-md-3"> 
        <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}">    
      </div>
      <div class="col-md-9">
        <ul class="infortruyen">
          {{-- Chia sẻ Facebook --}}
          <div class="fb-share-button" data-href="{{\URL::current()}}" data-layout="button_count" data-size="large">
            <a target="_blank" href="{{\URL::current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                Chia sẻ
            </a>
          </div>
            
          <li> Tên truyện: {{$truyen->tentruyen}} </li>
          <li> Tác giả: {{$truyen->tacgia}} </li>
          <li> 
            Danh mục truyện: 
            <a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}"> {{$truyen->danhmuctruyen->tendanhmuc}} </a>
          </li>
          <li> 
            Thể loại truyện: 
            <a href="{{url('the-loai/'.$truyen->theloai->slug_theloai)}}"> {{$truyen->theloai->tentheloai}} </a>
          </li>
          {{-- <li> Số chapter: 100 </li> --}}
          <li> Lượt xem: {{$truyen->views}} </li>
          @if (Auth::user())
            @if (!$favorite)
            <li> 
              <a href="{{url('yeu-thich/'.$truyen->slug_truyen."/".$chapter_moinhat->truyen_id)}}" class="btn mt-2 btn-xemtruyen btn-success mb-2"> 
                Theo dõi 
              </a> 
            </li>
            @else
            <li> 
              <a href="{{url('huy-bo/'.$truyen->slug_truyen."/".$chapter_moinhat->truyen_id)}}" class="btn mt-2 btn-xemtruyen btn-danger mb-2"> 
                Bỏ theo dõi 
              </a> 
            </li>
            @endif
          @endif
            @if($chapter_dau)
              <li> 
                <a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary btn-xemtruyen"> 
                  Đọc Online 
                </a> 
              </li>
              {{-- <li> <a href="{{url('xem-chapter/'.$chapter_dau->truyen->slug_truyen.'/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary"> Đọc Online </a> </li> --}}
              <li> 
                <a href="{{url('xem-chapter/'.$chapter_moinhat->slug_chapter)}}" class="btn btn-success mt-2 btn-xemtruyen"> 
                  Đọc chương mới nhất 
                </a> 
              </li>
            @else
              <li> <a class="btn btn-danger"> Hiện tại chưa có chương để đọc </a> </li>
            @endif
        </ul>
      </div>
    </div>

      <div class="col-md-12">
          <p> {{ $truyen->tomtat}} </p>
      </div>
      <hr>
      <h4> Mục Lục </h4>
      <ol class="mucluctruyen">
          @php
              $mucluc = count($chapter);
          @endphp
          @if($mucluc > 0)
              @foreach($chapter as $key => $chap)
                  <li> <a href="{{url('xem-chapter/'.$chap->slug_chapter)}}"> {{$chap->tieude}} </a> </li>
              @endforeach
          @else
              <h4> Mục lục đang cập nhật... </h4>
          @endif
      </ol>
      <div class="fb-like" data-href="{{\URL::current()}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
      <div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="20"> </div>

      <h4>Sách cùng danh mục</h4>
      <div class="row">
          @foreach($cungdanhmuc as $key => $value)
              <div class="col-md-3">
                  <div class="card mb-3 box-shadow same-category-book">
                      <a href="{{url('xem-truyen/'.$value->slug_truyen)}}"> 
                        <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
                        <div class="card-body">
                          <p class="same-category-book-name"> <b> {{$value->tentruyen}} </b> </p>         
                        </div>
                      </a>
                      <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group btn-read-book">
                              <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Xem truyện</a>
                              <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> {{$value->views}} </a>
                          </div>
                          </div>
                    </div>


                  </div>
        
          @endforeach
      </div>
  </div>


    {{-- Truyện nổi bật --}}
    <div class="col-md-3">
        <h3 class="card-header"> Truyện nổi bật</h3>
        @foreach ($truyennoibat as $key => $noibat)
            <div class="row mt-2 sidebarr">
                <div class="col-md-5">
                    <a href="{{url('xem-truyen/'.$noibat->slug_truyen)}}">
                        <img class="img img-responsive" width="100%" class="card-img-top" 
                        src="{{asset('public/uploads/truyen/'.$noibat->hinhanh)}}" alt="{{$noibat->tentruyen}}">
                    </a>
                </div>
                <div class="col-md-7" style="padding-left: 20px">
                    <a href="{{url('xem-truyen/'.$noibat->slug_truyen)}}">
                        <p> {{$noibat->tentruyen}} </p>
                    </a>
                    <p> <i class="fas fa-eye"></i> {{$noibat->views}} </p>
                </div>
            </div>
        @endforeach

        <h3 class="card-header"> Truyện xem nhiều </h3>
        @foreach ($truyenxemnhieu as $key => $xemnhieu)
            <div class="row mt-2  sidebarr">
                <div class="col-md-5">
                    <a href="{{url('xem-truyen/'.$xemnhieu->slug_truyen)}}">
                        <img class="img img-responsive" width="100%" class="card-img-top" 
                        src="{{asset('public/uploads/truyen/'.$xemnhieu->hinhanh)}}" alt="{{$xemnhieu->tentruyen}}">
                    </a>
                </div>
                <div class="col-md-7" style="padding-left: 20px">
                    <a href="{{url('xem-truyen/'.$xemnhieu->slug_truyen)}}">
                        <p> {{$xemnhieu->tentruyen}} </p>
                    </a>
                    <p> <i class="fas fa-eye"></i> {{$xemnhieu->views}} </p>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection