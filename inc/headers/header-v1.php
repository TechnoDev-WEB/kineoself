<?php $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>

<header class="header text-white" style="background-image: url(<?php echo $post_img_url; ?>);" data-scrim-top="8">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 mx-auto py-8">
            	<?php if ( is_page_template( 'page-contact.php') ) { ?>
            		<h1 class="display-3 fw-500"><?php the_field('citat_contact'); ?></h1>
                	<p class="lead-2 opacity-901 mt-6"><?php the_field('dezvoltare_citat'); ?></p>
            	<?php } elseif ( is_page_template( 'page-about.php' ) ) { ?>
            		<h1 class="display-3 fw-500"><?php the_field('titlu_baner'); ?></h1>
                	<p class="lead-2 opacity-901 mt-6"><?php the_field('descriere_baner'); ?></p>
                <?php } elseif ( is_page_template( 'page-development.php' ) ) { ?>
                    <h1 class="display-3 fw-500"><?php the_field('titlu_baner'); ?></h1>
                    <p class="lead-2 opacity-901 mt-6"><?php the_field('descriere_baner'); ?></p>
            	<?php } ?>
            </div>
        </div>
    </div>
</header>