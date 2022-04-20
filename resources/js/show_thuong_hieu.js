$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});

// View Button
$("document").ready(function () {
    let dataTable = $('#danhSachThuongHieu').DataTable({
        "dom": '<"#mySearchButton"F>' +
            '<"row"<"col-sm-4"i><".col-sm-4.text-center"p><"col-sm-4"l>>',
        "pagingType": "numbers",
        initComplete: function () {
            var api = this.api();

            //Last page chosen
            // var info = api.page.info();
            // api.page(info.pages - 1).draw(false);

            //First page chosen
            api.page(0).draw(false);
        }
    });

    // dataTable.page(0).draw(false);

    $("#mySearchButton").on("keyup keypress search input paste cut", function () {
        dataTable.search(this.value).draw();
    });
});

//Delete Button
$('button#deleteBrandButton').click(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).data('id');
    var url = 'http://' + window.location.host + '/admin_ajax/thuong-hieu-co-sp';
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {
            _token: token,
            id: id,
        },
        success: function (data) {
            let count = data.length;

            if (count >= 1) {
                $('#contentDeleteBrandModal').html(`Có ${count} Sản phẩm sẽ bị ảnh hưởng <br> 
                    Không thể xóa thương hiệu này <br>`);
                alert(count);

            }

            else if (count === 0) {
                $('#contentDeleteBrandModal').html(`Không có sản phẩm nào bị ảnh hưởng <br>
                    Xóa Thương hiệu này?
                    `);


                $('button#deleteButton').click(function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: "DELETE",
                        url: 'http://' + window.location.host + '/admin_ajax/xoa-thuong-hieu',
                        data: {
                            _token: token,
                            id: id,
                        },
                        success: function (response) {
                            alert(`Xóa thương hiệu có mã ${id} thành công`);
                            setTimeout(function () {
                                location.reload();
                            }, 2);
                        }

                    });
                });
            }


        },
        error: function () {
            alert('Ajax that bai');
        }
    })

});


//Add Button
$(document).ready(function () {
    $('#upload_image_form').on('submit', function (e) {

        e.preventDefault();
        // let statusBrand = 0;
        // if ($('#statusBrand').is(':checked')) statusBrand = 1;
        let token = $('meta[name="csrf-token"]').attr('content');

        // let formData = new FormData($('form#upload_image_form')[0]);
        let formData = new FormData(this);
        // formData.append('_token', token);

        $.ajax({
            url: 'http://' + window.location.host + '/admin_ajax/them-thuong-hieu',
            type: "POST",
            data: formData,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.status == 200) {
                    printSuccessMsg(data.success);
                    setTimeout(function () {
                        location.reload();
                    }, 5);
                } else {
                    printErrorMsg(data.error);
                }
            },
            error: function () {
                alert('ajax failed');
            }
        });

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function (key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });

        }

        function printSuccessMsg(msg) {
            $(".print-error-msg").css('display', 'block');
            $('.alert.alert-danger.print-error-msg').removeClass('alert-danger').addClass('alert-success');
            $(".print-error-msg").find("ul").append('<li>' + msg + '</li>');
        }
    });
});
