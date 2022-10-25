@extends('layouts.app')

@section('content')
  <div class="container-fluid">
      <div class="col-md-10" style="margin-left: 250px">
        <form class="needs-validation" novalidate method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
          @csrf  
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationCustom03">Tên Mặt Hàng</label>
              <input type="text" class="form-control" id="validationCustom03" name="pro_name" required>
              <div class="invalid-feedback">
                Hãy điền tên Mặt Hàng.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationCustom04">Nhà Cung Cấp</label>
              <select class="custom-select" id="validationCustom04" name="sl_name" required>
                @foreach ($supplieres as $key => $supp)
                  <option value="{{ $supp->id }}"> {{ $supp->sl_name }} </option>
                @endforeach
              </select>
              <div class="invalid-feedback">
                Hãy chọn Nhà cung cấp.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationCustom03">Giá bán</label>
              <input type="text" class="form-control" id="validationCustom03" name="pro_price" required>
              <div class="invalid-feedback">
                Hãy cung cấp Giá bán.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationCustom03">Giá nhập</label>
              <input type="text" class="form-control" id="validationCustom03" name="pro_price_entry" required>
              <div class="invalid-feedback">
                Hãy cung cấp Giá nhập.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationCustom03">Số lượng</label>
              <input type="text" class="form-control" id="validationCustom03" name="pro_number" required>
              <div class="invalid-feedback">
                Hãy cung cấp Số lượng.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationCustom04">Kích hoạt Mặt Hàng</label>
              <select class="custom-select" id="validationCustom04" required>
                <option value="0">Kích hoạt</option>
                <option value="1">Không kích hoạt</option>
              </select>
              <div class="invalid-feedback">
                Hãy chọn trạng thái Kích hoạt.
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh Mặt hàng </label> <br>
            <input type="file" class="form-control-file" name="pro_img">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Mô tả Mặt hàng</label>
            <textarea class="form-control" rows="5" style="resize: none" name="pro_description"> </textarea>
          </div>
          
          <button class="btn btn-primary" type="submit">Thêm Mặt Hàng</button>
        </form>
      </div>
    </div>  
    
    
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
  </div>
@endsection
