@extends('docs.default')

@section('docs-body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4 class="d-flex justify-content-between"> Chi tiết văn bản
                <a href="{{ route('out-docs-management') }}" class="btn btn-primary float-end">Trở lại trang trước</a>
            </h4>
            </div>
            <div class="card-body" style="font-size: 20px">
                <form action="{{URL::to('/updateVBDi/'.$vanBanDi->maVanBanDi)}}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    <div class="status">
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tenFileVanBan">File văn bản:</label>
                        <a href="">
                            {{$vanBanDi->tenFileVanBan}}    
                        </a>
                        <input type="file" name="tenFileVanBan" id="tenFileVanBan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="soHieu">Số hiệu:</label>
                        <input name="soHieu" id="soHieu" class="form-control" value="{{$vanBanDi->soHieu}}"></input>
                    </div>
                    <div class="form-group">
                        <label for="moTa">Mô tả:</label>
                        <input name="moTa" id="moTa" class="form-control" value="{{$vanBanDi->moTa}}"></input>
                    </div>
                    <div class="form-group">
                        <label for="ngayBanHanh_update">Ngày ban hành:</label>
                        <input type="text" id="ngayBanHanh_update" class="date form-control" name="ngayBanHanh_update" value="{{$ngayBanHanh}}">
                    </div>
                    <div class="form-group">
                        <label for="ngayHetHieuLuc_update">Ngày hết hiệu lực:</label>
                        <input type="text" id="ngayHetHieuLuc_update" class="date form-control" name="ngayHetHieuLuc_update" value="{{$ngayHetHieuLuc}}">
                    </div>
            
                    
                    <div class="form-group">
                        <label for="loaiVanBan">Loại văn bản:</label>
                        <select name="loaiVanBan" id="loaiVanBan" class="custom-select">
                            <option value="{{$loaiVanBan->maLoaiVB}}">{{$loaiVanBan->tenLoaiVB}}</option>
                            @foreach ($loaiVanBans as $loaiVanBan)
                                <option value="{{ $loaiVanBan->maLoaiVB }}">{{ $loaiVanBan->tenLoaiVB }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <p class="mb-0">Đơn vị gửi:</p>
                        <label for="VBDi-loaiDonVi" style="font-size: 18px">Loại đơn vị:</label>
                        <select name="VBDi-loaiDonVi" id="VBDi-loaiDonVi" class="custom-select mb-2">
                            <option value="{{$loaiDonVi->maLoaiDV}}">{{$loaiDonVi->tenLoaiDV}}</option>
                            {{-- @foreach ($loaiDonVis as $loaiDonVi)
                                <option value="{{ $loaiDonVi->maLoaiDV }}">{{ $loaiDonVi->tenLoaiDV }}</option>
                            @endforeach --}}
                        </select>

                        <label for="VBDi-donVi" style="font-size: 18px">Đơn vị:</label>
                        <select name="VBDi-donVi" id="VBDi-donVi" class="custom-select">
                            <option value="{{$donVi->maDonVi}}">{{$donVi->tenDonVi}}</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="price">Danh sách đơn vị nhận:</label>
                        <table class="table" id="table-DVNhan">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 20%" style="font-size: 18px">STT</th>
                                    <th style="width: 55%" style="font-size: 18px">Tên đơn vị nhận</th>
                                    <th style="width: 25%" style="font-size: 18px">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($VBDi_DVNhans as $VBDi_DVNhan)
                                    <tr>
                                        <th scope="row">{{++$i}}</th>
                                        <td>{{$VBDi_DVNhan->tenDonVi}}</td>
                                        <td>
                                            @if ($VBDi_DVNhan->trangThai == 1)
                                                <input class="form-check-input donVi_checkbox" type="checkbox"
                                                    value="{{ $VBDi_DVNhan->maDonViNhan }}" checked
                                                    style="font-size: 20px;margin: 0px !important;" />
                                            @else
                                                <input class="form-check-input donVi_checkbox" type="checkbox"
                                                    value="{{ $VBDi_DVNhan->maDonViNhan }}"
                                                    style="font-size: 20px;margin: 0px !important;" />
                                            @endif
                                            {{-- <input class="form-check-input donVi_checkbox" type="checkbox"
                                            value="{{ $donVi->maDonVi }}" id="{{ $donVi->maDonVi }}" /> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">

    $('#ngayBanHanh_update').datepicker({  
        dateFormat: 'MM/DD/YYYY'
    });  
    $('#ngayHetHieuLuc_update').datepicker({  
        dateFormat: 'MM/DD/YYYY'
    });  

    $(document).on('ready', function() {
        changeSessionValue();
    });

    function changeSessionValue() {
        $('.donVi_checkbox').on('click', function(e) {
            
            if (this.checked) {
                var _token = $('input[name="_token"]').val();
                var maDonVi = $(this).val();
                $.ajax({
                    url: '/document-management/themDonVi',
                    method: "POST", // phương thức gửi dữ liệu.
                    data: {
                        maDonVi: maDonVi,
                        _token: _token
                    },
                    success: function(data) { //dữ liệu nhận về
                        console.log(data);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            } else {
                var _token = $('input[name="_token"]').val();
                var maDonVi = $(this).val();
                $.ajax({
                    url: '/document-management/xoaDonVi',
                    method: "POST", // phương thức gửi dữ liệu.
                    data: {
                        maDonVi: maDonVi,
                        _token: _token
                    },
                    success: function(data) { //dữ liệu nhận về
                        console.log(data);
                    },
                    error: function(data) {
                        alert('error');
                        console.log('Error:', data);
                    }
                });
                

            }
        });
    }
</script> 
@endsection