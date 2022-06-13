<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CanBo extends Model
{
    protected $primaryKey = 'maCanBo';

    protected $table = 'can_bo';

    protected $fillable = [
        'maCanBo', 'matKhau', 'hoTen', 'ngaySinh', 'gioiTinh',
        'email', 'sdt', 'trangThai', 'maQuyen', 'maDonVi'
    ];

    public function phanQuyen () {
        return $this->beLongsto('App\Models\PhanQuyen');
    }
}
