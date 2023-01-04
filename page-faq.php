<?php 

/* Template Name: FAQ */

get_header(); 
?>

	<div class="container">
        <div class="row">
	        <?php if( have_rows('grup') ): ?>
			    <div class="col-md-7 col-xl-8 mr-md-auto py-8">
			    	<article>
				    <?php while( have_rows('grup') ): the_row(); ?>
				        <h3 id="<?php the_sub_field('categorie'); ?>"><?php the_sub_field('titlu_general'); ?></h3>
				        <br>
				        <?php if( have_rows('intrebari_si_raspunsuri') ): ?>
				        	<?php while( have_rows('intrebari_si_raspunsuri') ): the_row(); ?>
				        		<h6 data-provide="anchor"><?php the_sub_field('intrebare') ?></h6>
					            <p><?php the_sub_field('raspuns') ?></p>

					            <hr class="hr-dash">
				        	<?php endwhile; ?>
				        <?php endif; ?>
				    <?php endwhile; ?>
			    	</article>
			    </div>
			<?php endif; ?>

	        <div class="col-md-4 col-xl-3 d-none d-md-block">
	            <aside class="sidebar sidebar-sticky">
	              	<h6 class="sidebar-title"><?php _e('Type of questions', 'kineoself'); ?></h6>
	              	<nav id="nav-scrollspy" class="nav flex-column">
	              		<?php if( have_rows('grup') ): ?>
				        	<?php while( have_rows('grup') ): the_row(); ?>
				        		<a class="nav-link" href="#<?php the_sub_field('categorie'); ?>"><?php the_sub_field('categorie'); ?></a>
				        	<?php endwhile; ?>
				        <?php endif; ?>
	              	</nav>
	            </aside>
	        </div>
        </div>
    </div>

<?php get_footer(); ?>