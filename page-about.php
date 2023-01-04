<?php 

/* Template Name: Despre Noi */

get_header();

 ?>

    <section class="section">
        <div class="container">
            <div class="row gap-y">
                <div class="col-md-3 mr-md-auto">
                    <p class="lead-4 text-right"><?php the_field('titlu_secundar'); ?></p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-600"><?php the_field('titlu_misiune'); ?></h6>
                    <p><?php the_field('continut_misiune'); ?></p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-600"><?php the_field('titlu_viziune'); ?></h6>
                    <p><?php the_field('continut_viziune'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="section py-9" style="background-image: url(<?php the_field('citat_imagine'); ?>)">
        <div class="overlay opacity-90" style="background-image: linear-gradient(90deg, #fff 0%, transparent 100%);"></div>
        <div class="container">
            <div class="row">
                <div class="col-10 col-md-7 col-xl-5">
                    <div class="section-dialog shadow-4">
                        <h5 class="fw-500"><?php the_field('citat_titlu'); ?></h5>
                        <blockquote class="blockquote text-left lead-1 mb-0 mt-5">
                          <p><?php the_field('citat_continut'); ?></p>
                          <footer><?php //_e( 'Someone famous in ', 'kineoself' ) ?><cite title="<?php the_field('citat_autor'); ?>"><?php the_field('citat_autor'); ?></cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="section">
        <div class="container">
            <header class="section-header">
                <h2><?php //the_field('istoric_titlu'); ?></h2>
                <hr>
                <p class="lead"><?php //the_field('istoric_descriere'); ?></p>
            </header>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <?php //if( have_rows('istoric_evenimente') ): ?>
                        <ol class="timeline">
                        <?php //while( have_rows('istoric_evenimente') ): the_row(); ?>
                            <li class="timeline-item">
                                <h4><?php //the_sub_field('titlu'); ?></h4>
                                <p class="small-2"><time datetime="2017-02-08"><?php //the_sub_field('data'); ?></time></p>
                                <p><img class="rounded shadow-3" src="<?php //the_sub_field('imagine'); ?>" alt="<?php //_e('Short History', 'kineoself') ?>"></p>
                                <p><?php //the_sub_field('descriere'); ?></p>
                            </li>
                        <?php //endwhile; ?>
                        </ol>
                    <?php //endif; ?>
                </div>
            </div>
        </div>
    </section> -->

    <section class="section">
        <div class="container">
            <header class="section-header">
                <small><?php the_field('echipa_tag'); ?></small>
                <h2><?php the_field('echipa_titlu'); ?></h2>
                <hr>
                <p class="lead"><?php the_field('echipa_descriere'); ?></p>
            </header>

            <div class="row gap-y">
                <?php
                $users = get_users();
                
                foreach ( $users as $user ) {
                    if (function_exists('get_wp_user_avatar_src')) {
                    // if (get_wp_user_avatar()) {
                        $user_image_url = get_wp_user_avatar_src($user->ID, 'thumbnail');
                    }
                ?>
                    <div class="col-md-4 team-2">
                        <!-- <a href="#"> -->
                            <img class="about-author" src="<?php echo $user_image_url; ?>" alt="<?php echo esc_html( $user->display_name ); ?>">
                        <!-- </a> -->
                        <h5><?php echo esc_html( $user->display_name ); ?></h5>
                        <small>
                            <?php
                            $desc = get_user_meta($user->ID, 'nickname', true);
                            echo apply_filters( 'wpml_translate_single_string', $desc, 'Authors', 'nickname_'.$user->ID); 
                            ?> 
                        </small>
                        <p>
                            <?php 
                            //$desc = get_user_meta($user->ID, 'description', true);
                            //echo apply_filters( 'wpml_translate_single_string', $desc, 'Authors', 'description_'.$user->ID); 
                            ?>
                        </p>
                        <br>
                        <?php if( have_rows('retele_sociale', 'user_' . $user->ID) ): ?>
                            <div class="social social-brand">
                            <?php while( have_rows('retele_sociale', 'user_' . $user->ID) ): the_row(); ?>
                                <a class="<?php the_sub_field('retea_clasa'); ?>" href="<?php the_sub_field('retea_link'); ?>">
                                    <?php the_sub_field('retea_iconita'); ?>
                                </a>
                            <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>