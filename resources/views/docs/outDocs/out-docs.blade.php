@extends('docs.default')

@section('css')
    <style>
        .modal-confirm {		
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;   
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;		
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }		
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }
        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn, .modal-confirm .btn:active {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
        }
        .modal-confirm .btn-secondary {
            background: #c1c1c1;
        }
        .modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
@endsection

@section('docs-body')
    <div class="row">
        <div class="col-12">
            <h1 class="mt-3" style="font-family: 'Nunito Sans', sans-serif;font-size: 32px; text-align: center; color: #227DC7">VĂN BẢN ĐI</h1>
        </div>
    </div>
    <div class="row mt-4">
        {{-- Filter by Loai VB  --}}
        <div class="col-4">
            <div class="form-group" style="font-size: 16px">
                <label>Loại văn bản</label>
                <select id="input11008" name="nationalityId" style="width: 100%" class="form-control select2-hidden-accessible" data-msg-required="Bạn chưa chọn quốc tịch" data-select2-id="input11008" tabindex="-1" aria-hidden="true">
                                                
                    <option value="">Chọn</option>
                    @foreach ($loaiVanBans as $loaiVanBan)
                        <option value="{{ $loaiVanBan->maLoaiVB }}">{{ $loaiVanBan->tenLoaiVB }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- Filter by Loai Don Vi --}}
        <div class="col-4">
            <div class="form-group" style="font-size: 16px">
                @csrf
                <label>Loại đơn vị</label>
                <select id="loaiDonVi-VBDi" name="nationalityId" style="width: 100%" class="form-control select2-hidden-accessible" data-msg-required="Bạn chưa chọn quốc tịch" data-select2-id="input11008" tabindex="-1" aria-hidden="true">
                                                
                    <option value="">Chọn</option>
                    @foreach ($loaiDonVis as $loaiDonVi)
                        <option value="{{ $loaiDonVi->maLoaiDV }}">{{ $loaiDonVi->tenLoaiDV }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- Filter by Don Vi --}}
        <div class="col-4">
            <div class="form-group" style="font-size: 16px">
                <label>Đơn vị gửi</label>
                <select id="donVi-VBDi" name="nationalityId" style="width: 100%" class="form-control select2-hidden-accessible" data-msg-required="Bạn chưa chọn quốc tịch" data-select2-id="input11008" tabindex="-1" aria-hidden="true">
                                                
                    <option value="">Chọn</option>
                </select>
            </div>
        </div>
    </div>

    {{-- Filter by date --}}
    <div class="row mt-2">
        <div class="col-6">
            <div class="form-group" style="font-size: 16px">
                <p style="margin-bottom: 8px">Từ ngày</p>
                <input type="text" id="datepicker-xemVBDi" class="date form-control" name="from_date">
            </div>

        </div>
        <div class="col-6">
            <div class="form-group" style="font-size: 16px">
                <p style="margin-bottom: 8px">Đến ngày</p>
                <input type="text" id="datepicker2-xemVBDi" class="date form-control" name="from_date">
            </div>
        </div>
    </div>

    {{-- Filter by name --}}
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group" style="font-size: 16px">
                <label for="nameDocument">Tên văn bản</label>
                <input type="text" id="nameDocument" class="date form-control" name="nameDocument" placeholder="Nhập tên văn bản">
            </div>
        </div>
    </div>


    <div class="row mt-2">
        <div class="col-12 d-flex justify-content-end mb-2" >
            
            <a href="{{ route('create-out-docs') }}" class="btn btn-primary" id="add-account-admin" style="font-size: 16px">
                <i class="fa-solid fa-circle-plus"></i>
                Thêm mới
            </a>
        </div>
        
    </div>
    <div class="">
        {{-- Lits document --}}
        <table class="table">
            <thead class="thead-dark">
                <tr style="text-align: center">
                    <th style="width: 10%" style="font-size: 18px">STT</th>
                    <th style="width: 30%" style="font-size: 18px">Tên file văn bản</th>
                    <th style="width: 16%" style="font-size: 18px">Ngày ban hành</th>
                    <th style="width: 16%" style="font-size: 18px">Ngày hết hiệu lực</th>
                    <th style="width: 28%" style="font-size: 18px">Hành động</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($vanBanDis as $vanBanDi)
                    <tr style="text-align: center">
                        <th scope="row">{{++$i}}</th>
                        <td>{{$vanBanDi->tenFileVanBan}}</td>
                        <td>{{$vanBanDi->ngayBanHanh}}</td>
                        <td>{{$vanBanDi->ngayHetHieuLuc}}</td>
                        <td>
                            <a class="btn btn-info text-light" href="{{URL::to('/detail/'.$vanBanDi->maVanBanDi)}}">Xem chi tiết</a>
                            <a class="btn btn-danger" id="deleteButton" data-attr="{{ URL::to('/deleteView/'.$vanBanDi->maVanBanDi) }}" data-target="#myModal" data-toggle="modal">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Modal HTML -->
    <div id="myModal" class="modal fade" id="smallModal">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content" id="smallBody">
                <div>

                </div>
            </div>
        </div>
    </div> 
@endsection

@section('js')
<script type="text/javascript">

    $('#datepicker-xemVBDi').datepicker({  
        dateFormat: 'yy-mm-dd'
    });  
    $('#datepicker2-xemVBDi').datepicker({  
        dateFormat: 'yy-mm-dd'
    });  

    // display a modal (small modal)
    $(document).on('click', '#deleteButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });
</script> 
@endsection