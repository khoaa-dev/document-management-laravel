<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    protected $table = 'don_vi';

    protected $fillable = [
        'tenDonVi', 'moTa', 'maLoaiDV'
    ];

    public function loaiDonVi() {
        return $this->belongsTo('App\Models\LoaiDonVi');
    }

    public function VBDen_DVNhan() {
        return $this->hasMany('App\Models\VBDen_DVNhan');
    }

    public function VBDi_DVNhan() {
        return $this->hasMany('App\Models\VBDi_DVNhan');
    }
}
