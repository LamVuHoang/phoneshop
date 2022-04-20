@extends('targetmaster')

<?php
$active_section = 'san_pham';
$title = 'Xem chi tiết Sản phẩm';
?>

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                {{ $title }}
            </h1>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-content">
                            {{-- <form action="" method="post" enctype="multipart/form-data"> --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <small>Tên Sản phẩm</small>
                                        <input type="text" readonly class="form-control" name="ten_san_pham"
                                            id="ten_san_pham" aria-describedby="helpId"
                                            value="{{ $san_pham_chi_tiet->ten_san_pham }}">
                                    </div>
                                    <input type="hidden" name="id" value="{{ $san_pham_chi_tiet->id ?? '' }}">
                                    <div class="form-group col-md-6">
                                        <small>Tên URL</small>
                                        <input type="text" readonly class="form-control" name="ten_url" id="ten_url"
                                            aria-describedby="helpId" value="{{ $san_pham_chi_tiet->ten_url }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <small>Thương hiệu</small>
                                        <select class="form-control" name="ma_thuong_hieu" id="ma_thuong_hieu">
                                            @foreach ($thuong_hieu as $brand)
                                                <option value="{{ $brand->ma_thuong_hieu }}" @if ($san_pham_chi_tiet->ma_thuong_hieu == $brand->ma_thuong_hieu)
                                                    selected
                                                @else
                                                    disabled
                                            @endif
                                            >{{ $brand->ten_thuong_hieu }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <small>Loại sản phẩm</small>
                                        <select class="form-control" name="ma_loai_san_pham" id="ma_loai_san_pham">
                                            @foreach ($loai_san_pham as $genre)
                                                <option value="{{ $genre->ma_loai_san_pham }}" @if ($san_pham_chi_tiet->ma_loai_san_pham == $genre->ma_loai_san_pham)
                                                    selected
                                                @else
                                                    disabled
                                            @endif
                                            >{{ $genre->ten_loai_san_pham }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group col-md-4">
                                        <label for="">Hình 1</label>
                                        <input type="file" class="form-control" name="hinh1" id="hinh1"
                                            aria-describedby="helpId" onchange="uploadHinh(event)">
                                        <br>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Hình 2</label>
                                        <input type="file" class="form-control" name="hinh2" id="hinh1"
                                            aria-describedby="helpId" onchange="uploadHinh(event)">
                                        <br>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Hình 3</label>
                                        <input type="file" class="form-control" name="hinh3" id="hinh1"
                                            aria-describedby="helpId" onchange="uploadHinh(event)">
                                        <br>
                                    </div> --}}
                                    <div class="col-md-4 text-cemter">
                                        <label for="">Hình 1</label>
                                        <img id="xemImage1" width="100%"
                                            src="
                                                                                                            <?php
                                                                                                            echo URL::asset('storage/san_pham') . '/' . $san_pham_chi_tiet->hinh1;
                                                                                                            ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Hình 2</label>
                                        <img id="xemImage2" width="100%"
                                            src="<?php
    if ($san_pham_chi_tiet->hinh2 != '') {
        echo URL::asset('storage/san_pham') . '/' . $san_pham_chi_tiet->hinh2;
    }
    ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Hình 3</label>
                                        <img id="xemImage3" width="100%"
                                            src="<?php
    if ($san_pham_chi_tiet->hinh3 != '') {
    echo URL::asset('storage/san_pham') . '/' . $san_pham_chi_tiet->hinh3;
    }
    ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <small>Hệ điều hành</small>
                                        <input type="text" readonly class="form-control" name="he_dieu_hanh"
                                            id="he_dieu_hanh" aria-describedby="helpId"
                                            value="{{ $san_pham_chi_tiet->he_dieu_hanh }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <small>SIM</small>
                                        <input type="text" readonly class="form-control" name="sim" id="sim"
                                            aria-describedby="helpId" value="{{ $san_pham_chi_tiet->sim }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <small>RAM</small>
                                        <input type="text" readonly class="form-control" name="ram" id="ram"
                                            aria-describedby="helpId" value="{{ $san_pham_chi_tiet->ram }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <small>Chip</small>
                                        <input type="text" readonly class="form-control" name="chip" id="chip"
                                            aria-describedby="helpId" value="{{ $san_pham_chi_tiet->chip }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <small>Bộ nhớ trong</small>
                                        <input type="text" readonly class="form-control" name="bo_nho_trong"
                                            id="bo_nho_trong" aria-describedby="helpId"
                                            value="{{ $san_pham_chi_tiet->bo_nho_trong }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <small>Camera trước</small>
                                        <input type="text" readonly class="form-control" name="camera_truoc"
                                            id="camera_truoc" aria-describedby="helpId"
                                            value="{{ $san_pham_chi_tiet->camera_truoc }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <small>Camera sau</small>
                                        <input type="text" readonly class="form-control" name="camera_sau" id="camera_sau"
                                            aria-describedby="helpId" value="{{ $san_pham_chi_tiet->camera_sau }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <small>Màn hình</small>
                                        <input type="text" readonly class="form-control" name="man_hinh" id="man_hinh"
                                            aria-describedby="helpId" value="{{ $san_pham_chi_tiet->man_hinh }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <small>Đơn giá</small>
                                        <input type="text" readonly class="form-control" name="don_gia" id="don_gia"
                                            aria-describedby="helpId" placeholder="Giá cả sản phẩm"
                                            value="{{ $san_pham_chi_tiet->don_gia }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <small>Số lượng tồn</small>
                                        <input type="text" readonly class="form-control" name="so_luong_ton"
                                            id="so_luong_ton" aria-describedby="helpId"
                                            value="{{ $san_pham_chi_tiet->so_luong_ton }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <small>Sản phẩm kèm theo</small>
                                        <input type="text" readonly class="form-control" name="san_pham_kem_theo"
                                            id="san_pham_kem_theo" aria-describedby="helpId"
                                            value="{{ $san_pham_chi_tiet->san_pham_kem_theo }}">
                                    </div>
                                    <div class="form-check col-md-3">
                                        <p class="text-center">
                                            <input type="checkbox" disabled="disabled" class="filled-in mt-2" id="filled-in-box" value="1"
                                                <?php
                                                if ($san_pham_chi_tiet->trang_thai == 1) {
                                                    echo 'checked="checked"';
                                                }
                                                ?> />
                                            <label for="filled-in-box">Trạng thái</label>
                                        </p>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <small>Giảm giá</small>
                                        <select class="form-control" name="giam_gia" id="giam_gia">
                                            <option hidden disabled value @if ($san_pham_chi_tiet->ma_giam_gia == '')
                                                selected
                                                @endif
                                                > -- Chọn một phương án giảm giá -- </option>
                                            @foreach ($giam_gia as $item)
                                                <option value="{{ $item->ma_giam_gia }}" @if ($san_pham_chi_tiet->ma_giam_gia == $item->ma_giam_gia)
                                                    selected
                                                @else
                                                    disabled
                                            @endif
                                            >
                                            Code giảm giá: {{ $item->code_giam_gia }} |
                                            Số tiền giảm giá: {{ $item->so_tien_giam_gia }} |
                                            Trạng thái: {{ $item->trang_thai }} |
                                            Thời gian Bắt đầu: {{ $item->thoi_gian_bat_dau }} |
                                            Thời gian Kết thúc: {{ $item->thoi_gian_ket_thuc }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <small>Tóm Tắt Sản Phẩm</small>
                                        <textarea readonly class="form-control" name="tom_tat_san_pham"
                                            id="tom_tat_san_pham"
                                            rows="3">{{ $san_pham_chi_tiet->tom_tat_san_pham }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <small>Chi Tiết Sản Phẩm</small>
                                        <textarea readonly class="form-control" name="chi_tiet_san_pham"
                                            id="chi_tiet_san_pham"
                                            rows="5">{{ $san_pham_chi_tiet->chi_tiet_san_pham }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <small>Ghi chú</small>
                                        <textarea readonly class="form-control" name="ghi_chu" id="ghi_chu"
                                            rows="2">{{ $san_pham_chi_tiet->ghi_chu }}</textarea>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <a name="" id="" class="btn btn-primary" href="{{ url('quan-ly/sp-va-dh') }}" role="button">
                                            Trở lại trang Quản lý Sản phẩm
                                        </a>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <a name="" id="" class="btn btn-warning" 
                                        href="{{ url("quan-ly/sp-va-dh/sua-san-pham/$san_pham_chi_tiet->ma_san_pham") }}" role="button">
                                            Chỉnh sửa Sản phẩm
                                        </a>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <a name="" id="" class="btn btn-danger" href="{{ url("quan-ly/sp-va-dh") }}" role="button">
                                            Xóa Sản phẩm
                                        </a>
                                    </div>
                                </div>
                            {{-- </form> --}}
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#chi_tiet_san_pham').summernote({
            placeholder: 'Chi tiết Sản phẩm',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            readonly
        });
    </script>
@endsection
