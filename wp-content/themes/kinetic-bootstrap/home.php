<?php get_header(); ?>

  <div class="container">
    <div class="row">

      <div class="col-md-9">

        <!-- puts the page title at the top ("Blog") -->
        <div class="page-header">
          <h1><?php wp_title( '' ); ?></h1>
        </div>


        <!-- Loop for carousel = Custom Query -->
        <?php
          $args = array(
            'post-type'     => 'post',
            'category_name' => 'featured'
          );
          $the_query = new WP_Query( $args );
        ?>


        <!-- Carousel -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php
              if ( have_posts() ) :
              while ( $the_query->have_posts() ) :
              $the_query->the_post();
            ?>

            <!-- loop through posts... -->
            <!-- if current post is 1st, (index 0), make class="active" -->
            <li data-target="#carousel-example-generic"
                data-slide-to="<?php echo $the_query->current_post; ?>"
                class="<?php if($the_query->current_post == 0):?>active
                       <?php endif; ?>">
            </li>

            <?php endwhile; endif; ?>
          </ol>

          <!-- starts loop over at 0... -->
          <!-- so it can be used to get the actual image -->
          <?php rewind_posts(); ?>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            <?php
              if ( have_posts() ) :
              while ( $the_query->have_posts() ) :
              $the_query->the_post();
            ?>

            <div class="item <?php if($the_query->current_post == 0):?>active
                             <?php endif; ?>">
              <!-- gets direct URL for image -->
              <?php
                $thumbnail_id   = get_post_thumbnail_id();
                $thumbnail_url  = wp_get_attachment_image_src( $thumbnail_id,
                                                              'thumbnail-size',
                                                               true );
                $thumbnail_meta = get_post_meta( $thumbnail_id,
                                                 '_wp_attachment_image_alt',
                                                 true );
              ?>
              <!-- link to image + image tag + alt -->
              <a href="<?php the_permalink(); ?>">
                <img src="<?php echo $thumbnail_url[0]; ?>"
                     alt="<?php echo $thumbnail_meta; ?>">
              </a>

              <div class="carousel-caption">
                <?php the_title(); ?>
              </div>
            </div>

            <?php endwhile; endif; ?>

          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <!-- End Carousel -->


        <!-- Post -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <article class="post">
            <h2>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <p><em>
              By <?php the_author(); ?>
              on <?php echo the_time('l, F jS, Y'); ?>
              in <?php the_category( ', '); ?>.
              <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
            </em></p>
            <?php the_excerpt(); ?>
            <hr>
          </article>


        <!-- fake 404 page -->
        <?php endwhile; else: ?>

          <article>
            <h2>Oh No!</h2>
          </article>
          <p>No content is appearing for this page.</p>

        <?php endif; ?>

      </div>


      <?php get_sidebar( 'blog' ); ?>

    </div>

<?php get_footer(); ?>
