@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')


{{-- Sách --}}
<h3>SÁCH HAY CẬP NHẬT</h3>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      @foreach($sach as $key => $value2)
      <div class="col-md-3" style="margin-bottom: 25px;">
        <div class="card mb-3 box-shadow main-book">
          <a href="{{url('xem-sach/'.$value2->slug_sach)}}">
            <img class="card-img-top" src="{{asset('public/uploads/sach/'.$value2->hinhanh)}}">
            <div class="card-body">
            <h4> <b> {{$value2->tensach}} </b></h4>
          </a>
            <p class="card-text">{{$value2->tomtat}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group" style="margin: 0 auto;">


                <form>
                  @csrf
                  <!-- Button trigger modal -->
                  {{-- Xem sách nhanh --}}
                  <button type="button" id="{{$value2->id}}" class="btn btn-primary xemsachnhanh" data-toggle="modal" data-target="#exampleModalLong">
                    Xem sách nhanh
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content pdf-book">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">
                            <div id="tieude_sach">

                            </div>
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div id="noidung_sach">
                            
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                      </div>
                    </div>
                  </div>  

                </form>

                
                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> {{$value2->views}} </a>
              </div>

              <small class="text-muted"> </small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <a class="btn btn-success btn-read-all" href="{{url('doc-sach')}}">Xem tất cả</a>
  </div>
</div>


<center>
  <img src="{{asset('public/panner.jpg/')}}" height="350"; width="100%"> <br> <br> <br>
</center>



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
    <a class="btn btn-success btn-read-all" href="{{url('doc-truyen')}}">Xem tất cả</a>
  </div>
</div>

@endsection
