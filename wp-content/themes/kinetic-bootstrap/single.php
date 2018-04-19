<?php get_header(); ?>

  <div class="container blog">
    <div class="row">

      <div class="col-md-12">

        <article class="post">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="page-header">

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
              <p class="featured-image">
                <img src="<?php echo $thumbnail_url[0]; ?>"
                     alt="<?php echo $thumbnail_meta; ?>">
              </p>

              <h1><?php the_title(); ?></h1>
              <p><em>
                By <?php the_author(); ?>
                on <?php echo the_time('l, F jS, Y'); ?>
                in <?php the_category( ', '); ?>.
                <!-- <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a> -->
              </em></p>
            </div>
            <div class="postBody">
              <?php the_content(); ?>
            </div>

          </article>

          <?php endwhile; else: ?>


          <!-- fake 404 page -->
          <div class="page-header">
            <h1>Oh No!</h1>
          </div>
          <p>No content is appearing for this page.</p>

        <?php endif; ?>

      </div>


    </div>
  </div>

<?php get_footer(); ?>
