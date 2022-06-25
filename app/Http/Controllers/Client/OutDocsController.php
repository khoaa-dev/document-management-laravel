<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiVanBan;
use App\Models\LoaiDonVi;
use App\Models\DonVi;
use App\Models\VanBanDi;
use App\Models\VBDi_DVNhan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Nette\Utils\Arrays;

class OutDocsController extends Controller
{
    public function create() {
        $loaiVanBans = LoaiVanBan::all();
        $loaiDonVi = LoaiDonVi::all();
        $donVis = DonVi::all();

        $i = 0;

        return view('docs.outDocs.create')
                ->with('loaiVanBans', $loaiVanBans)
                ->with('loaiDonVis', $loaiDonVi)
                ->with('donVis', $donVis)
                ->with('i', $i);
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


    public function store(Request $request) {
        $ngayBanHanh = Carbon::createFromFormat('m/d/Y', $request->ngayBanHanh)->format('Y-m-d');
        $ngayHetHieuLuc = Carbon::createFromFormat('m/d/Y', $request->ngayHetHieuLuc)->format('Y-m-d');
        $vanBanDi = new VanBanDi;
        if($request->hasFile('tenFileVanBan')) {
            $file = $request->file('tenFileVanBan');
            $fileName = $file->getClientOriginalName();
            $file->move('public/files/', $fileName);
            $vanBanDi->tenFileVanBan = $fileName;
        }
        $vanBanDi->soHieu = $request->input('soHieu');
        $vanBanDi->ngayBanHanh = $ngayBanHanh;
        $vanBanDi->moTa = $request->input('moTa');
        $vanBanDi->ngayHetHieuLuc = $ngayHetHieuLuc;
        $vanBanDi->maLoaiVB = $request->input('loaiVanBan');
        $vanBanDi->maDonViGui = $request->input('VBDi-donVi');
        $vanBanDi->save();

        $last_vanBanDi = DB::table('van_ban_di')->orderBy('created_at', 'desc')->first();

        $maDonVis = Session::get('maDonVis', []);
        foreach ($maDonVis as $maDonVi) {
            $VBDi_DVNhan = new VBDi_DVNhan;
            $VBDi_DVNhan->maVanBanDi = $last_vanBanDi->maVanBanDi;
            $VBDi_DVNhan->maDonViNhan = $maDonVi;
            $VBDi_DVNhan->trangThai = 0;
            $VBDi_DVNhan->ngayGuiThongBao = $ngayBanHanh;
            $VBDi_DVNhan->ngayCapNhat = null;
            $VBDi_DVNhan->save();
        }

        return back()->with('status', 'Thêm văn bản đi thành công!');
    }

    public function loadDanhSach(Request $request) {
        $id = $request->id;
        $datas = DonVi::where('maLoaiDV', $id)->get();
        $output = "";

        $i = 0;

        foreach($datas as $data) {
            $output .= '
            <tr>
                <th scope="row">'.++$i.'</th>
                <td>'.$data->tenDonVi.'</td>
                <td>
                    <input class="form-check-input donVi_checkbox" type="checkbox" 
                    value="'.$data->maDonVi.'"/>
                </td>
            </tr>'; 
        }

        $datas = array(
            'data' => $output
        );

        return json_encode($datas);
    }

    public function initSession() {
        Session::forget('maDonVis');

        $maDonVis = new Arrays();
        Session::put('maDonVis', $maDonVis);
    }

    public function addDonVi(Request $request) {
        $maDonVi = $request->maDonVi;

        Session::push('maDonVis', $maDonVi);
        $maDonVis = Session::get('maDonVis');

        return $maDonVis;
    }

    public function removeDonVi(Request $request) {
        $maDonVi = $request->maDonVi;

        if (Session::has('maDonVis')) {
            $maDonVis = Session::pull('maDonVis', $maDonVi);

            if (($key = array_search($maDonVi, $maDonVis)) !== false) {
                unset($maDonVis[$key]);
            }

            Session::put('maDonVis', $maDonVis);
        }

        $maDonVis = Session::get('maDonVis');

        return $maDonVis;
    }

    public function loadAjaxDonVi(Request $request) {
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

    public function detail($id) {
        $maVanBanDi = $id;
        $vanBanDi = DB::table('van_ban_di')->where('maVanBanDi', '=', $maVanBanDi)
                        ->first();
        $ngayBanHanh = Carbon::createFromFormat('Y-m-d', $vanBanDi->ngayBanHanh)->format('m/d/Y');
        $ngayHetHieuLuc = Carbon::createFromFormat('Y-m-d', $vanBanDi->ngayHetHieuLuc)->format('m/d/Y');

        $loaiVanBan = DB::table('loai_van_ban')->where('maLoaiVB', '=', $vanBanDi->maLoaiVB)
                        ->first();
        $donVi = DB::table('don_vi')->where('maDonVi', '=', $vanBanDi->maDonViGui)
                        ->first();
        $loaiDonVi = DB::table('loai_don_vi')->where('maLoaiDV', '=', $donVi->maLoaiDV)
                        ->first();
        $loaiVanBans = LoaiVanBan::all();
        $VBDi_DVNhans = DB::table('vbdi_dvnhan')
                            ->join('don_vi', 'vbdi_dvnhan.maDonViNhan', '=', 'don_vi.maDonVi')
                            ->select('don_vi.tenDonVi', 'vbdi_dvnhan.trangThai', 'vbdi_dvnhan.maDonViNhan')
                            ->where('maVanBanDi', '=', $vanBanDi->maVanBanDi)
                            ->get();
        $i = 0;

        //Init session
        Session::forget('maDonVis');
        $maDonVis = [];
        Session::put('maDonVis', $maDonVis);

        return view('docs.outDocs.detail')->with('vanBanDi', $vanBanDi)
                                            ->with('loaiVanBan', $loaiVanBan)
                                            ->with('loaiVanBans', $loaiVanBans)
                                            ->with('donVi', $donVi)
                                            ->with('loaiDonVi', $loaiDonVi)
                                            ->with('VBDi_DVNhans', $VBDi_DVNhans)
                                            ->with('ngayBanHanh', $ngayBanHanh)
                                            ->with('ngayHetHieuLuc', $ngayHetHieuLuc)
                                            ->with('i', $i);
    }

    public function update(Request $request, $id) {
        $ngayBanHanh = Carbon::createFromFormat('m/d/Y', $request->ngayBanHanh_update)->format('Y-m-d');
        $ngayHetHieuLuc = Carbon::createFromFormat('m/d/Y', $request->ngayHetHieuLuc_update)->format('Y-m-d');

        $ngayCapNhat = Carbon::now();
        $ngayCapNhat = Carbon::createFromFormat('Y-m-d H:i:s', $ngayCapNhat)->format('Y-m-d');
        $vanBanDi = VanBanDi::where('maVanBanDi', '=', $id)
                            ->first();

        if($request->hasFile('tenFileVanBan')) {
            $file = $request->file('tenFileVanBan');
            $fileName = $file->getClientOriginalName();
            $file->move('public/files/', $fileName);
            $vanBanDi->tenFileVanBan = $fileName;
            DB::table('van_ban_di')->where('maVanBanDi', '=', $id)
                                ->update(['tenFileVanBan' => $fileName]);
        }
        
        $vanBanDi->soHieu = $request->input('soHieu');
        $vanBanDi->ngayBanHanh = $ngayBanHanh;
        $vanBanDi->moTa = $request->input('moTa');
        $vanBanDi->ngayHetHieuLuc = $ngayHetHieuLuc;
        $vanBanDi->maLoaiVB = $request->input('loaiVanBan');
        $vanBanDi->maDonViGui = $request->input('VBDi-donVi');
        

        DB::table('van_ban_di')->where('maVanBanDi', '=', $id)
                                ->update([
                                    'soHieu' => $vanBanDi->soHieu,
                                    'ngayBanHanh' => $vanBanDi->ngayBanHanh,
                                    'moTa' => $vanBanDi->moTa,
                                    'ngayHetHieuLuc' => $vanBanDi->ngayHetHieuLuc,
                                    'maLoaiVB' => $vanBanDi->maLoaiVB,
                                    'maDonViGui' => $vanBanDi->maDonViGui
                                ]);

        $maDonVis = Session::get('maDonVis', []);
        $VBDi_DVNhans = DB::table('vbdi_dvnhan')
                            ->where('maVanBanDi', '=', $id)
                            ->get();
        foreach ($VBDi_DVNhans as $VBDi_DVNhan) {
            foreach($maDonVis as $maDonVi) {
                if($maDonVi == $VBDi_DVNhan->maDonViNhan) {
                    $VBDi_DVNhan = VBDi_DVNhan::where('maVanBanDi', $id)->where('maDonViNhan', $maDonVi)->first();
                    $VBDi_DVNhan->trangThai = 1;
                    $VBDi_DVNhan->ngayCapNhat = $ngayCapNhat;

                    DB::table('vbdi_dvnhan')->where('maVanBanDi', '=', $id)->where('maDonViNhan', $maDonVi)
                                ->update([
                                    'trangThai' => 1,
                                    'ngayCapNhat' => $VBDi_DVNhan->ngayCapNhat
                                ]);
                }
            };
            
        }

        return back()->with('status', 'Cập nhật văn bản thành công!');
    }   

    public function delete($id) {
        $vanBanDi = DB::table('van_ban_di')
                        ->where('maVanBanDi', '=', $id)
                        ->first();
        return view('docs.outDocs.delete')->with('vanBanDi', $vanBanDi);
    }

    public function destroy($id) {
        DB::table('van_ban_di')
                        ->where('maVanBanDi', '=', $id)
                        ->delete();
        
        return back();
    }

    public function filterLoaiVB(Request $request) {
        $maLoaiVB = $request->maLoaiVB;
        $vanBanDis = DB::table('van_ban_di')->where('maLoaiVB', '=', $maLoaiVB)->get();
        // $datas = DonVi::where('maLoaiDV', $id)->get();
        $output = "";

        $i = 0;

        foreach($vanBanDis as $vanBanDi) {
            $output .= '
            <tr style="text-align: center">
                <th scope="row">'.++$i.'</th>
                <td>'.$vanBanDi->tenFileVanBan.'</td>
                <td>'.$vanBanDi->ngayBanHanh.'</td>
                <td>'.$vanBanDi->ngayHetHieuLuc.'</td>
                <td>
                    <a class="btn btn-info text-light" href="detail/'.$vanBanDi->maVanBanDi.'">Xem chi tiết</a>
                    <a class="btn btn-danger" id="deleteButton" data-attr="deleteView/'.$vanBanDi->maVanBanDi.') }}" data-target="#myModal" data-toggle="modal">Xóa</a>
                </td>
            </tr>';
        }

        $datas = array(
            'data' => $output
        );

        return json_encode($datas);
    }

    public function filterDonViGui(Request $request) {
        $maDonViGui = $request->maDonViGui;
        $vanBanDis = DB::table('van_ban_di')->where('maDonViGui', '=', $maDonViGui)->get();
        $output = "";

        $i = 0;

        foreach($vanBanDis as $vanBanDi) {
            $output .= '
            <tr style="text-align: center">
                <th scope="row">'.++$i.'</th>
                <td>'.$vanBanDi->tenFileVanBan.'</td>
                <td>'.$vanBanDi->ngayBanHanh.'</td>
                <td>'.$vanBanDi->ngayHetHieuLuc.'</td>
                <td>
                    <a class="btn btn-info text-light" href="detail/'.$vanBanDi->maVanBanDi.'">Xem chi tiết</a>
                    <a class="btn btn-danger" id="deleteButton" data-attr="deleteView/'.$vanBanDi->maVanBanDi.') }}" data-target="#myModal" data-toggle="modal">Xóa</a>
                </td>
            </tr>';
        }

        $datas = array(
            'data' => $output
        );

        return json_encode($datas);
    }

    public function filterToDate(Request $request) {
        $fromDate = Carbon::createFromFormat('m/d/Y', $request->fromDate)->format('Y-m-d');
        $toDate = Carbon::createFromFormat('m/d/Y', $request->toDate)->format('Y-m-d');

        $vanBanDis = DB::table('van_ban_di')->whereBetween('ngayBanHanh', [$fromDate, $toDate])->get();
        // return json_encode($vanBanDis);
        $output = "";

        $i = 0;

        foreach($vanBanDis as $vanBanDi) {
            $output .= '
            <tr style="text-align: center">
                <th scope="row">'.++$i.'</th>
                <td>'.$vanBanDi->tenFileVanBan.'</td>
                <td>'.$vanBanDi->ngayBanHanh.'</td>
                <td>'.$vanBanDi->ngayHetHieuLuc.'</td>
                <td>
                    <a class="btn btn-info text-light" href="detail/'.$vanBanDi->maVanBanDi.'">Xem chi tiết</a>
                    <a class="btn btn-danger" id="deleteButton" data-attr="deleteView/'.$vanBanDi->maVanBanDi.') }}" data-target="#myModal" data-toggle="modal">Xóa</a>
                </td>
            </tr>';
        }

        $datas = array(
            'data' => $output
        );

        return json_encode($datas);
    }
}
