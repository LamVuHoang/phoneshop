<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPhamModel;
use App\Models\ThuongHieuModel;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show_san_pham()
    {
        $danh_sach_san_pham = SanPhamModel::orderBy('ma_san_pham', 'desc')->get();
        $danh_sach_thuong_hieu = ThuongHieuModel::pluck('ten_thuong_hieu');
        
        return view('admin.san_pham', [
            'danh_sach_san_pham' => $danh_sach_san_pham,
            'danh_sach_thuong_hieu' => $danh_sach_thuong_hieu,
        ]);
    }

    public function login()
    {
        return view('admin.login');
    }
    public function authenticate_login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect('quan-ly/sp-va-dh');
        } else {
            return redirect('admin/login')->with('alert', 'Login Failed');
        }
    }

    public function show_thuong_hieu()
    {
        $danh_sach_thuong_hieu = ThuongHieuModel::all();

        return view('admin.thuong_hieu', [
            'danh_sach_thuong_hieu' => $danh_sach_thuong_hieu,
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('admin/login');
    }
}
