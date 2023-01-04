<?php 
/**
* Template Name: Contact Page
*/
get_header();
?>

<section class="section">
    <div class="container">
    	<div class="row gap-y">
    		<div class="col-lg-7">
    			<h3><?php the_field('titlu_stanga'); ?></h3>
	            <br>
    			<?php the_content(); ?>
    		</div>
    		<div class="col-lg-4 ml-auto text-center text-lg-left">
                <hr class="d-lg-none">
                <h3><?php the_field('titlu_dreapta'); ?></h3>
                <br>
                <?php the_field('conținut_dreapta'); ?>
                <div class="fw-400"><?php the_field('titlu_social', 'option'); ?></div>
                <div class="social social-sm social-inline">
                	<?php
					if( have_rows('link-uri_sociale', 'option') ):
					    while( have_rows('link-uri_sociale', 'option') ) : the_row(); 
					    	$sub_class = get_sub_field('clasa_rețea', 'option');
					        $sub_url = get_sub_field('link_rețea', 'option');
					        $sub_icon = get_sub_field('iconița_rețea', 'option');
					 ?>

					        <a class="<?php echo $sub_class ?>" href="<?php echo $sub_url ?>"><?php echo $sub_icon ?></a>

					<?php
					    endwhile;
					endif;
					?>
                </div>
            </div>
        </div>
 	</div>
</section>


<?php get_footer(); ?>