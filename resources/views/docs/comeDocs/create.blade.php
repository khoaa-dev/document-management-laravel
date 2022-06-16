@extends('docs.default')

@section('docs-body')
<div class="row">
    <div class="col-12">
        <div class="status">
            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
        </div>
        <div class="card">
            <div class="card-header">
            <h4 class="d-flex justify-content-between"> Tiếp nhận văn bản đến
                <a href="{{ route('come-docs-management') }}" class="btn btn-primary float-end">Trở lại trang trước</a>
            </h4>
            </div>
            <div class="card-body" style="font-size: 20px">
            <form action="" method="POST" enctype="multipart/form-data">
                
                @csrf
                <div class="form-group">
                    <label for="image">Chọn tệp:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Mô tả:</label>
                    <textarea name="name" id="name" class="form-control" rows="3" form="usrform" ></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Ngày ban hành:</label>
                    <input type="text" id="datepicker" class="date form-control" name="from_date">
                </div>
                <div class="form-group">
                    <label for="price">Ngày hết hiệu lực:</label>
                    <input type="text" id="datepicker2" class="date form-control" name="from_date">
                </div>
        
                
                <div class="form-group">
                    <label for="categoryId">Chọn loại văn bản:</label>
                    <select name="categoryId" id="categoryId" class="custom-select">
                        <option value="">Chọn</option>
                        @foreach ($loaiVanBans as $loaiVanBan)
                            <option value="{{ $loaiVanBan->maLoaiVB }}">{{ $loaiVanBan->tenLoaiVB }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <p>Chọn đơn vị gửi:</p>
                    <label for="categoryId">Loại đơn vị:</label>
                    <select name="categoryId" id="categoryId" class="custom-select">
                        <option value="">Chọn</option>
                        @foreach ($loaiDonVis as $loaiDonVi)
                            <option value="{{ $loaiDonVi->maLoaiDV }}">{{ $loaiDonVi->tenLoaiDV }}</option>
                        @endforeach
                    </select>

                    <label for="categoryId">Đơn vị:</label>
                    <select name="categoryId" id="categoryId" class="custom-select">
                        <option value="">Chọn</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="price">Danh sách đơn vị nhận:</label>
                    <a href="" class="btn btn-primary">Tạo</a>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
                </form>
            </div>
        </div>
        </div>
    </div>
  </div>
@endsection

@section('js')
<script type="text/javascript">

    $('#datepicker').datepicker({  
        dateFormat: 'yy-mm-dd'
    });  
    $('#datepicker2').datepicker({  
        dateFormat: 'yy-mm-dd'
    });  
</script> 
@endsection