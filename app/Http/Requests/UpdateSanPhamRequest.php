<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSanPhamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->ma_nguoi_dang_bai == Auth::user()->id) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ten_san_pham' => "required|unique:san_pham,ten_san_pham,{$this->id},ma_san_pham|max:100",
            'ten_url' => "required|unique:san_pham,ten_url,{$this->id},ma_san_pham|max:120",
            'ma_thuong_hieu' => 'required|numeric',
            'ma_loai_san_pham' => 'required|numeric',
            'hinh1' => 'image|mimes:jpeg,png,jpg,gif|max:1000000',
            'hinh2' => 'image|mimes:jpeg,png,jpg,gif|max:1000000',
            'hinh3' => 'image|mimes:jpeg,png,jpg,gif|max:1000000',
            'he_dieu_hanh' => 'max:100',
            'sim' => 'max:100',
            'ram' => 'nullable|numeric',
            'bo_nho_trong' => 'nullable|numeric',
            'chip' => 'max:100',
            'camera_truoc' => 'max:50',
            'camera_sau' => 'max:100',
            'don_gia' => 'required|numeric',
            'ma_giam_gia' => 'nullable|numeric',
            'so_luong_ton' => 'required|numeric',
            'san_pham_kem_theo' => 'max:100',
            'ghi_chu' => 'max:255',
            'tom_tat_san_pham' => 'max:500',
            'chi_tiet_san_pham' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'unique' => ':attribute bị trùng lặp',
            // 'hinh1.required' => 'Vui lòng upload :attribute',
            'required' => 'Vui lòng nhập :attribute',
            'numeric' => ':attribute phải là chữ số',
            'hinh1.image' => 'File phải là :attribute',
            'hinh1.mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif',
            'hinh1.max' => ':attribute có dung lượng tối đa 1MB',
            'hinh2.image' => 'File phải là :attribute',
            'hinh2.mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif',
            'hinh2.max' => ':attribute có dung lượng tối đa 1MB',
            'hinh3.image' => 'File phải là :attribute',
            'hinh3.mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif',
            'hinh3.max' => ':attribute có dung lượng tối đa 1MB',
        ];
    }

    public function attributes()
    {
        return [
            'ten_san_pham' => 'Tên sản phẩm',
            'ten_url' => 'Tên URL',
            'ma_thuong_hieu' => 'Thương hiệu',
            'ma_loai_san_pham' => 'Loại sản phẩm',
            'hinh1' => 'Hình 1',
            'hinh2' => 'Hình 2',
            'hinh3' => 'Hình 3',
            'he_dieu_hanh' => 'Hệ điều hành',
            'sim' => 'SIM',
            'ram' => 'RAM',
            'bo_nho_trong' => 'Bộ nhớ trong',
            'chip' => 'Chip',
            'camera_truoc' => 'Camera trước',
            'camera_sau' => 'Camera sau',
            'don_gia' => 'Đơn giá',
            'ma_giam_gia' => 'Giảm giá',
            'so_luong_ton' => 'Số lượng tồn',
            'san_pham_kem_theo' => 'Sản phẩm kèm theo',
            'ghi_chu' => 'Ghi chú',
            'tom_tat_san_pham' => 'Tóm tắt sản phẩm',
            'chi_tiet_san_pham' => 'Chi tiết sản phẩm',
            'trang_thai' => 'Trạng thái',
        ];
    }
}
