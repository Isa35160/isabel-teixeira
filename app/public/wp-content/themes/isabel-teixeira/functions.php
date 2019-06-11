<?php

add_action('wp_enqueue_scripts', 'insert_css');
function insert_css() {
    // On ajoute le css / js general du theme
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script('script');

    //On  ajoute le jQuery au thème
    wp_register_script('jquery2','https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js');
    wp_enqueue_script('jquery2');

    // FontAwesome
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
    wp_enqueue_style('font');

    // Google Fonts
    wp_enqueue_style( 'montserrat', 'https://fonts.googleapis.com/css?family=Montserrat&display=swap' );
    wp_enqueue_style('font-montserrat');

    wp_enqueue_style( 'openSans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap' );
    wp_enqueue_style('font-openSans');
 
    wp_enqueue_style( 'handlee', 'https://fonts.googleapis.com/css?family=Handlee&display=swap' );
    wp_enqueue_style('font-handlee');

}

add_theme_support('menus');
register_nav_menus(array(
    'menu-principal' => 'Navigation principale',
    'menu-secondaire' => 'Navigation secondaire',
));

add_action("wp_footer", "footer_text");
function footer_text()
{
}




// insertion de l'image a la une dans le theme

add_theme_support( 'post-thumbnails' );


function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );




//Custom Post Type
/* function create_post_type() {
    register_post_type('Portfolio',
        array(
            'label' => __('portfolio'),
            'singular_label' => __('portfolio'),
            'add_new_item' => __( 'Ajouter un projet' ),
            'edit_item' => __( 'Modifier un projet' ),
            'new_item' => __( 'Nouveau projet' ),
            'view_item' => __( 'Voir lle projet' ),
            'search_items' => __( 'Rechercher un projet' ),
            'not_found' => __( 'Aucune projet trouvé' ),
            'not_found_in_trash' => __( 'Aucune projet trouvé' ),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => true,
            'menu_icon' => 'dashicons-admin-multisite',
            'taxonomies' => array('technos'),
            'supports' => array( 'title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'portfolio', 'with_front' => true)
        )
    );

}
add_action( 'init', 'create_post_type' ); */


//Taxonomie

/* function themes_taxonomy() {
    register_taxonomy(
        'technos',
        'portfolio',
        array(
            'label' => 'Technos',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'technos',
                'with_front' => true
            ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'themes_taxonomy');
 */

// ACF

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));


}


// LOGIN PAGE

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo_login_page.png);
            height: 73px;
            width: 200px;
            background-size: 200px 73px;
            background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


      // ----- >LINK Logo - Login Page

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'isabel-teixeira - Front';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );


          // --------> Stylsheet & JS - Login Page

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/js/script.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

add_filter('use_block_editor_for_post', '__return_false');

// Disable Gutenberg
if (version_compare($GLOBALS['wp_version'], '5.0-beta', '>')) {
	
	// WP > 5 beta
	add_filter('use_block_editor_for_post_type', '__return_false', 100);
	
} else {
	
	// WP < 5 beta
	add_filter('gutenberg_can_edit_post_type', '__return_false');
	
}