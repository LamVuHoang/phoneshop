<!-- Modal -->
<div class="modal fade" id="deleteModal-{{ $sp->ma_san_pham }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Xóa Sản phẩm {{ $sp->ten_san_pham }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="contentDeleteModal">
                    Bạn có chắc muốn xóa sản phẩm này
                    <img id=""
                        class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                        alt="">
                </div>
            </div>
            <div class="modal-footer">
                <div id="deleteAlert"></div>
                <button type="button" id="deleteButton" onclick="deleteProduct({{ $sp->ma_san_pham }})"
                    data-url="{{ url('admin_ajax/destroy_san_pham') }}" class="btn btn-danger btn-sm">Xóa</button>
                

                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Trở lại danh sách sản
                    phẩm</button>
            </div>
        </div>
    </div>
</div>
