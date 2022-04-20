<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDonHangController extends Controller
{
    public function index()
    {
        $danh_sach_don_hang = DB::table('hoa_don')
        ->join('khach_hang', 'khach_hang.ma_khach_hang', '=', 'hoa_don.ma_khach_hang')
        ->select(DB::raw('hoa_don.ma_hoa_don as mhd, concat(khach_hang.ho_kh, " ", khach_hang.ten_kh) as ten_khach_hang, hoa_don.tong_tien as money, hoa_don.con_lai as left_money, hoa_don.ma_trang_thai_hoa_don'))
        ->orderBy('hoa_don.created_at', 'asc')->get();
        $trang_thai_hoa_don = DB::table('trang_thai_hoa_don')->get();

        return view('admin.don_hang_blocks.show_hoa_don', [
            'danh_sach_don_hang' => $danh_sach_don_hang,
            'trang_thai_hoa_don' => $trang_thai_hoa_don,
        ]);
    }
}
