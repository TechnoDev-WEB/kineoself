<?php 

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
$left_title = get_field('banner_title_left');
$right_title = get_field('banner_title_right');
$desc = get_field('introducere_baner');

if(ICL_LANGUAGE_CODE=='ro'): 
	$more = 'Mai mult';
elseif(ICL_LANGUAGE_CODE=='en'): 
	$more = 'View more';
endif;

 ?>

<!-- Header -->
<header class="header text-white h-fullscreen text-center text-lg-left pb-8" data-parallax="<?php echo esc_url($featured_img_url); ?>" data-overlay="5">
	<div class="container">
	  	<div class="row h-100">
		    <div class="col-lg-8 mx-auto align-self-center text-center">
		     	<h1 class="display-3 fw-500"><?php echo $left_title; ?> <br><span data-type-speed="100" data-back-speed="80" class="text-green" data-loop="false" data-typing="<?php echo $right_title; ?>"></span></h1>
		      	<p class="lead-1 text-white mt-6 mb-8"><?php echo $desc; ?></p>

		      	<p class="gap-xy">
		        	<a class="btn btn-lg btn-round mw-200 btn-success" href="#features"><?php _e('Purposes', 'kineoself') ?></a>
		        	<a class="btn btn-light btn-lg btn-round mw-200" href="#posts"><?php _e('Posts', 'kineoself') ?></a>
		      	</p>
		    </div>

		    <div class="col-12 align-self-end text-center mt-6">
		      	<a class="scroll-down-1 scroll-down-white" href="#section-next" aria-label="<?php echo $more; ?>"><span></span></a>
		    </div>
	  	</div>
	</div>
</header>
<!-- END Header -->