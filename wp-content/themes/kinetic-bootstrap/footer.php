      <footer>

        <p>&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>

        <a href= <?php echo esc_url( home_url( '/' ) ); ?> >
          <img src="
            <?php echo get_template_directory_uri();
            ?>/img/kinetic-shield-17-full-web.svg" alt="kinetic logo"
          />
        </a>

        <address>
          <p><a href="tel:+17202022202">720-202-2202</a></p>
          <a href="mailto:email@rethinkrestoration.com">
            email@rethinkrestoration.com
          </a>
        </address>

        <div class="socialIcons">
          <p>
            <a href="https://www.facebook.com/rethinkrestoration"
              target="_blank">
              <span class="pe-so-facebook pe-2x"></span>
            </a>
            <a href="https://www.linkedin.com/company/kinetic-restoration"
              target="_blank"><span class="pe-so-linkedin pe-2x"></span>
            </a>
          </p>
        </div>

        <div id="bbb">
          <a href="https://www.bbb.org/denver/business-reviews/construction-and-remodeling-services/kinetic-restoration-in-englewood-co-90169775#sealclick"
            target="_blank">
            <img src="
              <?php echo get_template_directory_uri();?>/img/bbb-rev.png"
              alt="Click for the BBB Business Review of this Construction &amp;
              Remodeling Services in Englewood CO"
            />
          </a>
        </div>

        <div id="iicrc">
          <a href="img/IICRC_KINETIC_RESTORATION.pdf" target="_blank">
            <img src="
              <?php echo get_template_directory_uri();
              ?>/img/IICRC-Certified-Firm-white.png"
            />
          </a>
        </div>

      </footer>

      <div class="checkers">
        <div class="checkers_bg"></div>
      </div>

    </div>
    <!-- /container -->

    <?php wp_footer(); ?>

  </body>
</html>
