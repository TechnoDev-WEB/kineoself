<?php get_header(); ?>

    <?php 
    $ab_title = get_field('despre_titlu');
    $ab_desc = get_field('despre_continut');
    $ab_img = get_field('despre_imagine');
     ?>
    <section id="section-next" class="section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center text-center text-md-left">
                    <h2><?php echo $ab_title; ?></h2><br>
                    <p class="font-size-16"><?php echo $ab_desc; ?></p>
                </div>

                <div class="col-md-6 mx-auto text-center mt-8 mt-md-0">
                    <?php if( !empty( $ab_img ) ): ?>
                        <img class="shadow-6" src="<?php echo esc_url($ab_img['url']); ?>" alt="<?php echo esc_attr($ab_img['alt']); ?>"  data-aos="fade-left"/>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="section bg-gray">
        <div class="container">
            <?php if( have_rows('caracteristici') ): ?>
                <div class="row gap-y">
                <?php while( have_rows('caracteristici') ): the_row(); 
                    $image = get_sub_field('image');
                    ?>
                    <div class="col-md-4 feature-2">
                        <p class="feature-icon"><?php the_sub_field('iconita'); ?></p>
                        <strong class="font-size-20"><?php the_sub_field('titlu'); ?></strong>
                        <p class="font-size-16"><?php the_sub_field('descriere'); ?></p>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <hr class="w-50px ml-0">
            <p>
                <?php 
                $link = get_field('caracteristici_link');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    ?>
                    <a class="text-uppercase fw-600 ls-2 small-2 text-green" href="<?php echo esc_url( $link_url ); ?>" data-provide="lightbox"><?php echo esc_html( $link_title ); ?> <i class="ti-arrow-right fs-10 ml-1"></i></a>
                <?php endif; ?>
            </p>
        </div>
    </section>

    <?php 
    $ce_img = get_field('cercetare_imagine');
    $ce_title = get_field('cercetare_titlu');
    $ce_desc = get_field('cercetare_descriere');
     ?>
    <section class="section overflow-hidden">
        <div class="container">
            <div class="row gap-y align-items-center">

                <div class="col-lg-6 mx-auto">
                    <h2><?php echo $ce_title; ?></h2>
                    <p class="mb-6 font-size-16"><?php echo $ce_desc; ?></p>

                    <?php if( have_rows('cercetare_etape') ): ?>
                        <div class="row">
                        <?php 
                        $count = 0;
                        while( have_rows('cercetare_etape') ): the_row(); 
                        $image = get_sub_field('image');
                            ?>
                            <div class="col-md-6">
                                <p><i class="fa fa-caret-right text-lightest mr-2"></i> <?php the_sub_field('nume'); ?></p>
                            </div>
                            <?php 
                            $count++;
                        endwhile; 
                        ?>
                        </div>
                    <?php endif; ?>

                    <p class="mt-4">
                        <?php 
                        $ce_link = get_field('cercetare_link');
                        if( $ce_link ): 
                            $link_url = $ce_link['url'];
                            $link_title = $ce_link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="text-uppercase fw-600 ls-2 small-2 text-green" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <i class="ti-arrow-right fs-10 ml-1"></i></a>
                        <?php endif; ?>
                    </p>
                </div>

                <div class="col-lg-6 align-self-center order-md-first">
                    <?php if( !empty( $ce_img ) ): ?>
                        <img src="<?php echo esc_url($ce_img['url']); ?>" alt="<?php echo esc_attr($ce_img['alt']); ?>" data-aos="fade-right"/>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="posts" class="section bg-gray">
        <div class="container">
            <h2 class="text-center"><?php _e('Latest news', 'kineoself') ?></h2>
            <div class="row gap-y mt-8">
                <?php 
                $args = array('post_type' => 'post', 'posts_per_page' => 4 );
                $loop = new WP_Query($args);
                $key = 0;

                    while ($loop->have_posts()) : $loop->the_post();

                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'blog-thumb');
                        $thumb_id = get_post_thumbnail_id(get_the_ID());

                        if ( $thumb_id ) {
                            $alt_text = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

                            if ( ! empty( $thumb_id ) ) {
                                if ( ! empty( $alt_text ) ) {
                                        $alt_text = $alt_text;
                                } else {
                                        $alt_text = __( 'Kineoself', 'kineoself' ); 
                                }
                            }
                        } 
                        ?>

                        <div class="col-md-6 col-lg-4 <?php echo ($key > 2) ? 'd-lg-none' : '' ?>">
                            <div class="card border hover-shadow-6 d-block">
                                <a href="<?php the_permalink(); ?>">
                                <img class="card-img-top" src="<?php echo $featured_img_url; ?>" alt="<?php echo $alt_text; ?>"></a>
                                <div class="card-body">
                                    <div class="card-title"><a class="text-dark fw-600" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                    <div class="mb-3 font-weight-400">
                                        <small><?php echo get_the_excerpt(); ?></small>
                                    </div>
                                    <a class="fw-600 fs-12 text-green" href="<?php the_permalink(); ?>" rel="dofollow"><?php _e( 'Read more', 'kineoself' ); ?> <i class="ti-angle-right fs-7 pl-2"></i></a>
                                </div>
                            </div>
                        </div>

                    <?php 
                        $key++;
                    endwhile; 
                    wp_reset_postdata(); 
                    ?>
            </div>

            <br><br>
            <p class="text-center">
                <?php 
                $blink = get_field('blog_link');
                if( $blink ): 
                    $link_url = $blink['url'];
                    $link_title = $blink['title'];
                    ?>
                    <a class="text-uppercase fw-600 ls-2 small-2 text-green" href="<?php echo esc_url( $link_url ); ?>" rel="dofollow"><?php echo esc_html( $link_title ); ?> <i class="ti-arrow-right fs-10 ml-1"></i></a>
                <?php endif; ?>                
            </p>
        </div>
    </section>

    <section class="section pb-0 overflow-hidden">
        <div class="container">
            <header class="section-header">
                <small><?php echo the_field('tag_statistica'); ?></small>
                <h2><?php echo the_field('titlu_statistica'); ?></h2>
                <hr>
                <p class="font-size-16"><?php echo the_field('descriere_statistica'); ?></p>
            </header>

            <?php 
            if( have_rows('statistici') ): 
                $index = 0;
                ?>
                <div class="row gap-y text-center">
                <?php while( have_rows('statistici') ): the_row(); 
                    $st_img = get_sub_field('imagine');
                    if ($index == 0) {
                        $data_os = 300;
                        $data_sh = 4;
                        $padd = 7;
                    } elseif ($index == 1) {
                        $data_os = 0;
                        $data_sh = 6;
                        $padd = 5;
                    } elseif ($index == 2) {
                        $data_os = 600;
                        $data_sh = 4;
                        $padd = 7;
                    } 
                    ?>
                    <div class="col-md-4 d-flex flex-column">
                        <div class="mb-7">
                            <p class="text-green lead-7 mb-0"><?php the_sub_field('valoare'); ?></p>
                            <p><?php the_sub_field('titlu'); ?></p>
                        </div>
                        <div class="px-<?php echo $padd; ?> mt-auto">
                            <?php if( !empty( $st_img ) ): ?>
                                <img class="shadow-<?php echo $data_sh; ?>" src="<?php echo esc_url($st_img['url']); ?>" alt="<?php echo esc_attr($st_img['alt']); ?>" data-aos="slide-up"  data-aos-delay="<?php echo $data_os; ?>"/>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php 
                $index++;
                endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
      
    <section class="section bg-fixed text-white py-10" style="background-image: url(<?php the_field('abonare_imagine'); ?>)" data-overlay="6">
        <div class="container text-center">
            <h2><?php the_field('abonare_titlu'); ?></h2>
            <br>
            <p class="font-size-16"><?php the_field('abonare_descriere'); ?></p>

            <div class="row mt-8">
                <div class="col-md-8 col-xl-6 input-glass input-round mx-auto">
                    <?php echo do_shortcode( '[mc4wp_form id="492"]' ) ?>
                </div>
            </div>

        </div>
    </section>

<?php get_footer(); ?>