<!-- Header -->
<?php 

$post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 

$get_author_id = get_the_author_meta('ID');
$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 50));

 ?>
<header class="header text-white h-fullscreen pb-80" style="background-image: url(<?php echo esc_url($post_img_url) ?>);" data-scrim-top="8">
    <div class="container text-center">

        <div class="row h-100">
            <div class="col-lg-8 mx-auto align-self-center">

                <p class="opacity-80 text-uppercase small ls-1 fw-600">
                    <?php 
                    $categories = get_the_category();
                    $separator = ', ';
                    $output = '';
                    if ( ! empty( $categories ) ) {
                        foreach( $categories as $category ) {
                            $output .= '<span class="cat_name">' . esc_html( $category->name ) . '</span>' . $separator;
                        }
                        echo trim( $output, $separator );
                    }
                     ?>
                </p>
                <h1 class="display-3 fw-500 mt-7 mb-8"><?php the_title(); ?></h1>
                <p class="fw-500">
                    <span class="opacity-80"><?php _e('By', 'kineoself') ?></span> <span class="text-white"><?php the_author(); ?></span>
                </p>
                <p><img class="avatar avatar-md" src="<?php echo $get_author_gravatar; ?>" alt="<?php the_title(); ?>"></p>
            </div>

            <div class="col-12 align-self-end text-center">
                <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
            </div>

        </div>

    </div>
</header><!-- /.header -->