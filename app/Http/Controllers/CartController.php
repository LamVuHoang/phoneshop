<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ChiTietHoaDonModel;
use App\Models\HoaDonModel;
use App\Models\SanPhamModel;
use Illuminate\Http\Request;
use App\Mail\CartMail;
use Illuminate\Support\Facades\Mail;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.shopping_cart');
    }

    public function add_to_cart(Request $request)
    {
        $id = $request->input('id_sp');
        $sp = SanPhamModel::where('ma_san_pham', $id)->first();

        Cart::add(
            $id,
            $sp->ten_san_pham,
            $request->input('quantity'),
            $sp->don_gia,
            [
                'hinh1' => $sp->hinh1,
            ]
        );

        return redirect()->back();
    }

    public function delete_item(string $rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function dat_hang()
    {
        if (!session('khach_hang')) {
            return redirect()->back()->with('shopping_cart_alert', __('you must sign in before checkout'));
        } else {
            //Hoa_don
            $hoa_don = new HoaDonModel;
            $hoa_don->ma_khach_hang = session('khach_hang')->ma_khach_hang;
            $hoa_don->tong_tien = Cart::subtotal(0, '', '');
            $hoa_don->tien_tra_truoc = 0;
            $hoa_don->con_lai = Cart::subtotal(0, '', '');
            $hoa_don->save();

            //Chi_tiet_hoa_don
            foreach (Cart::content() as $item) {
                $chi_tiet_hoa_don = new ChiTietHoaDonModel;
                $chi_tiet_hoa_don->ma_hoa_don = $hoa_don->id;
                $chi_tiet_hoa_don->ma_san_pham = $item->id;
                $chi_tiet_hoa_don->so_luong = $item->qty;
                $chi_tiet_hoa_don->don_gia = $item->price;
                $chi_tiet_hoa_don->save();
            }

            $this->sendEmail($hoa_don->id, session('khach_hang')->email);
            Cart::destroy();

            return redirect()->back()->with('shopping_cart_alert', __('order success, delivery within 3 days'));
        }
    }

    public function sendEmail($id, $email)
    {
        $chi_tiet_hoa_don = DB::table('chi_tiet_hoa_don')
            ->join('san_pham', 'san_pham.ma_san_pham', '=', 'chi_tiet_hoa_don.ma_san_pham')
            ->select(DB::raw('san_pham.ten_san_pham as item_name, chi_tiet_hoa_don.so_luong as qty, chi_tiet_hoa_don.don_gia as price'))
            ->where('ma_hoa_don', $id)->get();

        $details = [
            'title' => 'Đặt hàng',
            'body' => $chi_tiet_hoa_don,
        ];

        Mail::to($email)->send(new CartMail($details));
    }
}
