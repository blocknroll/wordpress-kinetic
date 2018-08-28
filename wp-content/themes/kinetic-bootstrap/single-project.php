<?php get_header(); ?>

  <div class="container">

    <div class="page-header"></div>

    <div class="row">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="col-sm-12">
          <h2 class="project-title"><?php the_title(); ?></h2>

          <div class="overview img-responsive">
            <?php the_content(); ?>
          </div>
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

<?php get_footer(); ?>
