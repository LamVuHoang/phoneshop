<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPhamModel;
use App\Models\SanPhamModel;
use App\Models\ThuongHieuModel;
use Illuminate\Http\Request;
use Cart;

class SanPhamController extends Controller
{
    public function index()
    {
        $dssp = SanPhamModel::select('ma_san_pham', 'ten_san_pham', 'ten_url', 'hinh1', 'don_gia')
            ->where('so_luong_ton', '>', 0)->paginate(9);
        $quantity_dssp = SanPhamModel::where('so_luong_ton', '>', 0)->count();
        $maxamount = SanPhamModel::max('don_gia');
        return view('san_pham.san_pham_grid', [
            'dssp' => $dssp,
            'quantity_dssp' => $quantity_dssp,
            'maxamount' => $maxamount,

        ]);
    }

    public function chi_tiet_san_pham(string $ten_url)
    {
        $chi_tiet_sp = SanPhamModel::where('ten_url', $ten_url)->first();

        $id_sp = SanPhamModel::where('ten_url', '!=', $ten_url)->pluck('ma_san_pham');
        $id_random = $this->pick_random_id($id_sp, 4);
        $sp_lien_quan = [];
        foreach ($id_random as $val) {
            $sp = SanPhamModel::select('ten_san_pham', 'ten_url', 'don_gia', 'hinh1')
                ->where('ma_san_pham', $val)->first();
            array_push($sp_lien_quan, $sp);
        }

        return view('san_pham.single', [
            'chi_tiet_sp' => $chi_tiet_sp,
            'sp_lien_quan' => $sp_lien_quan,
        ]);
    }

    public function loai_san_pham(int $id)
    {
        $ten_loai_san_pham = LoaiSanPhamModel::select('ten_loai_san_pham')->where('ma_loai_san_pham', $id)->first();
        $dssp = SanPhamModel::select('ma_san_pham', 'ten_san_pham', 'ten_url', 'hinh1', 'don_gia')
            ->where('so_luong_ton', '>', 0)
            ->where('ma_loai_san_pham', $id)->paginate(9);
        $quantity_dssp = SanPhamModel::where('so_luong_ton', '>', 0)
            ->where('ma_loai_san_pham', $id)->count();
        $maxamount = SanPhamModel::max('don_gia');
        return view('san_pham.san_pham_grid', [
            'dssp' => $dssp,
            'quantity_dssp' => $quantity_dssp,
            'maxamount' => $maxamount,
            'special_title' => $ten_loai_san_pham->ten_loai_san_pham,
        ]);
    }

    public function thuong_hieu(int $id)
    {
        $ten_thuong_hieu = ThuongHieuModel::select('ten_thuong_hieu')->where('ma_thuong_hieu', $id)->first();
        $dssp = SanPhamModel::select('ma_san_pham', 'ten_san_pham', 'ten_url', 'hinh1', 'don_gia')
            ->where('so_luong_ton', '>', 0)
            ->where('ma_thuong_hieu', $id)->paginate(9);
        $quantity_dssp = SanPhamModel::where('so_luong_ton', '>', 0)
            ->where('ma_thuong_hieu', $id)->count();
        $maxamount = SanPhamModel::max('don_gia');
        return view('san_pham.san_pham_grid', [
            'dssp' => $dssp,
            'quantity_dssp' => $quantity_dssp,
            'maxamount' => $maxamount,
            'special_title' => $ten_thuong_hieu->ten_thuong_hieu,
        ]);
    }

    // public function tim_san_pham(Request $request)
    // {
    //     return $request->input('find_product');
    // }

    public function tim_san_pham(Request $request)
    {
        return redirect()->to("san-pham/ket-qua-tim-kiem/" . $request->input('find_product'));
    }

    public function ket_qua_tim_kiem(string $keyword)
    {
        $dssp = SanPhamModel::select('ma_san_pham', 'ten_san_pham', 'ten_url', 'hinh1', 'don_gia')
            ->where('so_luong_ton', '>', 0)
            ->where('ten_san_pham', 'like', "%".$keyword."%")->paginate(9);
        $quantity_dssp = SanPhamModel::where('so_luong_ton', '>', 0)
            ->where('ten_san_pham', 'like', "%".$keyword."%")->count();
        $maxamount = SanPhamModel::max('don_gia');
        return view('san_pham.san_pham_grid', [
            'dssp' => $dssp,
            'quantity_dssp' => $quantity_dssp,
            'maxamount' => $maxamount,
            'special_title' => $keyword,
        ]);
    }



    public function pick_random_id($protected_array, int $amount_of_element)
    {
        $new_id_sp = [];
        foreach ($protected_array as $val) {
            array_push($new_id_sp, $val);
        }
        $random_key = array_rand($new_id_sp, $amount_of_element);
        $id_random = [];
        foreach ($random_key as $keyValue) {
            array_push($id_random, $protected_array[$keyValue]);
        }
        return $id_random;
    }

    
}
