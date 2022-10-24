@extends('../layout')
@section('content')
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        @foreach($product as $key => $pro)
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-6">
              <img class="card-img-top" src="{{ asset('public/uploads/sach/' . $pro->pro_img) }}">
            </div>
            <div class="col-md-6">
              <style type="text/css">
                .infortruyen {
                  list-style: none;
                }
              </style>

              <ul class="infortruyen">
                
                <div class="fb-share-button" data-href="{{ \URL::current() }}" data-layout="button_count"
                  data-size="large">
                  <a target="_blank" href="{{ \URL::current() }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                    Chia sẻ
                  </a>
                </div>
                <li> Tên truyện:  </li>
                <li> Tác giả:  </li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
