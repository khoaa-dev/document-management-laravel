@extends('docs.default')

@section('docs-body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4 class="d-flex justify-content-between"> Gửi văn bản đi
                <a href="{{ route('out-docs-management') }}" class="btn btn-primary float-end">Trở lại trang trước</a>
            </h4>
            </div>
            <div class="card-body" style="font-size: 20px">
                <form action="{{route('taoVanBanDi')}}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    <div class="status">
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tenFileVanBan">Chọn tệp:</label>
                        <input type="file" name="tenFileVanBan" id="tenFileVanBan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="soHieu">Số hiệu:</label>
                        <input name="soHieu" id="soHieu" class="form-control" ></input>
                    </div>
                    <div class="form-group">
                        <label for="moTa">Mô tả:</label>
                        <input name="moTa" id="moTa" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="ngayBanHanh">Ngày ban hành:</label>
                        <input type="text" id="ngayBanHanh" class="date form-control" name="ngayBanHanh">
                    </div>
                    <div class="form-group">
                        <label for="ngayHetHieuLuc">Ngày hết hiệu lực:</label>
                        <input type="text" id="ngayHetHieuLuc" class="date form-control" name="ngayHetHieuLuc">
                    </div>
            
                    
                    <div class="form-group">
                        <label for="loaiVanBan">Chọn loại văn bản:</label>
                        <select name="loaiVanBan" id="loaiVanBan" class="custom-select">
                            <option value="">Chọn</option>
                            @foreach ($loaiVanBans as $loaiVanBan)
                                <option value="{{ $loaiVanBan->maLoaiVB }}">{{ $loaiVanBan->tenLoaiVB }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <p>Chọn đơn vị gửi:</p>
                        <label for="VBDi-loaiDonVi">Loại đơn vị:</label>
                        <select name="VBDi-loaiDonVi" id="VBDi-loaiDonVi" class="custom-select">
                            <option value="">Chọn</option>
                            @foreach ($loaiDonVis as $loaiDonVi)
                                <option value="{{ $loaiDonVi->maLoaiDV }}">{{ $loaiDonVi->tenLoaiDV }}</option>
                            @endforeach
                        </select>

                        <label for="VBDi-donVi">Đơn vị:</label>
                        <select name="VBDi-donVi" id="VBDi-donVi" class="custom-select">
                            <option value="">Chọn</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="price">Danh sách đơn vị nhận:</label>
                        <a id="btn_taoDanhSachNhan" href="" class="btn btn-primary create-menu" data-target="#modalChooseFood" data-toggle="modal">Tạo</a>
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

<div class="row">
    <div class="col-12">
        <div class="modal fade" id="modalChooseFood" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @csrf
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold" style="font-size: 20px">Danh sách đơn vị nhận
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: black">&times;</span>
                        </button>
                    </div>
                    <div class="content">
                        <div class="col-12 form-group m-2" style="font-size: 20px; border-bottom: 1px solid #ccc">
                            <label for="" class="mr-2">Loại đơn vị</label>
                            <select class="browser-default custom-select col-5" id="loaiDonVi-taoDanhSach">
                                <label for="">Loại đơn vị</label>
                                <option selected="" value="0" id="">Tất cả</option>
                                @foreach ($loaiDonVis as $loaiDonVi)
                                    <option value="{{ $loaiDonVi->maLoaiDV }}">{{ $loaiDonVi->tenLoaiDV }}</option>
                                @endforeach
                            </select>
                            {{ csrf_field() }}
                        </div>

                        <div class="col-12 form-group" style="font-size: 18px">
                            <table class="table" id="table-DVNhan">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 20%" style="font-size: 18px">STT</th>
                                        <th style="width: 55%" style="font-size: 18px">Tên đơn vị</th>
                                        <th style="width: 25%" style="font-size: 18px">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donVis as $donVi)
                                        <tr>
                                            <th scope="row">{{++$i}}</th>
                                            <td>{{$donVi->tenDonVi}}</td>
                                            <td>
                                                @if (array_search($donVi->maDonVi, Session::get('maDonVis', [])) !== false)
                                                    <input class="form-check-input donVi_checkbox" type="checkbox"
                                                        value="{{ $donVi->maDonVi }}" checked
                                                        style="font-size: 20px;margin: 0px !important;" />
                                                @else
                                                    <input class="form-check-input donVi_checkbox" type="checkbox"
                                                        value="{{ $donVi->maDonVi }}"
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
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button id="" class="btn btn-dark" style="font-size: 18px; border-radius: 5px"
                            data-dismiss="modal" data-toggle="modal" data-target="#myModal">
                            Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">

    $('#ngayBanHanh').datepicker({  
        dateFormat: 'MM/DD/YYYY'
    });  
    $('#ngayHetHieuLuc').datepicker({  
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

    


    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        //Load Danh sach don vi theo combobox
        $('#loaiDonVi-taoDanhSach').on('change', function (e) {
            e.preventDefault();
            var id = $(this).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url:'/document-management/DSDonViNhan',
                type:'POST',
                dataType:'JSON',
                data:{id:id, _token:_token},
                success:function (response) {
                    $('#table-DVNhan tbody').html(response.data);
                    changeSessionValue();
                }
            })
        });
    })
</script> 
@endsection