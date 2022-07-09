@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')

{{-- Truyện --}}
<h3>TRUYỆN HAY CẬP NHẬT</h3>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      @foreach($truyen as $key => $value)
      <div class="col-md-3" style="margin-bottom: 25px;">
        <div class="card mb-3 box-shadow main-book">
          <a href="{{url('xem-truyen/'.$value->slug_truyen)}}">
            <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
            <div class="card-body">
            <h4> <b> {{$value->tentruyen}} </b></h4>
          </a>
            <p class="card-text">{{$value->tomtat}}</p>
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
    <a class="btn btn-success btn-read-all" href="xem-truyen">Xem tất cả</a>
  </div>
</div>





@endsection