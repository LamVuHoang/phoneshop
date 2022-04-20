<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use App\Models\SanPhamModel;
use App\Models\ThuongHieuModel;
use App\Models\TinTucModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banner1 = BannerModel::where('vi_tri', 1)->first();
        $banner2 = BannerModel::where('vi_tri', 2)->first();
        $banner3 = BannerModel::where('vi_tri', 3)->first();

        $tin_tuc_id = TinTucModel::pluck('id');
        $random_id = $this->pick_random_id($tin_tuc_id, 3);
        $tin_tuc = [];
        foreach($random_id as $val) {
            $tt = TinTucModel::select('id', 'tieu_de', 'tom_tat', 'hinh', 'created_at')->where('id', $val)->first();
            array_push($tin_tuc, $tt);
        }

        $android_id = SanPhamModel::where('ma_loai_san_pham', 1)
        ->where('so_luong_ton', '>', 0)->pluck('ma_san_pham');
        $random_android_id = $this->pick_random_id($android_id, 8);
        $android = [];
        foreach($random_android_id as $val) {
            $sp = SanPhamModel::select('ma_san_pham', 'ten_san_pham', 'ten_url', 'hinh1', 'don_gia')
            ->where('ma_san_pham', $val)->first();
            array_push($android, $sp);
        }

        $iphone = SanPhamModel::select('ma_san_pham', 'ten_san_pham', 'ten_url', 'hinh1', 'don_gia')
        ->where('ma_loai_san_pham', 2)->get();

        return view('home.index', [
            'banner1' => $banner1,
            'banner2' => $banner2,
            'banner3' => $banner3,
            'tin_tuc' => $tin_tuc,
            'android' => $android,
            'iphone' => $iphone,
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
