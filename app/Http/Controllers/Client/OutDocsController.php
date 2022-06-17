<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiVanBan;
use App\Models\LoaiDonVi;
use App\Models\DonVi;

class OutDocsController extends Controller
{
    public function create() {
        $loaiVanBans = LoaiVanBan::all();
        $loaiDonVi = LoaiDonVi::all();


        return view('docs.outDocs.create')
                ->with('loaiVanBans', $loaiVanBans)
                ->with('loaiDonVis', $loaiDonVi);
    }

    public function getDonVi(Request $request) {
        $id = $request->id;
        $datas = DonVi::where('maLoaiDV', $id)->get();


        $output = "";

        foreach($datas as $data) {
            $output .= '
            <option value="'.$data->maDonVi.'">'.$data->tenDonVi.'</option>'; 
        }

        $datas = array(
            'data' => $output
        );

        return json_encode($datas);
    }
}
