<!-- Modal -->
<div class="modal fade" id="editModal-{{ $brand->ma_thuong_hieu }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Sửa thương hiệu {{ $brand->ten_thuong_hieu }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="contentEditModal">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Mã thương hiệu</label>
                                    <input readonly type="text" class="form-control" name="id" id="idBrand"
                                        aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tên thương hiệu</label>
                                    <input type="text" class="form-control" name="name" id="nameBrand"
                                        aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Trạng thái</label>
                                    <input type="text" class="form-control" name="status" id="statusBrand"
                                        aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6 py-1">
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" class="form-control" name="logo" id="logoBrand"
                                        aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">

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
