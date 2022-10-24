@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center content-layout-admin">
      {{-- <div class="col-md-2" style="height: 100%">
        @include('layouts.nav')
      </div> --}}
      <div class="col-md-12">
        <div class="card">
          <div class="card-header header-title">Liệt Kê Mặt Hàng</div>
          <div class="card-body">
            <div id="thongbao"> </div>
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <table class="table table-striped table-responsive">
              <thead class="thead-title">
                <tr>
                  <th scope="col">STT</th>
                  <th class="col-md-1">Tên</th>
                  <th class="col-md-1">Giá bán</th>
                  <th scope="col-md-1">Giá nhập</th>
                  <th class="col-md-1">Hình ảnh</th>
                  <th class="col-md-1">Lượt xem</th>
                  <th class="col-md-1">Độ nổi bật</th>
                  <th class="col-md-1">Kích hoạt</th>
                  <th class="col-md-5">Mô tả</th>
                  <th class="col-md-1">Số lượng</th>
                  <th class="col-md-1">Quản lý</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($product as $key => $pro)
                  <tr class="tr-content">
                    <th scope="row" class="stt">{{ $key + 1 }}</th>
                    <td>{{ $pro->pro_name }}</td>
                    <td>{{ $pro->pro_price }}</td>
                    <td>{{ $pro->pro_price_entry }}</td>
                    <td> <img src="{{ asset('public/uploads/sach/' . $pro->pro_img) }}" height="250" width="180">
                    </td>
                    <td>{{ $pro->pro_view }}</td>
                    <td width="10%">
                      @if ($pro->pro_hot == 0)
                        <span class="text text-success"> Mặt Hàng mới </span>
                      @elseif($pro->pro_hot == 1)
                        <span class="text text-warning"> Mặt Hàng đọc nhiều </span>
                      @else
                        <span class="text text-danger"> Mặt Hàng nổi bật </span>
                      @endif
                    </td>
                    <td>
                      @if ($pro->pro_active == 0)
                        <span class="text text-success"> Kích hoạt </span>
                      @else
                        <span class="text text-danger"> Không kích hoạt </span>
                      @endif
                    </td>
                    <td class="mota-tomtat">{{ $pro->pro_description }}</td>
                    <td>{{ $pro->pro_number }}</td>
                    {{-- <td>{{ $pro->danhmuctruyen->tendanhmuc }}</td>
                    <td>{{ $pro->theloai->tentheloai }}</td> --}}
                    <td>
                      <a href="{{ route('products.edit', [$pro->id]) }}" class="btn btn-primary"> Sửa </a>
                      <form action="{{ route('products.destroy', [$pro->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Bạn muốn xóa Mặt Hàng này?');" class="btn btn-danger"> 
                          Xóa 
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
