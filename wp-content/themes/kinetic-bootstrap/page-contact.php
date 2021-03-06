<?php
/*
  Template Name: page-contact
*/
?>

<?php get_header(); ?>

<div class="container">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


  <!-- CAROUSEL ===================================================== -->
  <div class="carousel slide carousel-fade" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="
          <?php echo get_template_directory_uri();?>/img/team2_color-2.jpg"
          class="img-responsive center-block"
          alt="The Kinetic founders in front of the red rocks of Colorado"
        />
        <div class="container">
          <div class="carousel-caption">
            <h1><a href="tel:+17202022202">720-202-2202</a></h1>
            <h3 class="emergency">
              Please call now for an immediate emergency response.
            </h3>
            <p>
              <a class="btn  btn-default"
                 href="mailto:email@rethinkrestoration.com"
                 role="button">EMAIL US
              </a>
            </p>
          </div>
        </div>
      </div>

      <div class="item">
        <img src="
          <?php echo get_template_directory_uri();?>/img/flag.jpg"
          class="img-responsive center-block"
          alt="The Colorado flag"
        />
        <div class="container">
          <div class="carousel-caption">
            <h1><a href="tel:+17202022202">720-202-2202</a></h1>
            <h3 class="emergency">
              Please call now for an immediate emergency response.
            </h3>
            <p>
              <a class="btn  btn-default"
                 href="mailto:email@rethinkrestoration.com"
                 role="button">EMAIL US
              </a>
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- END CAROUSEL ===================================================== -->



  <!-- CONTENT ===================================================== -->
  <?php the_content(); ?>

  <?php endwhile; else: ?>


  <!-- fake 404 page -->
  <article>
    <h2>Oh No!</h2>
    <p>No content is appearing for this page.</p>
  </article>

  <?php endif; ?>

</div>

<?php get_footer(); ?>
