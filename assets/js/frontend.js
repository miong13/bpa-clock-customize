jQuery(function($){

    displayOutline('hello-kitty');

    $('.clock-layout-selection li').click(function(){
        var layout = $(this).data('id');
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');
        displayOutline(layout);
        // $('.product-images.images').html(img);
    });

    function displayOutline(outlineID){
        var img = '<img src="'+ bpaJS.asset_image_url + '/' + outlineID +'-outline.jpg">';
        $('.woocommerce-product-gallery__wrapper').html(img);
    }
});