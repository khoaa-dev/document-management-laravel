



$(".btn_taoDanhSachNhan").on("click", function() {
    var _token = $('input[name="_token"]').val();
    $.ajax({
        url: "/document-management/init-session",
        // url: "{{ route('initSession') }}",
        method: "POST",
        data: {
            _token: _token
        },
        success: function(data) { //dữ liệu nhận về
        },
    });
});

//Load Ajax DonVi theo LoaiDonVi
$('#VBDi-loaiDonVi').on('change', function () {
    var id = $(this).val();
    var _token = $('input[name="_token"]').val();
    $('#VBDi-donVi').find('option').not(':first').remove();

    $.ajax({
        // url:"{{URL::to('/loaiDonVi-VBDen')}}",
        url:'/document-management/loaiDonVi-VBDen-tao',
        type:'POST',
        dataType:'JSON',
        data:{id:id, _token:_token},
        success:function (response) {
            $('#VBDi-donVi').html(response.data);
        }
    })
});