@extends('adminmaster')

@section('title')
    Xem Tất cả Sản phẩm
@endsection
@section('var')
    <?php
    $nav_active = 'san_pham';
    ?>
@endsection

@section('unique-css')
    <link rel="stylesheet" href="{{ URL::asset('resources') }}/css/show_san_pham.css">
@endsection

@include('admin.san_pham_blocks.add_san_pham')

@section('content')
    <div class="card shadow border-0 mb-7">
        <div class="card-header">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 id="viewThuongHieu" class="h2 mb-0 ls-tight">Bảng Sản phẩm</h1>
                        </div> <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <span class=" pe-2">
                                    <input class="btn d-inline-flex btn-sm btn-neutral border-base mx-1 "
                                        id="mySearchButton" type="text" name="" aria-describedby="helpId"
                                        placeholder="Tìm Sản phẩm..." style="width: 17vw">
                                </span>
                                <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <i class="bi bi-plus"></i> </span> <span>Thêm Sản phẩm</span> </a>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="danhSachSP" class="table display table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình</th>
                        <th>Hệ điều hành</th>
                        <th>Ngày đăng sản phẩm</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danh_sach_san_pham as $sp)
                        <tr>
                            <td>{{ $sp->ten_san_pham }}</td>
                            <td>
                                <img src="{{ URL::asset('storage') }}/san_pham/{{ $sp->hinh1 }}"
                                    class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                    alt="">
                            </td>
                            <td>{{ $sp->he_dieu_hanh }}</td>
                            <td>{{ $sp->created_at }}</td>
                            <td>
                                @if ($sp->trang_thai == 1)
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
                                {{-- //=================== Xem --}}
                                <!-- Button trigger modal -->
                                <button type="button" id="viewProductButton"
                                    class="btn btn-sm btn-square btn-neutral text-secondary-hover text-black"
                                    data-bs-toggle="modal" data-bs-target="#viewModal-{{ $sp->ma_san_pham }}"
                                    data-id="{{ $sp->ma_san_pham }}" data-url="{{ url('admin_ajax/view_san_pham') }}">
                                    <i class="bi bi-eye"></i>

                                </button>


                                {{-- //=================== Sửa --}}
                                <button type="button" class="btn btn-sm btn-square btn-warning text-white-hover text-white"
                                    data-bs-toggle="modal" data-bs-target="#editModal-{{ $sp->ma_san_pham }}">
                                    <i class="bi bi-pen"></i>
                                </button>


                                {{-- //=================== Xóa --}}
                                <button type="button" class="btn btn-sm btn-square btn-danger text-white-hover text-white"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $sp->ma_san_pham }}">
                                    <i class="bi bi-trash"></i>
                                </button>


                                {{-- MODAL OF VIEW, EDIT, DELETE --}}
                                @include('admin.san_pham_blocks.view_san_pham')
                                @include('admin.san_pham_blocks.edit_san_pham')
                                @include('admin.san_pham_blocks.delete_san_pham')

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection

@section('unique-js')
    <script src="{{ URL::asset('resources') }}/js/show_san_pham.js"></script>
@endsection
