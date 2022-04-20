<?php

namespace App\Http\Controllers;

use App\Models\SanPhamModel;
use App\Models\ThuongHieuModel;
use Illuminate\Http\Request;
use App\Http\Requests\AddThuongHieuRequest;
// use Illuminate\Support\Facades\Validator;
use Validator;

class AjaxAdminController extends Controller
{
    // ========== SAN PHAM (PRODUCT) ==========
    public function view_san_pham(Request $request)
    {
        $chi_tiet_sp = SanPhamModel::where('ma_san_pham', $request->id)->first();

        echo json_encode($chi_tiet_sp);
    }

    public function destroy_san_pham(Request $request)
    {
        SanPhamModel::where('ma_san_pham', $request->id)->delete();
    }

    // // ========== THUONG HIEU (BRAND) ==========
    // public function show_thuong_hieu()
    // {
    //     $danh_sach_thuong_hieu = ThuongHieuModel::all();
    //     echo json_encode($danh_sach_thuong_hieu);
    // }

    public function thuong_hieu_co_sp(Request $request)
    {
        $thuong_hieu_co_sp = SanPhamModel::select('ten_san_pham', 'hinh1', 'he_dieu_hanh', 'trang_thai')
            ->where('ma_thuong_hieu', $request->id)->get();


        echo json_encode($thuong_hieu_co_sp);
    }

    public function add_thuong_hieu(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nameBrand' => 'required|distinct|max:100',
            'statusBrand' => 'numeric',
            'logoBrand' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $statusBrand = 0;
        if ($request->input('statusBrand')) {
            $statusBrand = 1;
        }

        if ($validator->passes()) {

            //Image
            if ($request->hasFile('logoBrand')) {
                if ($request->file('logoBrand')->isValid()) {
                    $image_name = $request->file('logoBrand')->getClientOriginalName();
                    $request->file('logoBrand')->move(storage_path('thuong_hieu'), $image_name);
                }
            }

            //Database
            $thuong_hieu = new ThuongHieuModel();

            $thuong_hieu->ten_thuong_hieu = $request->input('nameBrand');
            $thuong_hieu->logo = $image_name;
            $thuong_hieu->trang_thai = $statusBrand;

            if ($request->input('noteBrand')) {
                $thuong_hieu->ghi_chu = $request->input('noteBrand');
            }

            $thuong_hieu->save();

            return response()->json([
                'status' => 200,
                'success' => 'Added new records.',
            ]);
        }

        return response()->json([
            'status' => 400,
            'error' => $validator->errors()->all(),
        ]);
    }

    public function xoa_thuong_hieu(Request $request)
    {
        ThuongHieuModel::where('ma_thuong_hieu', $request->id)->delete();
    }
}
