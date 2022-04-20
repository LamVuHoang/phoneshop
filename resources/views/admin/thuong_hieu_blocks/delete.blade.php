<!-- Modal -->
<div class="modal fade" id="deleteModal-{{ $brand->ma_thuong_hieu }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Xóa thương hiệu {{ $brand->ten_thuong_hieu }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="contentDeleteBrandModal">
                    
                </div>
            </div>
            <div class="modal-footer">
                <div id="deleteAlert"></div>
                <button type="button" id="deleteButton" onclick="deleteProduct({{ $brand->ma_san_pham }})"
                    data-url="{{ url('admin_ajax/destroy_san_pham') }}" class="btn btn-danger btn-sm">Xóa</button>
                

                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Trở lại danh sách sản
                    phẩm</button>
            </div>
        </div>
    </div>
</div>
