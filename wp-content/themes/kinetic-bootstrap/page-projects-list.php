<?php
/*
  Template Name: page-projects-list
*/
?>

<?php get_header(); ?>


  <div class="container projects">

    <!-- page title row---------------------------------------------->
    <div class="row">
      <div class="col-md-12">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="page-header">
            <h1><?php the_title(); ?></h1>
          </div>

        <!-- fake 404 page -->
        <?php endwhile; else: ?>
          <div class="page-header">
            <h1>Oh No!</h1>
          </div>
          <p>No content is appearing for this page.</p>
        <?php endif; ?>

      </div>
    </div>


    <!-- projects ---------------------------------------------->
    <div class="row">
      <div class="col-md-12">

        <?php
          $args = array(
            'post_type' => 'project',
            'order' => 'ASC'
          );
          $the_query = new WP_Query( $args );
        ?>

        <?php
          if ( have_posts() ) :
          while ( $the_query->have_posts() ) :
          $the_query->the_post();
        ?>


        <!-- project title row ---------------------------------->
        <div class="row">
          <div class="col-md-12">
            <h2 class="project-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
          </div>
        </div>


        <!-- project overview ------------------------------------>
        <div class="row">
          <div class="col-md-12">
            <div class="overview">
              <p>
                <?php the_field('project_overview'); ?>
              </p>
            </div>
          </div>
        </div>


        <!-- project images row ----------------------------------->
        <div class="row before-after">

          <!-- first-image ---------------------------------------->
          <div class="col-sm-6">
            <a href="<?php the_permalink(); ?>">
              <?php
                $thumbnail_id = kdmfi_the_featured_image( 'before-image',
                                                          'medium-thumb' );
              ?>
            </a>
            <p>Before</p>
          </div>
          <!-- secondary-image ------------------------------------>
          <div class="col-sm-6">
            <a href="<?php the_permalink(); ?>">
              <?php
                $thumbnail_id = kdmfi_the_featured_image( 'after-image',
                                                          'medium-thumb' );
              ?>
            </a>
            <p>After</p>
          </div>

        </div>

        <hr>

        <?php endwhile; endif; ?>

      </div> <!-- projects col-md-12 end -->
    </div> <!-- projects row end -->
  </div> <!-- container end -->


<?php get_footer(); ?>
