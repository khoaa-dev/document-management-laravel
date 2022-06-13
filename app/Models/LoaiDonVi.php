<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiDonVi extends Model
{
    protected $table = 'loai_don_vi';

    protected $fillable = [
        'tenLoaiDV'
    ];

    public function donVi() {
        return $this->hasMany('App\Models\DonVi');
    }
}
