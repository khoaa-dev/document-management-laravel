<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiVanBan;
use App\Models\LoaiDonVi;
use App\Models\DonVi;
use App\Models\VanBanDen;
use App\Models\VanBanDi;

class DocsController extends Controller
{
    public function vanBanDen() {
        $loaiVanBans = LoaiVanBan::all();
        $loaiDonVi = LoaiDonVi::all();
        $vanBanDens = VanBanDen::all();


        $i = 0;
        return view('docs.comeDocs.come-docs')
                ->with('loaiVanBans', $loaiVanBans)
                ->with('loaiDonVis', $loaiDonVi)
                ->with('vanBanDens', $vanBanDens)
                ->with('i', $i);
    }

    public function vanBanDi() {
        $loaiVanBans = LoaiVanBan::all();
        $loaiDonVi = LoaiDonVi::all();
        $vanBanDis = VanBanDi::all();

        $i = 0;

        return view('docs.outDocs.out-docs')
                ->with('loaiVanBans', $loaiVanBans)
                ->with('loaiDonVis', $loaiDonVi)
                ->with('vanBanDis', $vanBanDis)
                ->with('i', $i);
    }
}
