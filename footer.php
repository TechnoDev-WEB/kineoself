
    </main>

<?php $home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) ); ?>

    <!-- Footer -->
     <footer class="footer text-white bg-img">
        <div class="container">
          <div class="row">

            <div class="col-12">
              <p><a href="<?php echo $home_url; ?>"><img src="https://kineoself.com/wp-content/uploads/2020/11/kineoself-logo-light.png" alt="Logo KineoSelf"></a></p>
            </div>

            <div class="col-xl-5">
              <p><?php the_field('descriere_subsol', 'option'); ?></p>
              <hr class="d-xl-none">
            </div>

            <?php get_template_part( 'inc/navs/nav', 'footer' ); ?>

          </div>
        </div>
        <hr>

        <div class="container">
            
          <div class="row gap-y">

            <div class="col-md-6 text-center text-md-left">
              <?php the_field('drepturi_de_autor_subsolu', 'option'); ?>
            </div>

            <div class="col-md-6 text-center text-md-right">
              <div class="social">
                <?php

                // Check rows exists.
                if( have_rows('link-uri_sociale', 'option') ):

                    // Loop through rows.
                    while( have_rows('link-uri_sociale', 'option') ) : the_row(); 

                      $sub_class = get_sub_field('clasa_rețea', 'option');
                        $sub_url = get_sub_field('link_rețea', 'option');
                        $sub_icon = get_sub_field('iconița_rețea', 'option');
                 ?>

                        <a rel="noopener" class="<?php echo $sub_class ?>" href="<?php echo $sub_url ?>" aria-label="<?php echo str_replace('social-','',$sub_class); ?>" target="_blank"><?php echo $sub_icon ?></a>

                <?php    // End loop.
                    endwhile;
                endif;
                ?>
              </div>
            </div>

          </div>
        </div>
    </footer><!-- /.footer -->

    <?php get_template_part( 'inc/search-forms/search','form-header' ); ?>

<?php wp_footer(); ?>
</body>
</html>