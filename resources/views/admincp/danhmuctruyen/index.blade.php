@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row justify-content-center">
      {{-- <div class="col-md-2" style="height: 100%">
        @include('layouts.nav')
      </div> --}}
      <div class="col-md-12">
            <div class="card">
                <div class="card-header header-title">Liệt Kê Danh Mục Truyện</div>

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
                            <th class="col-md-2">Tên danh mục</th>
                            <th class="col-md-2">Slug danh mục</th>
                            <th scope="col">Mô tả</th>
                            <th class="col-md-1">Kích hoạt</th>
                            <th class="col-md-1">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($danhmuctruyen as $key => $danhmuc)
                            <tr class="tr-content">
                                <th scope="row" class="stt">{{$key+1}}</th>
                                <td>{{$danhmuc->tendanhmuc}}</td>
                                <td>{{$danhmuc->slug_danhmuc}}</td>
                                <td>{{$danhmuc->mota}}</td>
                                <td>
                                    @if($danhmuc->kichhoat == 0)
                                        <span class="text text-success"> Kích hoạt </span>
                                    @else
                                        <span class="text text-danger"> Không kích hoạt </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('danhmuc.edit', [$danhmuc->id])}}" class="btn btn-primary"> Sửa </a>
                                    <form action="{{route('danhmuc.destroy', [$danhmuc->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa danh mục truyện này?');" class="btn btn-danger"> Xóa</button>
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
