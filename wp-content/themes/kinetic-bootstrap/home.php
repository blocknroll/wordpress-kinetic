<?php get_header(); ?>

  <div class="container blog">
    <div class="row">
      <div class="col-md-12">

        <!-- puts the page title at the top ("Blog") -->
        <div class="page-header">
          <h1><?php wp_title( '' ); ?></h1>
        </div>


        <!-- Post -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <article class="post">

            <!-- image -->
            <?php
              $thumbnail_id   = get_post_thumbnail_id();
              $thumbnail_url  = wp_get_attachment_image_src( $thumbnail_id,
                                                            'thumbnail-size',
                                                             true );
              $thumbnail_meta = get_post_meta( $thumbnail_id,
                                               '_wp_attachment_image_alt',
                                               true );
            ?>
            <!-- image src + image tag + alt -->
            <div class="featured-image">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php echo $thumbnail_url[0]; ?>"
                     alt="<?php echo $thumbnail_meta; ?>">
              </a>
            </div>

            <h2 class="post-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <p class="post-info"><em>
              By <?php the_author(); ?>
              on <?php echo the_time('l, F jS, Y'); ?>
              in <?php the_category( ', '); ?>.
              <!-- <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a> -->
            </em></p>

            <div class="post-body">
              <?php the_excerpt(); ?>
            </div>

            <hr>

          </article>

        <?php endwhile; else: ?>

          <!-- fake 404 page -->
          <article>
            <h2>Oh No!</h2>
            <p>No content is appearing for this page.</p>
          </article>

        <?php endif; ?>

      </div>
    </div>
  </div>

<?php get_footer(); ?>
