@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liệt Kê Truyện</div>

                <div class="card-body">
                    <div id="thongbao"> </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Truyện</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Slug Truyện</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Nổi bật</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($list_truyen as $key => $truyen)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$truyen->tentruyen}}</td>
                                <td>{{$truyen->tacgia}}</td>
                                <td> <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="250" width="180"> </td>
                                <td>{{$truyen->slug_truyen}}</td>
                                <td>{{$truyen->tomtat}}</td>
                                <td>{{$truyen->danhmuctruyen->tendanhmuc}}</td>
                                <td>{{$truyen->theloai->tentheloai}}</td>

                                <td>
                                    @if($truyen->kichhoat == 0)
                                        <span class="text text-success"> Kích hoạt </span>
                                    @else
                                        <span class="text text-danger"> Không kích hoạt </span>
                                    @endif
                                </td>

                                {{-- Truyện nổi bật --}}
                                <td width="10%">
                                    @if($truyen->truyen_noibat == 0)
                                    <form>
                                        @csrf
                                        <select class="custom-select truyennoibat" data-truyen_id="{{$truyen->id}}" name="truyennoibat">
                                            <option selected value="0">Truyện mới</option>
                                            <option value="1">Truyện đọc nhiều</option>
                                            <option value="2">Truyện nổi bật</option>
                                        </select>
                                    </form>   

                                    @elseif($truyen->truyen_noibat == 1)
                                    <form>
                                        @csrf
                                        <select class="custom-select truyennoibat" data-truyen_id="{{$truyen->id}}" name="truyennoibat">
                                            <option value="0">Truyện mới</option>
                                            <option selected value="1">Truyện đọc nhiều</option>
                                            <option value="2">Truyện nổi bật</option>
                                        </select>
                                    </form>  

                                    @else
                                        <form>
                                        @csrf
                                        <select class="custom-select truyennoibat" data-truyen_id="{{$truyen->id}}" name="truyennoibat">
                                            <option value="0">Truyện mới</option>
                                            <option value="1">Truyện đọc nhiều</option>
                                            <option selected value="2">Truyện nổi bật</option>
                                        </select>
                                    </form>  
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('truyen.edit', [$truyen->id])}}" class="btn btn-primary"> Sửa Truyện </a>
                                    <form action="{{route('truyen.destroy', [$truyen->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa Truyện này?');" class="btn btn-danger"> Xóa </button>
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
