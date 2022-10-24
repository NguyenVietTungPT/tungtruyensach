@extends('../layout')
{{-- @section('slide')
    @include('pages.slide')
@endsection --}}
@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
    </ol>
</nav>

<h3> Bạn tìm kiếm từ khóa: {{$tukhoa}} </h3>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
        @php
          $count = count($truyen);  
        @endphp
        
        @if ($count == 0)
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                <div class="card-body">
                    <h4> Không tìm thấy từ khóa {{$tukhoa}}... </h4>
                </div>
                </div>
            </div>
        @else
            @foreach($truyen as $key => $value)
                <div class="col-md-3">
                <div class="card mb-3 box-shadow main-book">
                    <a href="{{url('xem-truyen/'.$value->slug_truyen)}}"> 
                        <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
                        <div class="card-body">
                        <p class="main-book-name"> <b> {{$value->tentruyen}} </b> </p>
                    </a>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group btn-product">
                            <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                            <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> {{$value->views}} </a>
                        </div>
                        <small class="text-muted"></small>
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