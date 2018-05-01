<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>
      <?php bloginfo( 'name' ); ?>
      <?php wp_title( '|', true, 'left' ); ?>
    </title>

    <?php wp_head(); ?>
  </head>


  <body <?php body_class(); ?> >

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href= <?php echo esc_url( home_url( '/' ) ); ?> >
            <img src="
              <?php echo get_template_directory_uri();
              ?>/img/kinetic-shield-17-full-web.svg" alt="kinetic logo"
            />
          </a>
        </div>
        <?php
          wp_nav_menu( array(
              'theme_location'    => 'primary',
              'depth'             => 2,
              'container'         => 'div',
              'container_class'   => 'collapse navbar-collapse',
              'container_id'      => 'navbar-collapse',
              'menu_class'        => 'nav navbar-nav navbar-right',
              'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
              'walker'            => new WP_Bootstrap_Navwalker())
          );
        ?>
      </div>
    </div>
