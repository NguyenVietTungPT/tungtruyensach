{{-- Slide --}}
{{-- <h3>SÁCH HAY NÊN ĐỌC</h3>
<div class="owl-carousel owl-theme" style="margin-bottom: 30px">
    <div class="item">
        <img src="{{asset('public/uploads/truyen/login_image84.PNG')}}">
        <h3>One Two Three Four</h3>
        <p> <i class="fas fa-eye"></i> 6544 </p>
        <a class="btn btn-primary btn-sm" href="">Đọc ngay</a>
    </div>
</div> --}}


{{-- TEST --}}
<h3>SÁCH HAY NÊN ĐỌC</h3>
<div class="owl-carousel owl-theme slide-items" style="margin-block: 30px;">
    @foreach($slide_truyen as $key => $slide)
    <div class="item slide-book">
        <img src="{{asset('public/uploads/truyen/'.$slide->hinhanh)}}">
        <h3> <b> {{$slide->tentruyen}} </b> </h3>
        {{-- <p> <i class="fas fa-eye"></i> {{$slide->views}} </p> --}}
        <a class="btn btn-primary btn-sm btn-slide" href="{{url('xem-truyen/'.$slide->slug_truyen)}}">Đọc ngay</a>
    </div>
    @endforeach   
</div>