<?php if(ICL_LANGUAGE_CODE=='ro'): 
	$lang = 'ro';
elseif(ICL_LANGUAGE_CODE=='en'): 
	$lang = 'en';
endif; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="747Y0DFktWsm-kjSpa3eZa9hua40b_UKZWam6JY5gw8" />

    <title><?php wp_title(' | ', true, 'right'); ?></title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon.png">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">
    <style>
    p,
	ul li,
	ol li {
        font-weight: 400;
    }
</style>	

    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>

    <?php get_template_part( 'inc/navs/nav', 'topbar' ); ?>

    <?php get_template_part( 'inc/navs/nav', 'primary' ); ?>

    <?php 

    $posts_page = get_post( get_option( 'page_for_posts'));
    $blog_id = $posts_page->ID;
    $page_id = get_queried_object_id();

    if(is_front_page()) {
        get_template_part( 'inc/headers/header', 'home' ); 
    } elseif( ( $blog_id == $page_id ) || is_search() || is_category() || is_tag() ) {
        get_template_part( 'inc/headers/header', 'blog' );
    } elseif (is_single() && 'post' == get_post_type()) {
        get_template_part( 'inc/headers/header', 'post' );
    } elseif (is_page_template( 'page-contact.php') || is_page_template( 'page-about.php' ) || is_page_template( 'page-development.php' ) ) {
        get_template_part( 'inc/headers/header', 'v1' );
    } else {
        get_template_part( 'inc/headers/header', 'v2' );
    }

    ?>

	<main class="main-content">