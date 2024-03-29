@extends('layouts.app')

@section('content')
  @include('layouts.nav')
  <div class="container">
    <div class="row justify-content-center content-layout-admin">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Quản Lý</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            {{-- {{ __('You are logged in!') }} --}}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
