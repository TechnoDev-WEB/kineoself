<?php
/**
 * Template part for displaying posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="section py-7" id="section-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <h6 class="divider mt-0 mb-6"><?php _e('General info', 'kineoself'); ?></h6>

                    <ul class="nav nav-tabs-outline nav-separated mb-5">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <?php _e('Reading Time:', 'kineoself'); ?> <?php echo get_estimated_reading_time( get_the_content() ); ?>
                            </a>
                        </li>
                        <?php if (!empty(gt_get_post_view())) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><?php _e('Views:', 'kineoself'); ?> <?= gt_get_post_view(); ?></a>
                        </li>
                         <?php } ?>
                    </ul>

                    <h6 class="divider mt-6 mb-3"><?php _e('Summary', 'kineoself'); ?></h6>

                    <?php the_content(); ?>

                    <!-- Arrow right accordion -->
                    <div class="accordion accordion-arrow-right" id="accordion-references">
                        <div class="card">
                            <h5 class="card-title">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-references">
                                    <?php the_field('referințe'); ?>
                                </a>
                            </h5>

                            <div id="collapse-references" class="collapse" data-parent="#accordion-references">
                                <div class="card-body">
                                    <?php the_field('conținut_referințe'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-7">
                        <div class="col-lg-6 ml-0">
                            <!-- Tags -->
                            <div>
                            <?php 

                            $postTags = get_the_tags();

                            if ( ! empty( $postTags ) ) 
                            {
                                foreach( $postTags as $post_tag ) 
                                { ?>
                                    <a class="badge badge-pill badge-secondary" href="<?php echo get_tag_link( $post_tag ); ?>"><?php echo $post_tag->name; ?></a>
                            <?php }
                            } 
                            ?>
                            </div>

                        </div>
                        <div class="col-lg-6 mr-0 text-right">
                            <?php 
                            echo do_shortcode('[Sassy_Social_Share align="right"]');
                                // echo do_shortcode( '[addtoany url="' . get_the_permalink() . '" title="' . get_the_title() . '"]' );
                             ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->