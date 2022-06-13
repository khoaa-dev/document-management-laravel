<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    protected $table = 'phan_quyen';

    protected $fillable = [
        'tenQuyen'
    ];

    public function canBo () {
        return $this->hasMany('App\Models\CanBo');
    }
}
