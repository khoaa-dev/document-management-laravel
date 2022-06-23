{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ URL::to('/delete/'.$vanBanDi->maVanBanDi)}}" method="POST">
    @csrf
    <div class="modal-header flex-column">
        <div class="icon-box">
            <i class="material-icons">&#xE5CD;</i>
        </div>						
        <h4 class="modal-title w-100">Bạn có chắc không?</h4>	
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body" style="font-size: 16px">
        <p>Bạn thực sự muốn xóa tệp này? Điều này sẽ không thể khôi phục được.</p>
    </div>
    <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-danger" id="btn_delete" href="" style="color: #fff">Xóa</button>
    </div>
</form>