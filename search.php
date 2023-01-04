<?php get_header(); ?>


	<div class="section bg-gray">
        <div class="container">
          	<div class="row">
          		<div class="col-md-8 col-xl-9">
          			<div class="row gap-y">
					<?php 
					if (have_posts()) : 
						while (have_posts()) : the_post(); ?>
						<?php 

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

							<div class="col-md-6">
								<div class="card border hover-shadow-6 mb-6 d-block">
									<a href="<?php the_permalink(); ?>">
										<img class="card-img-top" src="<?php echo $featured_img_url; ?>" alt="<?php echo $alt_text; ?>">
									</a>
									<div class="p-6 text-center">

										<p>
											<?php 
											foreach((get_the_category()) as $category){ 
												$category_link = get_category_link( $category->term_id );
											?>
												<a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="<?php echo $category_link; ?>"><?php echo $category->name ?></a>
											<?php } ?>
										</p>

										<h5 class="mb-0">
											<a class="text-dark" href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h5>

									</div>
								</div>
							</div>

						<?php endwhile; ?>
					<?php else : ?>

						<div class="col-12 text-center">
							<h2><?php _e('Not Found', 'kineoself') ?></h2>
					        <p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'kineoself') ?></p>
						</div>

                    <?php endif; ?>

                    </div>

					<?php get_template_part( 'pagination' ); ?>

				</div>

				<div class="col-md-4 col-xl-3">
              		<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>