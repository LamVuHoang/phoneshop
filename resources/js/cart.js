$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});

// $(document).ready(function () {
//     $('button.addCart').click(function (e) {
//         e.preventDefault();

//         var id = $(this).data('id');
//         var quantity = $("#quantity-" + id).val();
//         var token = $('meta[name="csrf-token"]').attr('content');

//         let abc = confirm(`Đặt hàng id: ${id}, quantity: ${quantity}?`);
//         if (abc == true) {
//             $.ajax({
//                 type: "POST",
//                 url: "http://" + window.location.host + "/san-pham/dat-hang",
//                 data: {
//                     _token: '{{csrf_token()}}',
//                     id: id,
//                     quantity: quantity,
//                 },
//                 success: function () {
//                     alert('Đặt hàng thành công');
//                 },
//                 error: function () {
//                     alert('Thất bại');
//                 }
//             });
//         }
//     });
// });