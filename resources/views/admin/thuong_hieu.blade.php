@extends('adminmaster')

@section('title')
    Xem Tất cả Thương hiệu
@endsection
@section('var')
    <?php
    $nav_active = 'thuong_hieu';
    ?>
@endsection
@section('unique-css')
    <link rel="stylesheet" href="{{ URL::asset('resources') }}/css/show_thuong_hieu.css">
@endsection

@include('admin.thuong_hieu_blocks.add')

@section('content')
    <div class="card shadow border-0 mb-7">
        <div class="card-header">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 data-url="{{ url('admin_ajax') }}/show_thuong_hieu" id="viewThuongHieu"
                                class="h2 mb-0 ls-tight">Bảng Thương hiệu</h1>
                        </div> <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <span class=" pe-2">
                                    <input class="btn d-inline-flex btn-sm btn-neutral border-base mx-1 "
                                        id="mySearchButton" type="text" name="" aria-describedby="helpId"
                                        placeholder="Tìm Thương hiệu..." style="width: 17vw">
                                </span>
                                <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1" 
                                data-bs-target="#addModalBrand"
                                data-bs-toggle="modal" id="addModalBrand">
                                    <i class="bi bi-plus"></i> </span> <span>Thêm thương hiệu</span> </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="danhSachThuongHieu" class="table display table-striped">
                <thead class="">

                    <tr>
                        <th scope="col">Tên thương hiệu</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col">Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danh_sach_thuong_hieu as $brand)
                        <tr>
                            <td>{{ $brand->ten_thuong_hieu }}</td>
                            <td>
                                <img src="{{ URL::asset('storage') }}/thuong_hieu/{{ $brand->logo }}" width="105vw"
                                    class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                    alt="">
                            </td>
                            <td>{{$brand->ghi_chu}}</td>
                            <td>
                                @if ($brand->trang_thai == 1)
                                    <span class="badge badge-lg badge-dot">
                                        <i class="bg-success"></i>Hiển thị
                                    </span>
                                @else
                                    <span class="badge badge-lg badge-dot">
                                        <i class="bg-danger"></i>Ẩn
                                    </span>
                                @endif

                            </td>
                            <td class="text-end">
                                {{-- //=================== Sửa =================== --}}
                                <button type="button" class="btn btn-sm btn-square btn-warning text-white-hover text-white"
                                    data-bs-toggle="modal" data-bs-target="#editModal-{{ $brand->ma_thuong_hieu }}">
                                    <i class="bi bi-pen"></i>
                                </button>


                                {{-- //=================== Xóa =================== --}}
                                <button type="button" id="deleteBrandButton"
                                    class="btn btn-sm btn-square btn-danger text-white-hover text-white"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $brand->ma_thuong_hieu }}"
                                    data-id="{{ $brand->ma_thuong_hieu }}">
                                    <i class="bi bi-trash"></i>
                                </button>

                                {{-- MODAL OF VIEW, EDIT, DELETE --}}
                                @include('admin.thuong_hieu_blocks.edit')
                                @include('admin.thuong_hieu_blocks.delete')

                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Tên thương hiệu</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Trạng thái</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer border-0 py-5">
            <span class="text-muted text-sm" id="tableInfo">
            </span>
        </div>
    </div>
@endsection

@section('unique-js')
    <script src="{{ URL::asset('resources') }}/js/show_thuong_hieu.js"></script>
@endsection
