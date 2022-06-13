<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VanBanDen extends Model
{
    protected $table = 'van_ban_den';

    protected $fillable = [
        'tenFileVanBan', 'soHieu', 'ngayBanHanh', 'moTa', 'ngayHetHieuLuc', 'maLoaiVB', 'maDonViGui'
    ];

    public function loaiVanBan() {
        return $this->belongsTo('App\Models\LoaiVanBan');
    }

    public function donViGui() {
        return $this->belongsTo('App\Models\DonVi');
    }

    public function VBDen_DVNhan() {
        return $this->hasMany('App\Models\VBDen_DVNhan');
    }
}
