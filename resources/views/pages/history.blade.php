@extends('../layout')

@section('content')

{{-- Truyện --}}
<h3>LỊCH SỬ ĐỌC TRUYỆN</h3>
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
            <p class="fa fa-history">  <a href="{{url('xem-chapter/'.$value->chapter)}}" class="font-weight-light"><i> Đọc tiếp </i> {{ $value->tieude }}</a>
            </p>
          </div>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group btn-read-book">
                <a href="{{url('xoa-lich-su/'.$value->id."/".$value->user_id)}}" class="btn btn-sm btn-outline-secondary">Xóa</a>
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
