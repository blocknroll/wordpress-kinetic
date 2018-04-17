<?php

// CSS //////////////////////////////////
  function theme_styles() {
    wp_enqueue_style( 'bootstrap_css',
                       get_template_directory_uri() .
                       '/css/bootstrap.min.css' );

    wp_enqueue_style( 'ie10-viewport-bug-workaround_css',
                       get_template_directory_uri() .
                       '/css/ie10-viewport-bug-workaround.css' );

    wp_enqueue_style( 'main_css',
                       get_template_directory_uri() .
                       '/style.css' );

    wp_enqueue_style( 'pe-icon-social_css',
                      get_template_directory_uri() .
                      '/fonts/pe-icon-social/css/pe-icon-social.css' );

    wp_enqueue_style( 'helper_css',
                      get_template_directory_uri() .
                      '/fonts/pe-icon-social/css/helper.css' );

    wp_enqueue_style( 'kinetic_css',
                       get_template_directory_uri() .
                       '/css/kinetic.css' );
  }
  add_action( 'wp_enqueue_scripts', 'theme_styles' );



// JS //////////////////////////////////
  function theme_js() {

    global $wp_scripts;

    wp_register_script( 'html5_shiv',
                        'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js',
                        '', '', false );
    wp_register_script( 'respond_js',
                        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
                        '', '', false );

    $wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
    $wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'bootstrap_js',
                        get_template_directory_uri() . '/js/bootstrap.min.js',
                        array('jquery'), '', true );
    wp_enqueue_script( 'ie10-viewport-bug-workaround_js',
                        get_template_directory_uri() .
                        '/js/ie10-viewport-bug-workaround.js', '', '', true );
    wp_enqueue_script( 'theme_js',
                        get_template_directory_uri() . '/js/theme.js',
                        array('jquery', 'bootstrap_js'), '', true );
  }
  add_action( 'wp_enqueue_scripts', 'theme_js' );



// Register Custom Navigation Walker /////////////////////////////
  require_once get_template_directory() . '/wp-bootstrap-navwalker.php';

  register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'kinetic-bootstrap' ),
  ) );



// GOOGLE FONTS //////////////////////////////////

  // Enqueue Google Fonts using a function
  function load_google_fonts() {

    // Setup font arguments
    $query_args = array(
      'family' => 'Open+Sans:300,700|Open+Sans+Condensed:300,300italic,700',
      'subset' => 'latin,latin-ext',
    );

    // A safe way to register a CSS style file for later use
    wp_register_style( 'google-fonts',
                        add_query_arg( $query_args, "//fonts.googleapis.com/css" ),
                        array(), null );

    // A safe way to add/enqueue a CSS style file to a WordPress generated page
    wp_enqueue_style( 'google-fonts' );
  }

  add_action( 'wp_enqueue_scripts', 'load_google_fonts' );



// post-thumbnails //////////////////////////////////
  add_theme_support( 'post-thumbnails' );

// Add Custom image sizes
// Note: 'true' enables hard cropping so each image is exactly those dimensions and automatically cropped
add_image_size( 'feature-image', 700, 420, true );
add_image_size( 'medium-thumb', 300, 156, true );
add_image_size( 'small-thumb', 75, 75, true );



// multiple featured images //////////////////////////////////
add_filter( 'kdmfi_featured_images', function( $featured_images ) {
  $args_1 = array(
    'id' => 'before-image',
    'label_name' => 'Before Image',
    'label_set' => 'Set Before Image',
    'label_remove' => 'Remove Before Image',
    'label_use' => 'Set Before Image',
    'post_type' => array( 'project' ),
  );

  $args_2 = array(
    'id' => 'after-image',
    'label_name' => 'After Image',
    'label_set' => 'Set After Image',
    'label_remove' => 'Remove After Image',
    'label_use' => 'Set After Image',
    'post_type' => array( 'project' ),
  );

  // Add the featured images to the array, so that you are not overwriting images that maybe are created in other filter calls
  $featured_images[] = $args_1;
  $featured_images[] = $args_2;

  // Important! Return all featured images
  return $featured_images;
});



// Widgets //////////////////////////////////
  function create_widget($name, $id, $description) {
    register_sidebar(array(
      'name'          => __( $name ),
      'id'            => $id,
      'description'   => __( $description ),
      'before_widget' => '<div class="widget">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>'
    ));
  }



// Columns ///////////////////////////////////
  create_widget( 'Front Page Left',
                 'front-left',
                 'Displays on the left of the homepage' );
  create_widget( 'Front Page Center',
                 'front-center',
                 'Displays on the center of the homepage' );
  create_widget( 'Front Page Right',
                 'front-right',
                 'Displays on the right of the homepage' );



// Sidebars //////////////////////////////////
  create_widget( 'Page Sidebar',
                 'page',
                 'Displays on the side of pages with a sidebar' );
  create_widget( 'Blog Sidebar',
                 'blog',
                 'Displays on the side of pages in the blog' );



// Admin bar toggle /////////////////////////////
  add_filter( 'show_admin_bar', '__return_false' );

?>
