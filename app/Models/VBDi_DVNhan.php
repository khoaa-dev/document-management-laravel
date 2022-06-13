<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VBDi_DVNhan extends Model
{
    protected $table = 'VBDi_DVNhan';

    protected $fillable = [
        'maVanBanDi', 'maDonViNhan', 'trangThai', 'ngayGuiThongBao', 'ngayCapNhat'
    ];

    public function vanBanDi () {
        return $this->beLongsto('App\Models\VanBanDi');
    }

    public function donViNhan () {
        return $this->beLongsto('App\Models\DonVi');
    }
}
