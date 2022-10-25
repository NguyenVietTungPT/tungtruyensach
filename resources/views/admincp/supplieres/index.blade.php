@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center content-layout-admin">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header header-title">Liệt Kê Nhà Cung Cấp</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <table class="table table-striped">
              <thead class="thead-title">
                <tr>
                  <th scope="col">STT</th>
                  <th class="col-md-4">Nhà cung cấp</th>
                  <th class="col-md-2">Số điện thoại</th>
                  <th scope="col">Email</th>
                  <th class="col-md-4">Địa chỉ</th>
                  <th class="col-md-1">Quản lý</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($supplieres as $key => $nhacungcap)
                  <tr class="tr-content">
                    <th scope="row" class="stt">{{ $key + 1 }}</th>
                    <td>{{ $nhacungcap->sl_name }}</td>
                    <td>{{ $nhacungcap->sl_phone }}</td>
                    <td>{{ $nhacungcap->sl_email }}</td>
                    <td>{{ $nhacungcap->sl_address }}</td>
                    
                    <td>
                      <a href="{{ route('supplieres.edit', [$nhacungcap->id]) }}" class="btn btn-primary"> Sửa </a>
                      <form action="{{ route('supplieres.destroy', [$nhacungcap->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Bạn muốn xóa danh mục truyện này?');" class="btn btn-danger">
                          Xóa</button>
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
