@extends('../layout')

@section('content')

{{-- Truyện --}}
<h3>TRUYỆN ĐANG THEO DÕI</h3>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      @foreach($truyen as $key => $value)
      <div class="col-md-3" style="margin-bottom: 25px;">
        <div class="card mb-3 box-shadow main-book">
          <a href="{{url('xem-truyen/'.$value->slug_truyen)}}">
            <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
            <div class="card-body">
            <p class="main-book-name"> <b> {{$value->tentruyen}} </b></p>
          </a>
          <div>
            @if ($value->chapter)
            <p class="fa fa-eye">  <a href="{{url('xem-chapter/'.$value->chapter)}}" class="font-weight-light"><i> (chương đang đọc) </i></a>
            </p>
             
            @else
              <p class="font-weight-light">Bạn vẫn chưa đọc chương nào cả</p>
            @endif
            <a href="{{url('huy-bo/'.$value->slug_truyen."/".$value->id)}}">
              <p class="fa fa-ban" style="color: red"> <b> Bỏ theo dõi</b></p>
            </a>
          </div>

            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group btn-read-book">
                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> {{$value->views}} </a>
              </div>
              <small class="text-muted"> </small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
