@extends('../layout')
{{-- @section('slide')
    @include('pages.slide')
@endsection --}}
@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$tendanhmuc}}</li>
    </ol>
</nav>

<h3>{{$tendanhmuc}}</h3>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row" style="font-size: 20px;">
        @php
          $count = count($truyen);  
        @endphp
        
        @if ($count == 0)
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                <div class="card-body">
                    <h4> Truyện đang cập nhật... </h4>
                </div>
                </div>
            </div>
        @else
            @foreach($truyen as $key => $value)
                <div class="col-md-3" style="margin-bottom: 25px;">
                <div class="card mb-3 box-shadow main-book">
                    <a href="{{url('xem-truyen/'.$value->slug_truyen)}}">
                        <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
                        <div class="card-body">
                        <h4> <b> {{$value->tentruyen}} </b> </h4>
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
        @endif
    </div>
    
  </div>
</div>


@endsection
