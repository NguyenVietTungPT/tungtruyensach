@extends('../layout')
@section('content')
  <form class="needs-validation" novalidate method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf  
    <div class="form-row">
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row"> 
            <div class="col-md-5" style="display:flex">
              <img class="card-img-top" src="{{ asset('public/uploads/sach/' . $product->pro_img) }}">
            </div>
            <div class="col-md-5">
              <ul class="inforproduct">
                <div class="fb-share-button" data-href="{{ \URL::current() }}" data-layout="button_count"
                  data-size="large">
                  <a target="_blank" href="{{ \URL::current() }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                    Chia sẻ
                  </a>
                </div>
                <li> <p class="inforproduct-name"> <b>{{$product->pro_name}}</b></p> </li>
                <li> Lượt xem: {{$product->pro_view}}  </li>
                <li class="inforproduct-price">
                  {{$product->pro_price}}.000 <sup><u>vnđ</u></sup>
                </li>
                <li style="display: flex">
                  Số lượng: 
                  <div class="wrapperrr">
                    <span class="minus">-</span>
                    <span class="num">01</span>
                    <span class="plus">+</span>
                  </div>
                </li>
                <li>
                  <div class="col-md-12 mb-12">
                    <label for="validationCustom03">Địa chỉ nhận hàng:</label>
                    <input type="text" class="form-control" id="validationCustom03" name="pro_name" required>
                    <div class="invalid-feedback"> Hãy nhập địa chỉ nhận hàng.</div>
                  </div>
                  <button class="btn-chonmua btn btn-danger" type="submit">Chọn Mua</button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
  </form>
  <div class="container detail-description">
    <div class="row">
      <h3><b>Mô Tả Sản Phẩm:</b></h3>
      <p>{{$product->pro_description}}</p>
    </div>
  </div>
@endsection

