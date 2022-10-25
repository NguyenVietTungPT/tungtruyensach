@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center content-layout-admin">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header header-title">Cập nhật Nhà Cung Cấp</div>

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

            <form method="POST" action="{{ route('supplieres.update', [$supplieres->id]) }}">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Tên Nhà cung cấp </label>
                <input type="text" class="form-control" value="{{ $supplieres->sl_name }}" onkeyup="ChangeToSlug();"
                  name="sl_name" id="slug" aria-describedby="emailHelp" placeholder="Tên Nhà cung cấp">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại Nhà cung cấp </label>
                <input type="text" class="form-control" value="{{ $supplieres->sl_phone }}" onkeyup="ChangeToSlug();"
                  name="sl_phone" id="slug" aria-describedby="emailHelp" placeholder="Số điện thoại Nhà cung cấp">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email Nhà cung cấp </label>
                <input type="text" class="form-control" value="{{ $supplieres->sl_email }}" onkeyup="ChangeToSlug();"
                  name="sl_email" id="slug" aria-describedby="emailHelp" placeholder="Email Nhà cung cấp">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ Nhà cung cấp </label>
                <input type="text" class="form-control" value="{{ $supplieres->sl_address }}" onkeyup="ChangeToSlug();"
                  name="sl_address" id="slug" aria-describedby="emailHelp" placeholder="Địa chỉ Nhà cung cấp">
              </div>
              
              <button type="submit" class="btn btn-primary btn-add-edit">Cập nhật Nhà cung cấp</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
