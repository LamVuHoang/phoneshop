$(document).ready(function() {
    $('#commentEditor').summernote();
});

function select_image(image_class) {
    let imageData = $(image_class).attr('src');
    $('#image_selected').attr('src', imageData);
    $('#image_selected').data('zoom-image', imageData);
}

function image_zoom() {
    $(this).elevateZoom();
}
