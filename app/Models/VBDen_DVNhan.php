<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VBDen_DVNhan extends Model
{
    protected $table = 'VBDen_DVNhan';

    protected $fillable = [
        'maVanBanDen', 'maDonViNhan', 'trangThai', 'ngayGuiThongBao', 'ngayCapNhat'
    ];

    public function vanBanDen () {
        return $this->beLongsto('App\Models\VanBanDen');
    }

    public function donViNhan () {
        return $this->beLongsto('App\Models\DonVi');
    }
}
