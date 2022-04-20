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
                Quản lý Bảng Sản phẩm
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
                                <div class="col-md-6 text-center">
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ url('quan-ly/sp-va-dh/them-san-pham') }}" role="button">Thêm Sản
                                        phẩm</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-me-12 text-center">
                                    @if (session('success'))
                                        <div class="alert alert-primary" role="alert">
                                            {{session('success')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="DanhSachSanPham">
                                    <thead>
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
                                                        class="img-fluid" width="100vw" alt="">
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
                                                    {{-- <button type="button" id="viewProductButton" 
                                                        class="btn btn-sm btn-square btn-neutral text-secondary-hover text-black">
                                                        <i class="fa fa-eye"></i> --}}

                                                    </button>
                                                    <a name="" id=""
                                                        class="btn btn-sm btn-square btn-neutral text-secondary-hover text-black"
                                                        href="{{ url("quan-ly/sp-va-dh/chi-tiet-san-pham/$sp->ma_san_pham") }}"
                                                        role="button">
                                                        <i class="fa fa-eye"></i>
                                                    </a>


                                                    {{-- //=================== Sửa --}}
                                                    {{-- <button type="button"
                                                        class="btn btn-sm btn-square btn-warning text-white-hover text-white">
                                                        <i class="fa fa-pencil"></i>
                                                    </button> --}}
                                                    <a name="" id=""
                                                        class="btn btn-sm btn-square btn-warning text-white-hover text-white"
                                                        href="{{ url("quan-ly/sp-va-dh/sua-san-pham/$sp->ma_san_pham") }}"
                                                        role="button">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    {{-- //=================== Xóa --}}
                                                    {{-- <button type="button"
                                                        class="btn btn-sm btn-square btn-danger text-white-hover text-white">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button> --}}
                                                    <a name="" id=""
                                                        class="btn btn-sm btn-square btn-danger text-white-hover text-white"
                                                        href="{{ route("sp.xoa-san-pham", $sp->ma_san_pham) }}" role="button"
                                                        onclick="event.preventDefault();
                                                                document.getElementById('delete-form-{{ $sp->ma_san_pham }}').submit();">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>

                                                    <form id="delete-form-{{ $sp->ma_san_pham }}" action="{{ route("sp.xoa-san-pham", $sp->ma_san_pham) }}"
                                                        method="POST" style="display: none;">
                                                       @csrf
                                                       @method('DELETE')
                                                   </form>
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
