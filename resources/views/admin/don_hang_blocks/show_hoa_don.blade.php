@extends('targetmaster')

<?php $active_section = 'san_pham'; ?>

@section('title')
    Quản lý Sản phẩm
@endsection

@section('unique-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Quản lý Bảng Hóa đơn
            </h1>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    Advanced Tables
                                </div>
                                {{-- <div class="col-md-6 text-center">
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ url('quan-ly/sp-va-dh/them-san-pham') }}" role="button">Thêm Sản
                                        phẩm</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="DanhSachSanPham">
                                    <thead>
                                        <tr>
                                            <th>Mã hóa đơn</th>
                                            <th>Khách hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Còn lại</th>
                                            <th>Trạng thái hóa đơn</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danh_sach_don_hang as $dh)
                                            <tr>
                                                <td>{{ $dh->mhd }}</td>
                                                <td>
                                                    {{ $dh->ten_khach_hang }}
                                                </td>
                                                <td>{{ number_format($dh->money) }}</td>
                                                <td>{{ number_format($dh->left_money) }}</td>
                                                <td>
                                                    <select class="form-control" name="ma_loai_san_pham" id="ma_loai_san_pham">
                                                        @foreach ($trang_thai_hoa_don as $genre)
                                                            <option value="{{ $genre->ma_trang_thai_hoa_don }}" 
                                                            @if ($dh->ma_trang_thai_hoa_don == $genre->ma_trang_thai_hoa_don)
                                                                selected
                                                        @endif
                                                        >{{ $genre->ten_trang_thai }}</option>
                                                        @endforeach
                                                    </select>

                                                </td>
                                                <td class="text-end">
                                                    {{-- //=================== Xem --}}
                                                    <!-- Button trigger modal -->
                                                    {{-- <button type="button" id="viewProductButton" 
                                                        class="btn btn-sm btn-square btn-neutral text-secondary-hover text-black">
                                                        <i class="fa fa-eye"></i> --}}

                                                    </button>
                                                    <a name="" id=""
                                                        class="btn btn-sm btn-square btn-neutral text-secondary-hover text-black"
                                                        href="#" role="button">
                                                        <i class="fa fa-eye"></i>
                                                    </a>


                                                    {{-- //=================== Sửa --}}
                                                    {{-- <button type="button"
                                                        class="btn btn-sm btn-square btn-warning text-white-hover text-white">
                                                        <i class="fa fa-pencil"></i>
                                                    </button> --}}
                                                    <a name="" id=""
                                                        class="btn btn-sm btn-square btn-warning text-white-hover text-white"
                                                        href="#" role="button">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    {{-- //=================== Xóa --}}
                                                    {{-- <button type="button"
                                                        class="btn btn-sm btn-square btn-danger text-white-hover text-white">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button> --}}
                                                    {{-- <a name="" id=""
                                                        class="btn btn-sm btn-square btn-danger text-white-hover text-white"
                                                        href="#" role="button">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a> --}}

                                                    {{-- MODAL OF VIEW, EDIT, DELETE --}}
                                                    {{-- @include('admin.san_pham_blocks.view_san_pham') --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            <footer>
                <p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p>
            </footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
@endsection

@section('unique-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#DanhSachSanPham').dataTable();
        });
    </script>
@endsection
