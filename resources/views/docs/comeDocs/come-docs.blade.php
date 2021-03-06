@extends('docs.default')

@section('docs-body')
    <div class="row">
        <div class="col-12">
            <h1 class="mt-3" style="font-family: 'Nunito Sans', sans-serif;font-size: 32px; text-align: center; color: #227DC7">VĂN BẢN ĐẾN</h1>
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
                <select id="loaiDonVi" name="nationalityId" style="width: 100%" class="form-control select2-hidden-accessible" data-msg-required="Bạn chưa chọn quốc tịch" data-select2-id="input11008" tabindex="-1" aria-hidden="true">
                                                
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
                <select id="donVi" name="nationalityId" style="width: 100%" class="form-control select2-hidden-accessible" data-msg-required="Bạn chưa chọn quốc tịch" data-select2-id="input11008" tabindex="-1" aria-hidden="true">
                                                
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
                <input type="text" id="datepicker-xemVBDen" class="date form-control" name="from_date">
            </div>

        </div>
        <div class="col-6">
            <div class="form-group" style="font-size: 16px">
                <p style="margin-bottom: 8px">Đến ngày</p>
                <input type="text" id="datepicker2-xemVBDen" class="date form-control" name="from_date">
            </div>
        </div>
    </div>


    <div class="row mt-2">
        <div class="col-12 d-flex justify-content-end mb-2" >
            
            <a href="{{ route('create-come-docs') }}" class="btn btn-primary" id="add-account-admin" style="font-size: 16px">
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

                @foreach ($vanBanDens as $vanBanDen)
                    <tr style="text-align: center">
                        <th scope="row">{{++$i}}</th>
                        <td>{{$vanBanDen->tenFileVanBan}}</td>
                        <td>{{$vanBanDen->ngayBanHanh}}</td>
                        <td>{{$vanBanDen->ngayHetHieuLuc}}</td>
                        <td>
                            <button class="btn btn-info text-light" href="#">Xem chi tiết</button>
                            <button class="btn btn-danger" href="#">Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
<script type="text/javascript">

    $('#datepicker-xemVBDen').datepicker({  
        dateFormat: 'yy-mm-dd'
    });  
    $('#datepicker2-xemVBDen').datepicker({  
        dateFormat: 'yy-mm-dd'
    });  


    
</script> 
@endsection