<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiVanBan;
use App\Models\LoaiDonVi;

class ComeDocsController extends Controller
{
    public function create() {
        $loaiVanBans = LoaiVanBan::all();
        $loaiDonVi = LoaiDonVi::all();


        return view('docs.comeDocs.create')
                ->with('loaiVanBans', $loaiVanBans)
                ->with('loaiDonVis', $loaiDonVi);
    }
}
