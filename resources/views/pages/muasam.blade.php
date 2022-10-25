@extends('../layout')
@section('content')

{{-- Sách mới --}}
<h3>Mua Hàng</h3>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      @foreach($product as $key => $pro)
      <div class="col-md-3">
        <div class="card mb-3 box-shadow main-product">
          <a href="{{url('product-detail/'.$pro->pro_slug)}}"> 
            <img class="card-img-top" src="{{asset('public/uploads/sach/'.$pro->pro_img)}}">
            <div class="card-body">
              <p class="main-product-name"> <b> {{$pro->pro_name}} </b> </p>
              <p class="main-product-price">{{$pro->pro_price}}.000 <sup><u>vnđ</u></sup></p>           
            </div>
          </a>
        </div>  
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
