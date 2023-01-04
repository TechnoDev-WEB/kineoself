<?php get_header(); ?>

	<div class="section bg-gray">
        <div class="container">
          	<div class="row">

          		<div class="col-md-8 col-xl-9">
          			<div class="row gap-y">
					<?php 

					$term = get_queried_object();
					$termId = $term->term_id;

					if (!isset($termId)) {
						$termId = '-1';
					}

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					if (is_category()) {
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 6,
							'cat'         => $termId,
							'paged' => $paged
						);
					} else if (is_tag()) {
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 6,
							'tag_id'         => $termId,
							'paged' => $paged
						);
					} else {
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 6,
							'paged' => $paged
						);
					}

					query_posts($args);

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
								<div class="card border hover-shadow-6 d-block">
					                <a href="<?php the_permalink(); ?>">
					                	<img class="card-img-top" src="<?php echo $featured_img_url; ?>" alt="<?php echo $alt_text; ?>">
					                </a>
					                <div class="card-body">
					                  	<div class="card-title"><a class="text-dark fw-600" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					                  	<div class="mb-3 fw-500 font-weight-400">
	                                        <small><?php echo get_the_excerpt(); ?></small>
	                                    </div>
					                  	<a class="fw-600 fs-12 text-green" href="<?php the_permalink(); ?>"><?php _e('Read more', 'kineoself'); ?> <i class="ti-angle-right fs-7 pl-2"></i></a>
					                </div>
					            </div>
							</div>

						<?php endwhile; 
						wp_reset_postdata(); ?>

					</div>

					<?php else : ?>

						<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<h1><?php _e('Nimic găsit', 'kineoself'); ?></h1>
						</div>

					<?php endif; ?>
					
					<?php get_template_part( 'pagination' ); ?>
				</div>

				<div class="col-md-4 col-xl-3">
              		<?php get_sidebar(); ?>
				</div>

		</div>
	</div>
</div>

<?php get_footer(); ?>