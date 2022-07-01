@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Sách</div>

                {{-- Validation --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{route('sach.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sách </label>
                            <input type="text" class="form-control" value="{{old('tensach')}}" onkeyup="ChangeToSlug();" name="tensach" id="slug" aria-describedby="emailHelp" placeholder="Tên sách">
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Tác giả </label>
                            <input type="text" class="form-control" value="{{old('tacgia')}}" name="tacgia" aria-describedby="emailHelp" placeholder="Tác giả">
                        </div> --}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug sách </label>
                            <input type="text" class="form-control" value="{{old('slug_sach')}}" name="slug_sach" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug sách">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt sách </label>
                            <textarea class="form-control" rows="5" style="resize: none" name="tomtat"> </textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung sách </label>
                            <textarea id="ckeditor_sach" class="form-control" rows="5" style="resize: none" name="noidung"> </textarea>
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục sách </label>
                            <select class="custom-select" name="danhmuc">
                                @foreach($danhmuc as $key => $muc)
                                    <option value="{{$muc->id}}"> {{$muc->tendanhmuc}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thể loại sách </label>
                            <select class="custom-select" name="theloai">
                                @foreach($theloai as $key => $the)
                                    <option value="{{$the->id}}"> {{$the->tentheloai}} </option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sách </label>
                            <input type="file" class="form-control-file" name="hinhanh">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Kích hoạt sách </label>
                            <select class="custom-select" name="kichhoat">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1"> sách nổi bật </label>
                            <select class="custom-select" name="sachnoibat">
                                <option value="0">sách mới</option>
                                <option value="1">sách đọc nhiều</option>
                                <option value="2">sách nổi bật</option>
                            </select>
                        </div> --}}

                        <button type="submit" class="btn btn-primary">Thêm sách</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
