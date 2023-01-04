<?php 
    $blog_title = get_the_title( get_option('page_for_posts', true) );
    $blog_text = get_field('description_blog', get_option('page_for_posts', true));
    $search_title = __( "Search Results", "kineoself");
    $search_text = isset($_GET['s']) ? __("You searched for: ","kineoself") . $_GET['s'] : null;

    $term = get_queried_object();
    $termName = $term->name;
    $termDesc = $term->description;
    // var_dump($term);

    if(is_search()) {
        $title = $search_title;
        $text = $search_text;
    } else if (is_category()) {
        $title = __("The category is: ", "kineoself") . $termName;
        $text = $termDesc;
    
    } else if (is_tag()) {
        $title = __("The tag is: ", "kineoself") . $termName;
        $text = $termDesc;
    } else {
        $title = $blog_title;
        $text = $blog_text;
    }

    $featured_img_url = get_the_post_thumbnail_url(get_option('page_for_posts', true), 'full');

    $featured_image_acf = get_field('search_image', 'options');

    $featured_img_url = is_search() ? $featured_image_acf : $featured_img_url ;
?>

<header class="header text-white" style="background-image: url(<?php echo $featured_img_url; ?>);" data-scrim-top="8">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 mx-auto py-8">

                <h1 class="display-3 fw-500"><?php echo $title; ?></h1>
                <p class="lead-2 mt-6 fw-500"><?php echo $text; ?></p>
                
          </div>
        </div>
    </div>
</header>