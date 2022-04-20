<!-- Modal -->
<div class="modal fade" id="addModalBrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data" id="upload_image_form"
                action="javascript:void(0)">

                {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Thêm thương hiệu
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="contentEditModal">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tên thương hiệu <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nameBrand" id="nameBrand"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="statusBrand"
                                                id="statusBrand" value="1">
                                            Trạng thái</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 py-2">
                                    <div class="form-group">
                                        <label for="">Ghi chú</label>
                                        <textarea class="form-control" name="noteBrand" id="noteBrand"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 py-2">
                                    <div class="form-group">
                                        <label for="">Logo <span class="text-danger">*</span></label>
                                        <input onchange="previewFile(this)" type="file" class="form-control"
                                            name="logoBrand" id="logoBrand" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 py-2">
                                    <img id="addBrandImage" width="50%">
                                    <input type="hidden" id="uploadName">
                                </div>
                                <div class="col-12">
                                    <div id="" class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm" id="addBrandButton">Thêm</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#addBrandImage").attr("src", reader.result);
            }

            reader.readAsDataURL(file);

            $('#uploadName').val($("input[type=file]").get(0).files[0].name);
        }
    }
</script>
