@extends('../layout')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>

    <li class="breadcrumb-item">
      <a href="{{url('the-loai/'.$truyen_breadcrumb->theloai->slug_theloai)}}"> 
        {{$truyen_breadcrumb->theloai->tentheloai}} 
      </a>
    </li>

    <li class="breadcrumb-item">
      <a href="{{url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}"> 
        {{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}} 
      </a>
    </li>

    <li class="breadcrumb-item active" aria-current="page"> {{$truyen_breadcrumb->tentruyen}} </li>
  </ol>
</nav>

<div class="row" style="font-size: 20px;">
  <div class="col-md-12">
    <h4> {{$chapter->truyen->tentruyen}} </h4>
    
    <p> Chương hiện tại: {{$chapter->tieude}} </p>

    {{-- Chia sẻ Facebook --}}
    <div class="fb-share-button" data-href="{{\URL::current()}}" data-layout="button_count" data-size="large">
      <a target="_blank" href="{{\URL::current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
          Chia sẻ
      </a>
    </div>

    
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
        <label for="exampleInputEmail1">Chọn chương</label>
        <p> <a class="btn btn-primary {{$chapter->id == $min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$previous_chapter)}}"> Tập trước </a> </p>
        <select name="select-chapter" class="custom-select select-chapter">
          @foreach($all_chapter as $key => $chap)
            <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}"> {{$chap->tieude}} </option>
          @endforeach
        </select>
        <p class="mt-4"> <a class="btn btn-primary {{$chapter->id == $max_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$next_chapter)}}"> Tập sau </a> </p>
      </div>
    </div>

    <div class="noidungchuong">
    {!! $chapter->noidung !!}
    
    </div>

    <div class="col-md-5">
      <div class="form-group">
        <label for="exampleInputEmail1">Chọn chương </label>
        <select name="select-chapter" class="custom-select select-chapter">
          @foreach($all_chapter as $key => $chap)
            <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}"> {{$chap->tieude}} </option>
          @endforeach
        </select>
      </div>
    </div>

      <h3> Lưu và chia sẻ truyện: </h3>
        <a><i class="fab fa-facebook-f"></i></a>
        <a><i class="fab fa-twitter"></i></a>

        {{-- Share facebook
        <div class="fb-share-button" data-href="{{$url_canonical}}" data-layout="button_count" data-size="large">
          <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}" class="fb-xfbml-parse-ignore">
            Chia sẻ
          </a>
        </div> --}}

        <div class="row">
          <div class="col-md-12">
            <div class="fb-like" data-href="{{\URL::current()}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
            <div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="20"> </div>
          </div>
        </div>
  </div>
</div>


@endsection
