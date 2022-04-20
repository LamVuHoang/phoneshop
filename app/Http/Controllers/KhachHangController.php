<?php

namespace App\Http\Controllers;

use App\Models\KhachHangModel;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function login()
    {
        return view('customerlogin');
    }

    public function authenticate_customer(Request $request)
    {
        if ($request->input('LoginButton')) {
            $email = $request->input('email');
            $khach_hang = KhachHangModel::where('email', $email)->first();
            if ($khach_hang != null) {
                if (crypt($request->input('password'), $khach_hang->password) === $khach_hang->password) {
                    $request->session()->put('khach_hang', $khach_hang);
                    return redirect()->to('/');
                } else {
                    $login_error = 'Mật khẩu sai';
                }
            } else {
                $login_error = 'Khách hàng chưa Đăng ký';
            }
        } else if ($request->input('ResetPasswordButton')) {
            $login_error = 'ResetPasswordButton';
        }

        return redirect()->back()->with('alert',    $login_error);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('khach_hang');

        return redirect()->back();
    }
}
