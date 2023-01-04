<?php 

/* Template Name: Dezvoltare */

get_header();

 ?>

    <section class="section">
        <div class="container">

            <?php if( have_rows('etape') ): ?>
                <div class="row gap-y align-items-center py-7">
                <?php 
                $index = 1;
                while( have_rows('etape') ): the_row(); 
                    $remainder = $index%2;
                    if($remainder != 0){
                ?>
                     <div class="col-md-6 text-center">
                        <?php 
                        $image = get_sub_field('imagine');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>

                    <div class="col-md-5 ml-auto text-center text-md-left">
                      <p class="lead-9 fw-900 lh-1 opacity-10"><?php the_sub_field('numar'); ?></p>
                      <h3><?php the_sub_field('titlu'); ?></h3>
                      <p><?php the_sub_field('descriere'); ?></p>
                    </div>
                    <?php } else { ?>
                        <div class="row gap-y align-items-center py-7">
                            <div class="col-md-5 mr-auto text-center text-md-left">
                              <p class="lead-9 fw-900 lh-1 opacity-10"><?php the_sub_field('numar'); ?></p>
                              <h3><?php the_sub_field('titlu'); ?></h3>
                              <p><?php the_sub_field('descriere'); ?></p>
                            </div>

                            <div class="col-md-6 text-center order-first order-md-last">
                                <?php 
                                $image = get_sub_field('imagine');
                                if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                        </div>
                <?php }
                $index++;
                endwhile; 

                ?>
                </div>
            <?php endif; ?>

        </div>
    </section>

<?php get_footer(); ?>