@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-title">Liệt Kê Sách</div>

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
                            <th class="col-md-2">Tên Sách</th>
                            <th scope="col">Hình ảnh</th>
                            <th class="col-md-2">Slug Sách</th>
                            <th class="col-md-3">Tóm tắt</th>
                            <th class="col-md-1">Kích hoạt</th>
                            <th class="col-md-1">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($list_sach as $key => $sach)
                            <tr class="tr-content">
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$sach->tensach}}</td>
                                <td> <img src="{{asset('public/uploads/sach/'.$sach->hinhanh)}}" height="250" width="180"> </td>
                                <td>{{$sach->slug_sach}}</td>
                                <td>
                                    @php
                                        $tomtat = substr($sach->tomtat, 0,200);
                                    @endphp
                                    {!! $tomtat !!}
                                </td>

                                <td>
                                    @if($sach->kichhoat == 0)
                                        <span class="text text-success"> Kích hoạt </span>
                                    @else
                                        <span class="text text-danger"> Không kích hoạt </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('sach.edit', [$sach->id])}}" class="btn btn-primary"> Sửa Sách </a>
                                    <form action="{{route('sach.destroy', [$sach->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa Sách này?');" class="btn btn-danger"> Xóa Sách </button>
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
