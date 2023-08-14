<?php
/*
 * Plugin Name:       Best Price Arts (Clock Customizer)
 * Plugin URI:        https://github.com/miong13/bpa-clock-customize
 * Description:       Custom WooCommerce Product Filtering
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mark Lyndon Ramos
 * Author URI:        https://markramosonline.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/miong13/bpa-clock-customize
 * Text Domain:       atf-woofilter
 * Domain Path:       /languages
 */


function remove_image_zoom_support_bpasite() {
    remove_theme_support( 'wc-product-gallery-zoom' );
    // remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
}
add_action( 'wp', 'remove_image_zoom_support_bpasite', 100 );

if(!function_exists("bpa_clock_customizer_func")){

    /* OVERRIDE THE PRODUCT IMAGE AND THUMBNAILS */

    // remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
    // remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

    // // add_action( 'woocommerce_product_thumbnails', 'my_plugin_show_product_image', 20 );
    // add_action( 'woocommerce_before_single_product_summary', 'bpa_show_new_product_image', 10 ); 
    // remove_theme_support( 'wc-product-gallery-zoom' );
    // remove_theme_support( 'wc-product-gallery-lightbox' );
    // remove_theme_support( 'wc-product-gallery-slider' );  
    function bpa_clock_customizer_func( $atts ) {
        $a = shortcode_atts( array(
            'foo' => 'something',
            'bar' => 'something else',
        ), $atts );


        $asset_image = plugins_url( 'assets/images', __FILE__ );

        wp_enqueue_script(
            'bpa-clock-customizer', 
            plugins_url( 'assets/js/frontend.js', __FILE__ ),
            array( 'jquery' ),
            '0.0.1.r-'.date('YmdHiS'),
            true
        );  

        wp_localize_script( 'bpa-clock-customizer', 'bpaJS', array( 'asset_image_url' => $asset_image));

        wp_enqueue_style( 'bpa-clock-customizer', plugins_url( 'assets/css/style.css', __FILE__ ), false, '0.0.1.r-'.date('YmdHis'), 'all' );

        // return "foo = {$a['foo']}";
        $html_ = '
            <div class="bpa-clock-customizer-controls">
                <strong>Select Template :</strong>
                <div class="">
                    <ul class="clock-layout-selection">
                        <li data-id="hello-kitty" class="active">Hello Kitty Layout</li>
                        <li data-id="lady">Lady Layout</li>
                        <li data-id="quran">Quran Layout</li>
                    </ul>
                </div>
            </div>
        ';
        return $html_;
    }
    
    add_shortcode( 'bpa-clock-customizer', 'bpa_clock_customizer_func' );


}

// function bpa_show_new_product_image(){
//     echo '<div class="woocommerce-product-gallery__wrapper">';
//     echo '<img src="'.plugins_url( 'assets/images/hello-kitty-outline.jpg', __FILE__ ).'">';
//     echo '</div>';
// } 

// add_action('woocommerce_before_single_product_summary', 'bpa_show_new_product_image', 20);

