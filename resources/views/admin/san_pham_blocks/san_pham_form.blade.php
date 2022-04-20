@extends('targetmaster')

<?php
$active_section = 'san_pham';

if (isset($san_pham_chi_tiet)) {
    $title = 'Sửa Sản phẩm';
} else {
    $title = 'Thêm Sản phẩm';
}
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
                        @if (session('alert'))
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        {!! session('alert') !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="card-content">
                            <form action="" method="post" enctype="multipart/form-data">
                                @if (isset($san_pham_chi_tiet))
                                    @method('PUT')
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    {{ $error }}
                                                    <br>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nhập tên Sản phẩm <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="ten_san_pham" id="ten_san_pham"
                                            aria-describedby="helpId"
                                            value="{{ old('ten_san_pham') ?? ($san_pham_chi_tiet->ten_san_pham ?? '') }}">
                                        @if (count($errors) > 0)
                                            <small id="ten_san_phamHelp" class="form-text text-danger">
                                                @foreach ($errors->get('ten_san_pham') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <input type="hidden" name="id" value="{{ $san_pham_chi_tiet->ma_san_pham ?? '' }}">
                                    <input type="hidden" name="ma_nguoi_dang_bai" value="{{ $san_pham_chi_tiet->ma_nguoi_dang_bai ?? '' }}">
                                    <div class="form-group col-md-6">
                                        <label>Nhập tên URL <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="ten_url" id="ten_url"
                                            aria-describedby="helpId"
                                            value="{{ old('ten_url') ?? ($san_pham_chi_tiet->ten_url ?? '') }}">
                                        @if (count($errors) > 0)
                                            <small id="ten_urlHelp" class="form-text text-danger">
                                                @foreach ($errors->get('ten_url') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Thương hiệu <span style="color: red">*</span></label>
                                        <select class="form-control" name="ma_thuong_hieu" id="ma_thuong_hieu">
                                            @foreach ($thuong_hieu as $brand)
                                                <option value="{{ $brand->ma_thuong_hieu }}" @if (old('ma_thuong_hieu') == $brand->ma_thuong_hieu)
                                                    selected
                                                @elseif (isset($san_pham_chi_tiet) && $san_pham_chi_tiet->ma_thuong_hieu == $brand->ma_thuong_hieu)
                                                    selected
                                            @endif
                                            >{{ $brand->ten_thuong_hieu }}</option>
                                            @endforeach
                                        </select>
                                        @if (count($errors) > 0)
                                            <small id="ma_thuong_hieuHelp" class="form-text text-danger">
                                                @foreach ($errors->get('ma_thuong_hieu') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Loại sản phẩm <span style="color: red">*</span></label>
                                        <select class="form-control" name="ma_loai_san_pham" id="ma_loai_san_pham">
                                            @foreach ($loai_san_pham as $genre)
                                                <option value="{{ $genre->ma_loai_san_pham }}" @if (old('ma_loai_san_pham') == $genre->ma_loai_san_pham)
                                                    selected
                                                @elseif (isset($san_pham_chi_tiet) && $san_pham_chi_tiet->ma_loai_san_pham == $genre->ma_loai_san_pham)
                                                    selected
                                            @endif
                                            >{{ $genre->ten_loai_san_pham }}</option>
                                            @endforeach
                                        </select>
                                        @if (count($errors) > 0)
                                            <small id="ma_loai_san_phamHelp" class="form-text text-danger">
                                                @foreach ($errors->get('ma_loai_san_pham') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Hình 1 <span style="color: red">*</span></label>
                                        @if (count($errors) > 0)
                                            <small id="hinh1Help" class="form-text text-danger">
                                                @foreach ($errors->get('hinh1') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                        <input type="file" class="form-control" name="hinh1" id="hinh1"
                                            aria-describedby="helpId" onchange="uploadHinh(event)">
                                        <br>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Hình 2</label>
                                        @if (count($errors) > 0)
                                            <small id="hinh2Help" class="form-text text-danger">
                                                @foreach ($errors->get('hinh2') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                        <input type="file" class="form-control" name="hinh2" id="hinh2"
                                            aria-describedby="helpId" onchange="uploadHinh(event)">
                                        <br>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Hình 3</label>
                                        @if (count($errors) > 0)
                                            <small id="hinh3Help" class="form-text text-danger">
                                                @foreach ($errors->get('hinh3') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                        <input type="file" class="form-control" name="hinh3" id="hinh3"
                                            aria-describedby="helpId" onchange="uploadHinh(event)">
                                        <br>
                                    </div>
                                    <div class="col-md-4 text-cemter">
                                        <img id="xemImage1" width="100%" src="<?php
                                                                                                    if (isset($san_pham_chi_tiet)) {
                                                                                                        echo URL::asset('storage/san_pham') . '/' . $san_pham_chi_tiet->hinh1;
                                                                                                    }
                                                                                                    ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <img id="xemImage2" width="100%" src="<?php
            if (isset($san_pham_chi_tiet) && $san_pham_chi_tiet->hinh2 != '') {
                echo URL::asset('storage/san_pham') . '/' . $san_pham_chi_tiet->hinh2;
            }
            ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <img id="xemImage3" width="100%" src="<?php
            if (isset($san_pham_chi_tiet) && $san_pham_chi_tiet->hinh3 != '') {
                echo URL::asset('storage/san_pham') . '/' . $san_pham_chi_tiet->hinh3;
            }
            ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Hệ điều hành</label>
                                        <input type="text" class="form-control" name="he_dieu_hanh" id="he_dieu_hanh"
                                            aria-describedby="helpId"
                                            value="{{ old('he_dieu_hanh') ?? ($san_pham_chi_tiet->he_dieu_hanh ?? '') }}">
                                        @if (count($errors) > 0)
                                            <small id="tieu_deHelp" class="form-text text-danger">
                                                @foreach ($errors->get('tieu_de') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>SIM</label>
                                        <input type="text" class="form-control" name="sim" id="sim"
                                            aria-describedby="helpId"
                                            value="{{ old('sim') ?? ($san_pham_chi_tiet->sim ?? '') }}">
                                            @if (count($errors) > 0)
                                            <small id="simHelp" class="form-text text-danger">
                                                @foreach ($errors->get('sim') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>RAM</label>
                                        <input type="text" class="form-control" name="ram" id="ram"
                                            aria-describedby="helpId"
                                            value="{{ old('ram') ?? ($san_pham_chi_tiet->ram ?? '') }}">
                                            @if (count($errors) > 0)
                                            <small id="ramHelp" class="form-text text-danger">
                                                @foreach ($errors->get('ram') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Chip</label>
                                        <input type="text" class="form-control" name="chip" id="chip"
                                            aria-describedby="helpId"
                                            value="{{ old('chip') ?? ($san_pham_chi_tiet->chip ?? '') }}">
                                            @if (count($errors) > 0)
                                            <small id="chipHelp" class="form-text text-danger">
                                                @foreach ($errors->get('chip') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Bộ nhớ trong</label>
                                        <input type="text" class="form-control" name="bo_nho_trong" id="bo_nho_trong"
                                            aria-describedby="helpId"
                                            value="{{ old('bo_nho_trong') ?? ($san_pham_chi_tiet->bo_nho_trong ?? '') }}">
                                            @if (count($errors) > 0)
                                            <small id="bo_nho_trongHelp" class="form-text text-danger">
                                                @foreach ($errors->get('bo_nho_trong') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Camera trước</label>
                                        <input type="text" class="form-control" name="camera_truoc" id="camera_truoc"
                                            aria-describedby="helpId"
                                            value="{{ old('camera_truoc') ?? ($san_pham_chi_tiet->camera_truoc ?? '') }}">
                                            @if (count($errors) > 0)
                                            <small id="camera_truocHelp" class="form-text text-danger">
                                                @foreach ($errors->get('camera_truoc') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Camera sau</label>
                                        <input type="text" class="form-control" name="camera_sau" id="camera_sau"
                                            aria-describedby="helpId"
                                            value="{{ old('camera_sau') ?? ($san_pham_chi_tiet->camera_sau ?? '') }}">
                                            @if (count($errors) > 0)
                                            <small id="camera_sauHelp" class="form-text text-danger">
                                                @foreach ($errors->get('camera_sau') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Màn hình</label>
                                        <input type="text" class="form-control" name="man_hinh" id="man_hinh"
                                            aria-describedby="helpId"
                                            value="{{ old('man_hinh') ?? ($san_pham_chi_tiet->man_hinh ?? '') }}">
                                            @if (count($errors) > 0)
                                            <small id="man_hinhHelp" class="form-text text-danger">
                                                @foreach ($errors->get('man_hinh') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Đơn giá <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="don_gia" id="don_gia"
                                            aria-describedby="helpId" placeholder="Giá cả sản phẩm"
                                            value="{{ old('don_gia') ?? ($san_pham_chi_tiet->don_gia ?? '') }}">
                                            @if (count($errors) > 0)
                                            <small id="don_giaHelp" class="form-text text-danger">
                                                @foreach ($errors->get('don_gia') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Số lượng tồn <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="so_luong_ton" id="so_luong_ton"
                                            aria-describedby="helpId"
                                            value="{{ old('so_luong_ton') ?? ($san_pham_chi_tiet->so_luong_ton ?? '') }}">
                                            @if (count($errors) > 0)
                                            <small id="so_luong_tonHelp" class="form-text text-danger">
                                                @foreach ($errors->get('so_luong_ton') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Sản phẩm kèm theo</label>
                                        <input type="text" class="form-control" name="san_pham_kem_theo"
                                            id="san_pham_kem_theo" aria-describedby="helpId"
                                            value="{{ old('san_pham_kem_theo') ?? ($san_pham_chi_tiet->san_pham_kem_theo ?? '') }}">
                                            @if (count($errors) > 0)
                                            <small id="san_pham_kem_theoHelp" class="form-text text-danger">
                                                @foreach ($errors->get('san_pham_kem_theo') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-check col-md-3">
                                        <p class="text-center">
                                            <input name="trang_thai" type="checkbox" class="filled-in mt-2" id="filled-in-box" value="1"
                                                <?php
                                                if (old('trang_thai') !== null) {
                                                    if (old('trang_thai') == 1) {
                                                        echo 'checked="checked"';
                                                    } 
                                                } elseif (isset($san_pham_chi_tiet) && $san_pham_chi_tiet->trang_thai == 1) {
                                                        echo 'checked="checked"';
                                                    }
                                                ?> />
                                            <label for="filled-in-box">Trạng thái</label>
                                            @if (count($errors) > 0)
                                            <small id="trang_thaiHelp" class="form-text text-danger">
                                                @foreach ($errors->get('trang_thai') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                        </p>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Giảm giá</label>
                                        <select class="form-control" name="giam_gia" id="giam_gia">
                                            <option hidden disabled value @if (isset($san_pham_chi_tiet) && $san_pham_chi_tiet->ma_giam_gia == '')
                                                selected
                                                @elseif(!isset($san_pham_chi_tiet)) selected
                                                @endif
                                                > -- Chọn một phương án giảm giá -- </option>
                                            @foreach ($giam_gia as $item)
                                                <option value="{{ $item->ma_giam_gia }}" @if (old('giam_gia') == $item->ma_giam_gia)
                                                    selected
                                                @elseif (isset($san_pham_chi_tiet) && $san_pham_chi_tiet->ma_giam_gia == $item->ma_giam_gia)
                                                    selected
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
                                        @if (count($errors) > 0)
                                            <small id="giam_giaHelp" class="form-text text-danger">
                                                @foreach ($errors->get('giam_gia') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Tóm Tắt Sản Phẩm</label>
                                        <textarea class="form-control" name="tom_tat_san_pham" id="tom_tat_san_pham"
                                            rows="3">{{ old('tom_tat_san_pham') ?? ($san_pham_chi_tiet->tom_tat_san_pham ?? '') }}</textarea>
                                            @if (count($errors) > 0)
                                            <small id="tom_tat_san_phamHelp" class="form-text text-danger">
                                                @foreach ($errors->get('tom_tat_san_pham') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Chi Tiết Sản Phẩm <span style="color: red">*</span></label>
                                        <textarea class="form-control" name="chi_tiet_san_pham" id="chi_tiet_san_pham"
                                            rows="5">{{ old('chi_tiet_san_pham') ?? ($san_pham_chi_tiet->chi_tiet_san_pham ?? '') }}</textarea>
                                            @if (count($errors) > 0)
                                            <small id="chi_tiet_san_phamHelp" class="form-text text-danger">
                                                @foreach ($errors->get('chi_tiet_san_pham') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Ghi chú</label>
                                        <textarea class="form-control" name="ghi_chu" id="ghi_chu"
                                            rows="2">{{ old('ghi_chu') ?? ($san_pham_chi_tiet->ghi_chu ?? '') }}</textarea>
                                            @if (count($errors) > 0)
                                            <small id="ghi_chuHelp" class="form-text text-danger">
                                                @foreach ($errors->get('ghi_chu') as $message)
                                                    {{ $message }}<br>
                                                @endforeach
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <a name="" id="" class="btn btn-primary" href="{{ url('quan-ly/sp-va-dh') }}"
                                            role="button">
                                            Trở lại trang Quản lý Sản phẩm
                                        </a>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-danger">{{ $title }}</button>
                                    </div>
                                </div>
                            </form>
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
            ]
        });
    </script>
@endsection
