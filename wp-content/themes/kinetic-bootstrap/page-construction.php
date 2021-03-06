<?php
/*
  Template Name: page-construction
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<!-- IMAGE ===================================================== -->
<div class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="item active">
      <img src="
        <?php echo get_template_directory_uri();?>/img/construction.jpg"
        class="img-responsive center-block" alt="construction image"
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


<!-- PAGE TITLE ===================================================== -->
<div class="page-title">
  <h1><?php the_title(); ?></h1>
</div>


<!-- CONTENT ===================================================== -->
<?php the_content(); ?>


<!-- SLOGAN ===================================================== -->
<div class="slogan">
  <h1>It’s time to Rethink Restoration.</h1>
</div>

<?php endwhile; else: ?>


<!-- fake 404 page ===================================================== -->
<div class="page-header">
  <h1>Oh No!</h1>
</div>
<p>No content is appearing for this page.</p>

<?php endif; ?>

<?php get_footer(); ?>
