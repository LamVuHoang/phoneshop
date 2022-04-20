<!-- Modal -->
<div class="modal fade" id="editModal-{{ $sp->ma_san_pham }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Sửa Sản phẩm {{ $sp->ten_san_pham }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="contentEditModal">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <b>Mã sản phẩm</b>
                                <br>
                                {{ $sp->ma_san_pham }}
                            </div>
                            <div class="col-md-3">
                                <b>Tên Sản phẩm</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-md-3">
                                <b>Tên URL</b>
                                <br>
                                {{ $sp->ten_url }}
                            </div>
                            <div class="col-md-3">
                                <b>Tên Thương hiệu</b>
                                <br>
                                <?php
                                $ma_thuong_hieu = $sp->ma_thuong_hieu - 1;
                                echo $danh_sach_thuong_hieu[$ma_thuong_hieu];
                                ?>
                            </div>
                            <div class="col-4">
                                <b>Hình 1</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-4">
                                <b>Hình 2</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-4">
                                <b>Hình 3</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Hệ điều hành</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>SIM</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>RAM</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Bộ nhớ trong</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Chip</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Camera trước</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Camera sau</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Màn hình</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Loại sản phẩm</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Đơn giá</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Giảm giá</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Số lượng tồn</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Sản phẩm kèm theo</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Ghi chú</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                            <div class="col-3">
                                <b>Trạng thái</b>
                                <br>
                                {{ $sp->ten_san_pham }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm">Sửa</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
