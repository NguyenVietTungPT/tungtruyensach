@extends('layouts.app')

@section('content')

  <div class="container-fluid">
    <div class="row justify-content-center content-layout-admin">
      {{-- <div class="col-md-2" style="height: 100%">
        @include('layouts.nav')
      </div> --}}
      <div class="col-md-12">
        <div class="card">
          <div class="card-header header-title">Cập nhật Chương Truyện</div>

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

            <form method="POST" action="{{ route('chapter.update', [$chapter->id]) }}">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Tên Chapter </label>
                <input type="text" class="form-control" value="{{ $chapter->tieude }}" onkeyup="ChangeToSlug();"
                  name="tieude" id="slug" aria-describedby="emailHelp" placeholder="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Slug Chapter </label>
                <input type="text" class="form-control" value="{{ $chapter->slug_chapter }}" name="slug_chapter"
                  id="convert_slug" aria-describedby="emailHelp" placeholder="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tóm tắt Chapter </label>
                <input type="text" class="form-control" value="{{ $chapter->tomtat }}" name="tomtat"
                  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Nội dung Chapter </label>
                <textarea name="noidung" id="noidung_chapter" class="form-control" rows="5" style="resize: none"> {{ $chapter->noidung }} </textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Thuộc truyện </label>
                <select class="custom-select dropdown-Tung" name="truyen_id">
                  @foreach ($truyen as $key => $value)
                    <option {{ $chapter->truyen_id == $value->id ? 'selected' : '' }} value="{{ $value->id }}">
                      {{ $value->tentruyen }} </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Kích hoạt Chapter </label>
                <select class="custom-select dropdown-Tung" name="kichhoat">
                  @if ($chapter->kichhoat == 0)
                    <option selected value="0">Kích hoạt</option>
                    <option value="1">Không kích hoạt</option>
                  @else
                    <option value="0">Kích hoạt</option>
                    <option selected value="1">Không kích hoạt</option>
                  @endif
                </select>
              </div>

              <button type="submit" class="btn btn-primary btn-add-edit">Cập nhật Chương</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
