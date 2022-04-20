<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSanPhamRequest;
use App\Http\Requests\UpdateSanPhamRequest;
use App\Models\GiamGiaModel;
use Illuminate\Http\Request;
use App\Models\SanPhamModel;
use App\Models\ThuongHieuModel;
use Illuminate\Support\Facades\Auth;

class AdminSanPhamController extends Controller
{
    public function index()
    {
        $danh_sach_san_pham = SanPhamModel::orderBy('ma_san_pham', 'desc')->get();
        return view('admin.san_pham_blocks.show_san_pham', [
            'danh_sach_san_pham' => $danh_sach_san_pham,
        ]);
    }

    public function view_san_pham(int $id)
    {
        $san_pham_chi_tiet = SanPhamModel::where('ma_san_pham', $id)->first();
        $thuong_hieu = ThuongHieuModel::select('ma_thuong_hieu', 'ten_thuong_hieu')
            ->where('trang_thai', 1)->get();
        $giam_gia = GiamGiaModel::select('ma_giam_gia', 'code_giam_gia', 'so_tien_giam_gia', 'trang_thai', 'thoi_gian_bat_dau', 'thoi_gian_ket_thuc')
            ->get();
        return view('admin.san_pham_blocks.view_san_pham', [
            'thuong_hieu' => $thuong_hieu,
            'giam_gia' => $giam_gia,
            'san_pham_chi_tiet' => $san_pham_chi_tiet,
        ]);
    }

    public function create()
    {
        $thuong_hieu = ThuongHieuModel::select('ma_thuong_hieu', 'ten_thuong_hieu')
            ->where('trang_thai', 1)->get();
        $giam_gia = GiamGiaModel::select('ma_giam_gia', 'code_giam_gia', 'so_tien_giam_gia', 'trang_thai', 'thoi_gian_bat_dau', 'thoi_gian_ket_thuc')
            ->get();
        return view('admin.san_pham_blocks.san_pham_form', [
            'thuong_hieu' => $thuong_hieu,
            'giam_gia' => $giam_gia,
        ]);
    }



    public function store(StoreSanPhamRequest $request)
    {
        $request->validated();

        //Xử lý Hình Ảnh
        if ($request->hasFile('hinh1')) {
            if ($request->file('hinh1')->isValid()) {
                $image_name1 = $request->file('hinh1')->getClientOriginalName();
                $request->file('hinh1')->move(storage_path('san_pham'), $image_name1);
            }
        }

        if ($request->hasFile('hinh2')) {
            if ($request->file('hinh2')->isValid()) {
                $image_name2 = $request->file('hinh2')->getClientOriginalName();
                $request->file('hinh2')->move(storage_path('san_pham'), $image_name2);
            }
        }

        if ($request->hasFile('hinh3')) {
            if ($request->file('hinh3')->isValid()) {
                $image_name3 = $request->file('hinh3')->getClientOriginalName();
                $request->file('hinh3')->move(storage_path('san_pham'), $image_name3);
            }
        }

        //Xử lý Mysql
        $san_pham = new SanPhamModel;
        $san_pham->ten_san_pham = $request->input('ten_san_pham');
        $san_pham->ten_url = $request->input('ten_url');
        $san_pham->ma_thuong_hieu = $request->input('ma_thuong_hieu');
        $san_pham->ma_loai_san_pham = $request->input('ma_loai_san_pham');

        $san_pham->hinh1 = $image_name1;
        if ($request->has('hinh2')) {
            $san_pham->hinh2 = $image_name2;
        }
        if ($request->has('hinh3')) {
            $san_pham->hinh3 = $image_name3;
        }
        if ($request->has('he_dieu_hanh')) {
            $san_pham->he_dieu_hanh = $request->input('he_dieu_hanh');
        }

        if ($request->has('sim')) {
            $san_pham->sim = $request->input('sim');
        }
        if ($request->has('ram')) {
            $san_pham->ram = $request->input('ram');
        }
        if ($request->has('bo_nho_trong')) {
            $san_pham->bo_nho_trong = $request->input('bo_nho_trong');
        }
        if ($request->has('chip')) {
            $san_pham->chip = $request->input('chip');
        }
        if ($request->has('camera_truoc')) {
            $san_pham->camera_truoc = $request->input('camera_truoc');
        }

        if ($request->has('camera_sau')) {
            $san_pham->camera_sau = $request->input('camera_sau');
        }
        if ($request->has('ma_giam_gia')) {
            $san_pham->ma_giam_gia = $request->input('ma_giam_gia');
        }
        if ($request->has('san_pham_kem_theo')) {
            $san_pham->san_pham_kem_theo = $request->input('san_pham_kem_theo');
        }
        if ($request->has('ghi_chu')) {
            $san_pham->ghi_chu = $request->input('ghi_chu');
        }
        if ($request->has('tom_tat_san_pham')) {
            $san_pham->tom_tat_san_pham = $request->input('tom_tat_san_pham');
        }

        if ($request->has('trang_thai')) {
            $san_pham->trang_thai = 1;
        } else {
            $san_pham->trang_thai = 0;
        }

        $san_pham->don_gia = $request->input('don_gia');
        $san_pham->so_luong_ton = $request->input('so_luong_ton');
        $san_pham->chi_tiet_san_pham = $request->input('chi_tiet_san_pham');
        $san_pham->ma_nguoi_dang_bai = Auth::user()->id;
        $result = $san_pham->save();

        if ($result == 1) {
            return redirect()->back()->with('alert', '<div class="alert alert-success">Lưu Sản phẩm thành công</div>');
        } else {
            return redirect()->back()->with('alert', '<div class="alert alert-danger">Lưu Sản phẩm thất bại</div>');
        }
    }

    public function modify(int $id)
    {
        $san_pham_chi_tiet = SanPhamModel::where('ma_san_pham', $id)->first();
        $thuong_hieu = ThuongHieuModel::select('ma_thuong_hieu', 'ten_thuong_hieu')
            ->where('trang_thai', 1)->get();
        $giam_gia = GiamGiaModel::select('ma_giam_gia', 'code_giam_gia', 'so_tien_giam_gia', 'trang_thai', 'thoi_gian_bat_dau', 'thoi_gian_ket_thuc')
            ->get();
        return view('admin.san_pham_blocks.san_pham_form', [
            'thuong_hieu' => $thuong_hieu,
            'giam_gia' => $giam_gia,
            'san_pham_chi_tiet' => $san_pham_chi_tiet,
        ]);
    }

    public function update(int $ma_san_pham, UpdateSanPhamRequest $request)
    {
        $old_sp = SanPhamModel::where('ma_san_pham', $ma_san_pham)->first();
        $request->validated();

        //Xử lý Mysql
        $san_pham = SanPhamModel::find($ma_san_pham);
        $san_pham->ten_san_pham = $request->input('ten_san_pham');
        $san_pham->ten_url = $request->input('ten_url');
        $san_pham->ma_thuong_hieu = $request->input('ma_thuong_hieu');
        $san_pham->ma_loai_san_pham = $request->input('ma_loai_san_pham');

        if ($request->has('hinh1')) {
            if ($request->file('hinh1')->isValid()) {
                $image_name1 = $request->file('hinh1')->getClientOriginalName();
                $request->file('hinh1')->move(storage_path('san_pham'), $image_name1);
            }
            $san_pham->hinh1 = $image_name1;
        }
        if ($request->has('hinh2')) {
            if ($request->file('hinh2')->isValid()) {
                $image_name2 = $request->file('hinh2')->getClientOriginalName();
                $request->file('hinh2')->move(storage_path('san_pham'), $image_name2);
            }
            $san_pham->hinh2 = $image_name2;
        }
        if ($request->has('hinh3')) {
            if ($request->file('hinh3')->isValid()) {
                $image_name3 = $request->file('hinh3')->getClientOriginalName();
                $request->file('hinh3')->move(storage_path('san_pham'), $image_name3);
            }
            $san_pham->hinh3 = $image_name3;
        }
        if ($request->has('he_dieu_hanh') || $request->input('he_dieu_hanh') != $old_sp->he_dieu_hanh) {
            $san_pham->he_dieu_hanh = $request->input('he_dieu_hanh');
        }

        if ($request->has('sim') || $request->input('sim') != $old_sp->sim) {
            $san_pham->sim = $request->input('sim');
        }
        if ($request->has('ram') || $request->input('ram') != $old_sp->ram) {
            $san_pham->ram = $request->input('ram');
        }
        if ($request->has('bo_nho_trong') || $request->input('bo_nho_trong') != $old_sp->bo_nho_trong) {
            $san_pham->bo_nho_trong = $request->input('bo_nho_trong');
        }
        if ($request->has('chip') || $request->input('chip') != $old_sp->chip) {
            $san_pham->chip = $request->input('chip');
        }
        if ($request->has('camera_truoc') || $request->input('camera_truoc') != $old_sp->camera_truoc) {
            $san_pham->camera_truoc = $request->input('camera_truoc');
        }

        if ($request->has('camera_sau') || $request->input('camera_sau') != $old_sp->camera_sau) {
            $san_pham->camera_sau = $request->input('camera_sau');
        }
        if ($request->has('ma_giam_gia') || $request->input('ma_giam_gia') != $old_sp->ma_giam_gia) {
            $san_pham->ma_giam_gia = $request->input('ma_giam_gia');
        }
        if ($request->has('san_pham_kem_theo') || $request->input('san_pham_kem_theo') != $old_sp->san_pham_kem_theo) {
            $san_pham->san_pham_kem_theo = $request->input('san_pham_kem_theo');
        }
        if ($request->has('ghi_chu') || $request->input('ghi_chu') != $old_sp->ghi_chu) {
            $san_pham->ghi_chu = $request->input('ghi_chu');
        }
        if ($request->has('tom_tat_san_pham') || $request->input('tom_tat_san_pham') != $old_sp->tom_tat_san_pham) {
            $san_pham->tom_tat_san_pham = $request->input('tom_tat_san_pham');
        }

        if ($request->has('trang_thai')) {
            $san_pham->trang_thai = 1;
        } else {
            $san_pham->trang_thai = 0;
        }

        $san_pham->don_gia = $request->input('don_gia');
        $san_pham->so_luong_ton = $request->input('so_luong_ton');
        $san_pham->chi_tiet_san_pham = $request->input('chi_tiet_san_pham');
        $result = $san_pham->save();

        if ($result == 1) {
            return redirect()->back()->with('alert', '<div class="alert alert-success">Cập nhật Sản phẩm thành công</div>');
        } else {
            return redirect()->back()->with('alert', '<div class="alert alert-danger">Cập nhật Sản phẩm thất bại</div>');
        }
    }

    public function destroy($id)
    {
        $task = SanPhamModel::find($id);
        $task->delete();
        return redirect()->back()->with('success', "Xóa bảng có mã $id thành công");
    }
}
