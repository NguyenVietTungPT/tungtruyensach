@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-title">Liệt Kê Thể Loại Truyện</div>

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
                        @foreach($theloaitruyen as $key => $theloai)
                            <tr class="tr-content">
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$theloai->tentheloai}}</td>
                                <td>{{$theloai->slug_theloai}}</td>
                                <td>{{$theloai->mota}}</td>
                                <td>
                                    @if($theloai->kichhoat == 0)
                                        <span class="text text-success"> Kích hoạt </span>
                                    @else
                                        <span class="text text-danger"> Không kích hoạt </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('theloai.edit', [$theloai->id])}}" class="btn btn-primary"> Sửa </a>
                                    <form action="{{route('theloai.destroy', [$theloai->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa thể loại truyện này?');" class="btn btn-danger"> Xóa</button>
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
