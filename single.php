<?php get_header();

// Set number of vist for each post
gt_set_post_view(); 

	// Start the Loop.
	while ( have_posts() ) : the_post();

		get_template_part( 'content', 'post' );
		?>

		<div class="section bg-gray py-7">
    		<div class="container">
      			<div class="row">
        			<div class="col-lg-8 mx-auto">
        				<?php 

        				if ( comments_open() || get_comments_number() ) {
							comments_template();
						} else {
                        ?>
                            <h4 class="nocomments mb-0">
                                <?php _e('Comments are closed for this article.', 'kineoself'); ?>
                            </h4>

                        <?php } ?>
        			</div>
        		</div>
        	</div>
        </div>

	<?php endwhile; // End the loop. 

get_footer(); ?>