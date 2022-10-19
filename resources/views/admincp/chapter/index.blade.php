@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container-fluid">
        <div class="row justify-content-center">
            {{-- <div class="col-md-2" style="height: 100%">
              @include('layouts.nav')
            </div> --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-title">Liệt Kê Chương Truyện</div>
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
                                    <th class="col-md-2">Tên Chapter</th>
                                    <th class="col-md-2">Slug Chapter</th>
                                    <th class="col-md-4">Tóm tắt</th>
                                    <th class="col-md-2">Thuộc truyện</th>
                                    <th class="col-md-1">Kích hoạt</th>
                                    <th class="col-md-2">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chapter as $key => $chap)
                                    <tr class="tr-content">
                                        <th scope="row" class="stt">{{ $key + 1 }}</th>
                                        <td>{{ $chap->tieude }}</td>
                                        <td>{{ $chap->slug_chapter }}</td>
                                        <td>{{ $chap->tomtat }}</td>
                                        <td>{{ $chap->truyen->tentruyen ?? 'None' }}</td>
                                        <td>
                                            @if ($chap->kichhoat == 0)
                                                <span class="text text-success"> Kích hoạt </span>
                                            @else
                                                <span class="text text-danger"> Không kích hoạt </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('chapter.edit', [$chap->id]) }}" class="btn btn-primary"> Sửa
                                            </a>
                                            <form action="{{ route('chapter.destroy', [$chap->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Bạn muốn xóa Chapter truyện này?');"
                                                    class="btn btn-danger"> Xóa </button>
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
