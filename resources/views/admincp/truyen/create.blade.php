@extends('layouts.app')

@section('content')

  <div class="container-fluid">
    <div class="row justify-content-center content-layout-admin">
      {{-- <div class="col-md-2" style="height: 100%">
        @include('layouts.nav')
      </div> --}}
      <div class="col-md-12">
        <div class="card">
          <div class="card-header header-title">Thêm Truyện</div>

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

            <form method="POST" action="{{ route('truyen.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Tên truyện </label>
                <input type="text" class="form-control" value="{{ old('tentruyen') }}" onkeyup="ChangeToSlug();"
                  name="tentruyen" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tác giả </label>
                <input type="text" class="form-control" value="{{ old('tacgia') }}" name="tacgia"
                  aria-describedby="emailHelp" placeholder="Tác giả">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Slug truyện </label>
                <input type="text" class="form-control" value="{{ old('slug_truyen') }}" name="slug_truyen"
                  id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyện">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tóm tắt truyện </label>
                <textarea class="form-control" rows="5" style="resize: none" name="tomtat"> </textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Danh mục truyện </label>
                <select class="custom-select dropdown-Tung" name="danhmuc">
                  @foreach ($danhmuc as $key => $muc)
                    <option value="{{ $muc->id }}"> {{ $muc->tendanhmuc }} </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Thể loại truyện </label>
                <select class="custom-select dropdown-Tung" name="theloai">
                  @foreach ($theloai as $key => $the)
                    <option value="{{ $the->id }}"> {{ $the->tentheloai }} </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Hình ảnh truyện </label> <br>
                <input type="file" class="form-control-file" name="hinhanh">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Kích hoạt truyện </label>
                <select class="custom-select dropdown-Tung" name="kichhoat">
                  <option value="0">Kích hoạt</option>
                  <option value="1">Không kích hoạt</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1"> Truyện nổi bật </label>
                <select class="custom-select dropdown-Tung" name="truyennoibat">
                  <option value="0">Truyện mới</option>
                  <option value="1">Truyện đọc nhiều</option>
                  <option value="2">Truyện nổi bật</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary btn-add-edit">Thêm Truyện</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
