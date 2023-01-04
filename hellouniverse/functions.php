<?php
add_theme_support('title-tag');
add_theme_support('menus');
add_theme_support('post-thumbnails', array('post', 'page'));

register_nav_menus( array(
    'header_menu' => 'Header Menu',
) );



function add_jquery_in_head() {
  wp_enqueue_script('jquery', false, array(), false, false);
}
add_filter('wp_enqueue_scripts', 'add_jquery_in_head', 1);




function front_end_scripts() {
  wp_enqueue_style('theme-stylesheet', get_stylesheet_uri(), array(), '1.1');
  wp_enqueue_style('roboto-font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap', array(), '1.1');
  wp_enqueue_script('theme-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.1', true);
}
add_action( 'wp_enqueue_scripts', 'front_end_scripts' );





function admin_scripts() {
  wp_enqueue_style( 'custom_wp_admin_css', get_stylesheet_uri(), false, '2.1.1' );
}
add_action( 'admin_enqueue_scripts', 'admin_scripts' );







add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check to see if function exists.
    if( function_exists('acf_add_options_page') ) {

      // Register options page.
      $option_page = acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position'      => 12.5
      ));
    }
} // end my_acf_op_init()





add_action('acf/init', 'acf_init_block_types');
function acf_init_block_types() {
  if( function_exists('acf_register_block_type') ) {

    acf_register_block_type(array(
      'name'            => 'full-width-image',
      'title'           => 'Full width image',
      'render_template' => 'blocks/full-width-image/block.php',
      'keywords'        => array( 'image', 'full width' ),
    ));

  } // end if( function_exists('acf_register_block_type') )
} // end acf_init_block_types
?>