<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VanBanDi extends Model
{
    protected $table = 'van_ban_di';

    protected $fillable = [
        'tenFileVanBan', 'soHieu', 'ngayBanHanh', 'moTa', 'ngayHetHieuLuc', 'maLoaiVB', 'maDonViGui'
    ];

    public function loaiVanBan() {
        return $this->belongsTo('App\Models\LoaiVanBan');
    }

    public function donViGui() {
        return $this->belongsTo('App\Models\DonVi');
    }

    public function VBDi_DVNhan() {
        return $this->hasMany('App\Models\VBDi_DVNhan');
    }
}
