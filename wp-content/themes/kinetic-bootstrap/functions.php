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

    wp_enqueue_style( 'kinetic_css',
                       get_template_directory_uri() .
                       '/css/kinetic.css' );

    wp_enqueue_style( 'pe-icon-social_css',
                      get_template_directory_uri() .
                      '/fonts/pe-icon-social/css/pe-icon-social.css' );

    wp_enqueue_style( 'helper_css',
                      get_template_directory_uri() .
                      '/fonts/pe-icon-social/css/helper.css' );
  }
  add_action( 'wp_enqueue_scripts', 'theme_styles' );



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



// Menu support /////////////////////////////

// add_filter( 'show_admin_bar', '__return_false' );

  add_theme_support( 'menus' );

  function register_theme_menus() {
    register_nav_menus(
        array(
          'header-menu' => __( 'Header Menu' )
        )
      );
  }
  add_action( 'init', 'register_theme_menus' );



// post-thumbnails //////////////////////////////////

  add_theme_support( 'post-thumbnails' );



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
?>
