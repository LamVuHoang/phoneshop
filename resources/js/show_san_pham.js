$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});

//Table
$("document").ready(function () {
    let dataTable = $('#danhSachSP').DataTable({
        "dom": '<"#mySearchButton"F>' +
            '<"row"<"col-sm-4"i><".col-sm-4.text-center"p><"col-sm-4"l>>',
        "pagingType": "numbers",
        initComplete: function () {
            var api = this.api();
            //First page chosen
            api.page(0).draw(false);
        }
    });

    $("#mySearchButton").on("keyup keypress search input paste cut", function () {
        dataTable.search(this.value).draw();
    });
});

// View Button
$("button#viewProductButton").click(function () {
    var id = $(this).data('id');
    var token = $('meta[name="csrf-token"]').attr('content');
    var url = $(this).data('url');
    $.ajax({
        type: 'POST',
        dataType: 'Json',
        url: url,
        data: {
            _token: token,
            id: id,
        },
        success: function (data) {
            let text = `<div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <img src="http://${window.location.host}/storage/san_pham/${data['hinh1']}" class="img-fluid" alt="">
                                </div>
                                <div class="col-6">
                                    <div class="row">
`;

            for (key in data) {
                if (key === 'hinh1' || key === 'hinh2' || key === 'hinh3') continue;
                else {
                    text += `<div class="col-6"> <b>${key}</b></div><div class="col-6">${data[key]}</div>`;
                }
            }
            text += "</div></div>";

            if (data['hinh2'] !== null) {
                text += `<div class="col-6">
                <img src="http://${window.location.host}/storage/san_pham/${data['hinh2']}" class="img-fluid" alt="">
            </div>
                `;
            }
            if (data['hinh3'] !== null) {
                text += `<div class="col-6">
                <img src="http://${window.location.host}/storage/san_pham/${data['hinh3']}" class="img-fluid" alt="">
            </div>
                `;
            }
            text += "</div></div>";
            // text = `<img src="http://${window.location.host}/storage/san_pham/${data['hinh1']}" class="img-fluid" alt="">`;
            $('div#contentViewModal').html(text);
        },
        error: function () {
            alert('AJAX that bai');
        }
    });
});


$('button.viewEditProduct').click(function () {
    var id = $(this).data('id');
    let x = $('meta[name="csrf-token"]').attr('content');
    alert(`id ${id} X-CSRF-TOKEN ${x}`);


});


//Delete Product
function deleteProduct(id) {
    let url = $('button#deleteButton').data('url');
    var token = $('meta[name="csrf-token"]').attr('content');

    // alert(`id: ${id}, url: ${url}`);
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            _token: token,
            id: id,
        },
        success: function () {
            // alert('Xoa thành công');
            // $('#danhSachSP').load();
            // $("#danhSachSP").load(" #danhSachSP");
            location.reload();

        },
        error: function () {
            alert('Xoa that bai');
        }
    });
}