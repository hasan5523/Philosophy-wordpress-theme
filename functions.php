<?php
require_once(get_theme_file_path('inc/tgm.php'));
require_once(get_theme_file_path('inc/attachments.php'));
require_once(get_theme_file_path('widgets/social-icons-widget.php'));
if ( ! isset( $content_width ) ) $content_width = 960;
if( site_url() == ""){
    define("VERSION", time());
}else{
    define("VERSION",wp_get_theme()->get('Version'));
}

function philosophy_theme_setup() {
    load_theme_textdomain( "philosophy" );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "title-tag" );
    add_theme_support( "html5", array('search-form', 'comment-list') );
    add_theme_support( 'post-formats',array('image','gallery','quote','audio','video','link') );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'automatic-feed-links' );
    add_editor_style("/assets/css/editor-style.css");
    add_image_size( 'home-square', 400, 400, true );
    register_nav_menu( "topmenu", __("Top Menu","philosophy") );
    register_nav_menus(array(
        'footer-left' => __('Footer Left Menu','philosophy'),
        'footer-middle' => __('Footer Middle Menu','philosophy'),
        'footer-right' => __('Footer Right Menu','philosophy'),
    ));
    
}
add_action("after_setup_theme","philosophy_theme_setup");

function philosophy_assets(){
    wp_enqueue_style('font-awesome', get_theme_file_uri("/assets/css/font-awesome/css/font-awesome.min.css"), null,"1.0");
    wp_enqueue_style('fonts-css', get_theme_file_uri("/assets/css/fonts.css"), null,"1.0");
    wp_enqueue_style('base-css', get_theme_file_uri("/assets/css/base.css"), null,"1.0");
    wp_enqueue_style('vendor-css', get_theme_file_uri("/assets/css/vendor.css"), null,"1.0");
    wp_enqueue_style('main-css', get_theme_file_uri("/assets/css/main.css"), null,"1.0");
    wp_enqueue_style('philosophy-css', get_stylesheet_uri(),null, VERSION);

    wp_enqueue_script('modernizer', get_theme_file_uri("/assets/js/modernizr.js"), null,VERSION);
    wp_enqueue_script('pace-min-js', get_theme_file_uri("/assets/js/pace.min.js"), null,VERSION);
    wp_enqueue_script('plugins-min-js', get_theme_file_uri("/assets/js/plugins.js"), array('jquery'),VERSION,true);
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
    wp_enqueue_script('main-js', get_theme_file_uri("/assets/js/main.js"), array('jquery'),VERSION,true);
    
    
}
add_action( "wp_enqueue_scripts", "philosophy_assets" );

// function for create pagination.

function philosophy_pagination(){
    global $wp_query;

    $links = paginate_links( array(
        'current' =>max(1, get_query_var('paged')),
        'total'   => $wp_query->max_num_pages,
        'type'    => 'list',
    ));

    $links =str_replace("page-numbers","pgn__num",$links);
    $links =str_replace("<ul class='pgn__num'>","<ul>",$links);
    $links =str_replace('next pgn__num','pgn__next',$links);
    $links =str_replace('prev pgn__num','pgn__prev',$links);

    echo wp_kses_post($links);
}

//ai hook er dara auto <p> tag generate howa bondho hoe jai.
remove_action('term_description','wpautop');


//widget creation
function philosophy_widget(){
    register_sidebar( array(
        'name' => __( 'About-us-Sidebar', 'philosophy' ),
        'id' => 'about_us',
        'description' => __( 'Widgets in this area will be shown on about us.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Contact Map Sidebar', 'philosophy' ),
        'id' => 'contact_map',
        'description' => __( 'Widgets in this area will be shown on contact page', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name' => __( 'Contact Information', 'philosophy' ),
        'id' => 'contact_info',
        'description' => __( 'Widgets in this area will be shown on contact page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-six tab-full %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Before Footer Right sidebar', 'philosophy' ),
        'id' => 'before_footer_right_side',
        'description' => __( 'Widgets in this area will be shown on footer.', 'philosophy' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer Right sidebar', 'philosophy' ),
        'id' => 'footer_right_side',
        'description' => __( 'Widgets in this area will be shown on footer.', 'philosophy' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Bottomcopy Right Section', 'philosophy' ),
        'id' => 'footer_copy_right',
        'description' => __( 'Widgets in this area will be shown on footer bottom area', 'philosophy' ),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name' => __( 'Header social Icon', 'philosophy' ),
        'id' => 'header_social_icon',
        'description' => __( 'Widgets in header.', 'philosophy' ),
        'before_widget' => '<ul class="header__social">',
        'after_widget'  => '</ul>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

}

add_action('widgets_init','philosophy_widget');

function philosophy_search_form($form){
    $homedir = home_url("/");
    $label = __('Search for:','philosophy');
    $button_label = __('Search','philosophy');
$newform = <<<FORM
        <form role="search" method="get" class="header__search-form" action="{$homedir}">
            <label>
                <span class="hide-content">{$label}</span>
                <input type="search" class="search-field" placeholder="Type Keywords" 
                value="" name="s" title="{$label}" autocomplete="off">
            </label>
            <input type="submit" class="search-submit" value="{$button_label}">
        </form>
FORM;
    return $newform;
}
add_filter('get_search_form','philosophy_search_form');
