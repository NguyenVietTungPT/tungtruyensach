@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')

{{-- Sách mới --}}
<h3>SÁCH HAY CẬP NHẬT</h3>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      @foreach($sach as $key => $value)
      <div class="col-md-3">
        <div class="card mb-3 box-shadow">
          <a href="{{url('xem-sach/'.$value->slug_sach)}}">
          <img class="card-img-top" src="{{asset('public/uploads/sach/'.$value->hinhanh)}}">
          <div class="card-body">
            <h5>{{$value->tensach}}</h5>
            <p class="card-text">{{$value->tomtat}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="#" class="btn btn-sm btn-outline-secondary">Xem Sách</a>
                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 4446 </a>
              </div>
              <small class="text-muted">9 mins ago</small>
            </div>
          </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
    <a class="btn btn-success" href="">Xem tất cả</a>
  </div>
</div>



@endsection