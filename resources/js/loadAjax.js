$('#loaiDonVi').on('change', function () {
    var id = $(this).val();
    var _token = $('input[name="_token"]').val();
    $('#donVi').find('option').not(':first').remove();

    $.ajax({
        // url:"{{URL::to('/loaiDonVi-VBDen')}}",
        url:'/document-management/loaiDonVi-VBDen',
        type:'POST',
        dataType:'JSON',
        data:{id:id, _token:_token},
        success:function (response) {
            $('#donVi').html(response.data);
        }
    })
});

$('#loaiDonVi-tao').on('change', function () {
    var id = $(this).val();
    var _token = $('input[name="_token"]').val();
    $('#donVi-tao').find('option').not(':first').remove();

    $.ajax({
        // url:"{{URL::to('/loaiDonVi-VBDen')}}",
        url:'/document-management/loaiDonVi-VBDen-tao',
        type:'POST',
        dataType:'JSON',
        data:{id:id, _token:_token},
        success:function (response) {
            $('#donVi-tao').html(response.data);
        }
    })
});

//Van Ban Di
$('#loaiDonVi-VBDi').on('change', function () {
    var id = $(this).val();
    var _token = $('input[name="_token"]').val();
    $('#donVi-VBDi').find('option').not(':first').remove();

    $.ajax({
        url:'/document-management/loaiDonVi-VBDi',
        type:'POST',
        dataType:'JSON',
        data:{id:id, _token:_token},
        success:function (response) {
            $('#donVi-VBDi').html(response.data);
        }
    })
});