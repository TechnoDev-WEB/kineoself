<?php get_header(); ?>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">

				<?php 
				if ( have_posts() ) : 
					while ( have_posts() ) : the_post();       
				  		get_template_part( 'content' ); // displays whatever you wrote in the wordpress editor
					endwhile; 
				endif; //ends the loop
				 ?>

 			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>