@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center content-layout-admin">
      {{-- <div class="col-md-2" style="height: 100%">
        @include('layouts.nav')
      </div> --}}
      <div class="col-md-12">
        <div class="card">
          <div class="card-header header-title">Cập nhật Danh Mục Truyện</div>

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

            <form method="POST" action="{{ route('danhmuc.update', [$danhmuc->id]) }}">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục </label>
                <input type="text" class="form-control" value="{{ $danhmuc->tendanhmuc }}" onkeyup="ChangeToSlug();"
                  name="tendanhmuc" id="slug" aria-describedby="emailHelp" placeholder="Tên danh mục">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Slug danh mục </label>
                <input type="text" class="form-control" value="{{ $danhmuc->slug_danhmuc }}" name="slug_danhmuc"
                  id="convert_slug" aria-describedby="emailHelp" placeholder="Slug danh mục">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Mô tả danh mục </label>
                <input type="text" class="form-control" value="{{ $danhmuc->mota }}" name="motadanhmuc"
                  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả danh mục">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Kích hoạt danh mục </label>
                <select class="custom-select dropdown-Tung" name="kichhoat">
                  @if ($danhmuc->kichhoat == 0)
                    <option selected value="0">Kích hoạt</option>
                    <option value="1">Không kích hoạt</option>
                  @else
                    <option value="0">Kích hoạt</option>
                    <option selected value="1">Không kích hoạt</option>
                  @endif
                </select>
              </div>

              <button type="submit" class="btn btn-primary btn-add-edit">Cập nhật Danh Mục</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
