<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiVanBan extends Model
{
    protected $table = 'loai_van_ban';

    protected $fillable = [
        'tenLoaiVB', 'moTa'
    ];

    public function vanBanDi() {
        return $this->hasMany('App\Models\VanBanDi');
    }

    public function vanBanDen() {
        return $this->hasMany('App\Models\VanBanDen');
    }
}
