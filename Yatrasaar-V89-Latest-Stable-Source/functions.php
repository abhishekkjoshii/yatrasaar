<?php

/* V64: robust cache-busting + stable asset helpers */
if ( ! function_exists( 'yatrasaar_asset_version' ) ) {
    function yatrasaar_asset_version( $relative_file ) {
        $path = get_template_directory() . '/' . ltrim( $relative_file, '/' );
        return file_exists( $path ) ? (string) filemtime( $path ) : '78';
    }
}

if (!defined('ABSPATH')) exit;

if ( ! function_exists( 'yatrasaar_asset_url' ) ) {
    function yatrasaar_asset_url( $relative_file ) {
        $relative_file = ltrim( $relative_file, '/' );
        $url = get_template_directory_uri() . '/' . $relative_file;
        $version = yatrasaar_asset_version( $relative_file );
        return $url . '?ver=' . rawurlencode( $version );
    }
}

function yatrasaar_url($slug='') {
    $p = get_page_by_path($slug);
    return $p ? get_permalink($p) : home_url('/');
}

function yatrasaar_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
    register_nav_menus(array('primary'=>'Primary Menu'));
}
add_action('after_setup_theme','yatrasaar_setup');

function yatrasaar_assets() {
    wp_enqueue_style('yatrasaar-style', get_template_directory_uri() . '/style.css', array(), yatrasaar_asset_version('style.css'));
    wp_enqueue_script('yatrasaar-main', get_template_directory_uri().'/js-main.js', array(), yatrasaar_asset_version('js-main.js'), true);
    wp_localize_script('yatrasaar-main','YatrasaarData',array(
        'assets'=>get_template_directory_uri().'/assets',
        'assetVersion'=>yatrasaar_asset_version('assets/adi-kailash-new.png'),
        'contactUrl'=>yatrasaar_url('contact'),
        'homeUrl'=>home_url('/'),
    ));
}
add_action('wp_enqueue_scripts','yatrasaar_assets');

/* V88: create dedicated Adi Kailash package pages once. Content is intentionally minimal for now. */
function yatrasaar_create_package_pages_once() {
    if ( get_option( 'yatrasaar_package_pages_v88_created' ) ) return;

    $pages = array(
        'adi-kailash-yatra-package-from-new-delhi' => 'Adi Kailash Yatra Package from New Delhi',
        'adi-kailash-yatra-package-from-bareilly' => 'Adi Kailash Yatra Package from Bareilly',
        'adi-kailash-yatra-package-from-kathgodam' => 'Adi Kailash Yatra Package from Kathgodam',
        'adi-kailash-yatra-package-from-pithoragarh' => 'Adi Kailash Yatra Package from Pithoragarh',
        'adi-kailash-yatra-package-from-dharchula' => 'Adi Kailash Yatra Package from Dharchula',
    );

    foreach ( $pages as $slug => $title ) {
        if ( ! get_page_by_path( $slug ) ) {
            wp_insert_post( array(
                'post_title'  => $title,
                'post_name'   => $slug,
                'post_status' => 'publish',
                'post_type'   => 'page',
            ) );
        }
    }

    update_option( 'yatrasaar_package_pages_v88_created', 1, false );
}
add_action( 'init', 'yatrasaar_create_package_pages_once', 20 );

/* V80: enquiry storage is handled by the Yatrasaar Enquiry Database plugin.
 * The theme only renders the forms and success notice, avoiding duplicate
 * admin-post handlers/table definitions.
 */

function yatrasaar_success_notice(){
    if(isset($_GET['enquiry']) && $_GET['enquiry']==='success') echo '<div class="yatrasaar-success" id="yatrasaarSuccess" role="status"><span>Thank you! Your enquiry has been received. Our team will contact you shortly.</span><button type="button" class="yatrasaar-success-close" aria-label="Close" onclick="this.parentElement.remove()">&times;</button></div>';
}
add_action('wp_body_open','yatrasaar_success_notice',20);

// V58: lightweight detail pages for Explore Yatras cards.
function yatrasaar_yatra_detail_route(){
    if(isset($_GET['yatra']) && !is_admin()){
        $file = get_template_directory() . '/yatra-detail.php';
        if(file_exists($file)){ include $file; exit; }
    }
}
add_action('template_redirect','yatrasaar_yatra_detail_route',0);

/* V64 stable favicon */
add_action( 'wp_head', function() {
    $favicon = get_template_directory_uri() . '/favicon.ico';
    echo '<link rel="icon" href="' . esc_url( $favicon ) . '" sizes="any">' . "\n";
}, 5 );
