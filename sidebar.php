<div class="sidebar px-4 py-md-0">	                
    <?php get_template_part( 'inc/search-forms/search', 'form-sidebar'); ?>

    <hr>

    <h6 class="sidebar-title"><?php _e('Categories','kineoself'); ?></h6>

    <div class="row link-color-default fs-14 lh-24">

        <?php

        $categories = get_categories( 
            array(
                'orderby' => 'name',
                'order'   => 'ASC',
                'hide_empty'      => true,
                
            ) 
        );

        foreach( $categories as $category ) {
            $category_link = esc_url( get_category_link( $category->term_id ) );
        ?>

            <div class="col-6"><a href="<?php echo $category_link; ?>"><?php echo $category->name; ?></a></div>

        <?php } ?>

    </div>

    <hr>

    <h6 class="sidebar-title"><?php _e('Most popular','kineoself'); ?></h6>

    <?php

    query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=6');

    if (have_posts()) : while (have_posts()) : the_post();

        $top_img_url = get_the_post_thumbnail_url(get_the_ID(),'top-post');

        $thumb_id = get_post_thumbnail_id(get_the_ID());

        if ( $thumb_id ) {

            $alt_top = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

            if ( ! empty( $thumb_id ) ) {

                if ( ! empty( $alt_top ) ) {

                    $alt_top = $alt_top;

                } else {

                    $alt_top = __( 'Kineoself', 'kineoself' ); 

                }

            }

        }

    ?>

        <a class="media text-default align-items-center mb-5" href="<?php the_permalink(); ?>">

            <img class="rounded w-65px mr-4" src="<?php echo $top_img_url; ?>" alt="<?php echo $alt_top; ?>">

            <p class="media-body small-2 lh-4 mb-0"><?php the_title(); ?></p>

        </a>

    <?php

    endwhile; endif;

    wp_reset_query();

    ?>
    <hr>

    <h6 class="sidebar-title"><?php _e('Tags','kineoself'); ?></h6>
    <div class="gap-multiline-items-1">
        <?php 
        $postTags = get_tags();

        if ( ! empty( $postTags ) ) {

            foreach( $postTags as $post_tag ) { ?>

                <a class="badge badge-secondary" href="<?php echo get_tag_link( $post_tag ); ?>"><?php echo $post_tag->name; ?></a>

        <?php }
        }
        ?>
    </div>

</div>