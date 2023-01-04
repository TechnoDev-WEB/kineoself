<?php

/**
 * Kineoself's functions and definitions
 *
 * @package Kineoself
 * @since Kineoself 1.0
 */
 
if ( ! function_exists( 'kineoself_setup' ) ) :

function kineoself_setup() {
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'blog-thumb', 396, 264, true );

    add_image_size( 'top-post', 65, 44, true );

    add_theme_support( 'title-tag' );
 
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'kineoself' ),
        'top_bar' => __('Top Bar Menu', 'kineoself'),
        'footer' => __('Footer Menu', 'kineoself' )
    ) );

}
endif; // kineoself_setup
add_action(
    'after_setup_theme', 'kineoself_setup'
);

/**
 *  Theme style and scripts
 */
function add_theme_scripts() {
  	
  	wp_enqueue_style( 'stylebase', get_template_directory_uri() . '/assets/css/style_base.min.css');

    wp_enqueue_style( 'style_page', get_template_directory_uri() . '/assets/css/page.min.css');

    wp_enqueue_style( 'style', get_stylesheet_uri() );


      
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js');
 
  	wp_enqueue_script( 'script_page', get_template_directory_uri() . '/assets/js/page.min.js', array ( 'jquery' ), 1.1, true);

  	wp_enqueue_script( 'script_base', get_template_directory_uri() . '/assets/js/script_base.js', array ( 'jquery' ), 1.1, true);

    wp_enqueue_script( 'jquery_validation', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js');

    wp_enqueue_script( 'add_methods', 'https://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js');

    wp_register_script( 
        'ts', 
        get_template_directory_uri() . '/assets/js/ts.js', 
        array( 'jquery' )
    );
    wp_enqueue_script( 'my_script' );

  	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array ( 'jquery' ), 1.0, true);
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/**
 *  Post view counter
 */ 
function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return $count;
}
function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );

/**
 *  Custom WPML Language Switcher
 */
function get_language_switcher(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    foreach($languages as $l)
        if($l['active'])
            $active = $l;
    
    if(!empty($languages)) {
        echo '<div class="dropdown mr-4">';
            echo '<span class="dropdown-toggle" data-toggle="dropdown">'.$active['native_name'].'</span>';
            echo '<div class="dropdown-menu dropdown-menu-right">';
                foreach($languages as $l){
                    if(!$l['active']) 
                        echo '<a href="'.$l['url'].'" class="dropdown-item">';
                            echo icl_disp_language($l['native_name'], $l['translated_name']);
                    if(!$l['active']) 
                        echo '</a>';
                }
            echo '</div>';
        echo '</div>';
    }
}

/**
 * Pagination comments
 **/
add_filter('next_comments_link_attributes', 'comments_link_attributes');
add_filter('previous_comments_link_attributes', 'comments_link_attributes');

function comments_link_attributes() {
  return 'class="btn btn-primary"';
}

/**
 * Customize comment form default fields.
 */
function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'div';
        $add_below = 'div-comment';
    }
    ?>

    <<?php echo $tag; ?> 
    <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">

    <?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="media"><?php
    } ?>          

            <img class="avatar avatar-md mr-4" src="<?php echo get_avatar_url($comment, ['size' => '48']); ?>" alt="<?php echo comment_author( $comment); ?>">

            <div class="media-body">

                <div class="small-1">
                    <strong>
                        <?php 
                        printf( __( '<cite class="fn">%s</cite>' ), get_comment_author() );
                         ?>
                    </strong>
                    <time class="ml-4 opacity-70 small-3" datetime="<?php echo get_comment_date(); ?>">
                    <?php

                    printf( 
                        _x( '%1$s ago', 'Human-readable time', 'kineoself' ), 
                        human_time_diff( 
                            get_comment_date( 'U' ), 
                            current_time( 'timestamp' ) 
                        ) 
                    );
                     ?>
                    </time>
                </div>
                <p class="small-2 mb-0"><?php comment_text(); ?></p>

            <?php 
            if ( $comment->comment_approved == '0' ) { ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'kineoself' ); ?></em><br/><?php 
            } 

            edit_comment_link( __( '(Edit)' ), '  ', '' );

            ?>
     
            <div class="reply"><?php 
                    comment_reply_link( 
                        array_merge( 
                            $args, 
                            array( 
                                'add_below' => $add_below, 
                                'depth'     => $depth, 
                                'max_depth' => $args['max_depth'] 
                            ) 
                        ) 
                    ); ?>
            </div><?php 

            if ( 'div' != $args['style'] ) : ?>
            </div>
        </div><?php 
    endif;
}

/**
 * Comment form hidden fields
 */
function comment_form_hidden_fields() {
    comment_id_fields();

    if ( current_user_can( 'unfiltered_html' ) )
    {
        wp_nonce_field( 'unfiltered-html-comment_' . get_the_ID(), '_wp_unfiltered_html_comment', false );
    }
}

/**
 * Comment Validation
 */
function comment_validation_init() {
  if(is_single() && comments_open() ) { ?>
    <script type="text/javascript">
     jQuery(document).ready(function($) {
        var getLangCode = '<?php echo apply_filters( 'wpml_current_language', NULL );  ?>';
        if (getLangCode == 'ro') {
            var mess_auth = "Vă rugăm să furnizați un nume (cu litere).";
            var mess_email = "Vă rugăm să introducți o adresa de email validă.";
            var mess_comm = "Vă rugăm să completați câmpul obligatoriu (cu litere).";
            var mess_poly = "Vă rugăm să acceptați politica de confidențialitate.";
        } else {
            var mess_auth = "Please provide a name (with letters).";
            var mess_email = "Please enter a valid email address.";
            var mess_comm = "Please fill the required field (with letters).";
            var mess_poly = "Please accept the privacy policy.";
        }

        $('#commentform').validate({
            rules: {
                author: {
                    required: true,
                    letterswithbasicpunc: true,
                    minlength: 2
                },

                email: {
                    required: true,
                    email: true
                },

                comment: {
                    required: true,
                    letterswithbasicpunc: true,
                    minlength: 7
                },

                policy: {
                    required: true,
                }

            },

            messages: {
                author: mess_auth,
                email: mess_email,
                comment: mess_comm,
                policy: mess_poly
            },

            errorElement: "div",
            errorPlacement: function(error, element) {
                $(error).css({'font-weight': '400', 'font-size': '13px', 'letter-spacing': '.5px', 'color': '#ff4954' });
                if (element.attr("name") == "policy") {
                    error.insertAfter("#labpp");
                } else {
                    error.insertAfter(element);
                }
                // element.after(error);
            },

            errorClass: "is-invalid",
            validClass: "is-valid",

            highlight: function( element, errorClass, validClass ) {
                $(element).addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function( element, errorClass, validClass ) {
                $(element).removeClass(errorClass).addClass(validClass);
            }

        });
 
    });    
    </script>
    <?php
    }
}
add_action('wp_footer', 'comment_validation_init');

/**
 * Function calculate the estimates reading time of the post content.
 * @param string $content Post content.
 * @return string estimated reading time.
 */
function get_estimated_reading_time( $content = '') {
    $wpm = 150;
    $text_content = strip_shortcodes( $content );   // Remove shortcodes
    $str_content = strip_tags( $text_content );     // remove tags
    $word_count = str_word_count( $str_content );
    $readtime = ceil( $word_count / $wpm );

    if(ICL_LANGUAGE_CODE=='ro'): 
        if ($readtime == 1) {
            $postfix = " Minunt";
        } else {
            $postfix = " Minunte";
        }
    elseif(ICL_LANGUAGE_CODE=='en'): 
        if ($readtime == 1) {
            $postfix = " Minute";
        } else {
            $postfix = " Minutes";
        }
    endif;

    $readingtime = $readtime . $postfix;
    return $readingtime;
}

/**
 * Option page ACF
 **/
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Setări Generale Temă',
        'menu_title'    => 'Setări Temă',
        'menu_slug'     => 'theme-general-settings',
    ));
    
}

/**
 * Excerpt lenght
 **/
function wpdocs_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 */
function wpdocs_excerpt_more( $more ) {
    return ' ...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


/**
 * Title pages SEO best
 **/
add_filter( 'wp_title', 'wpse_174379_show_posts_page_wp_title' );
function wpse_174379_show_posts_page_wp_title( $title ) {
    $posts_page = get_post( get_option( 'page_for_posts'));
    $blog_id = $posts_page->ID;
    $page_id = get_queried_object_id();

    if( $blog_id == $page_id ) {
        $title = $posts_page->post_title . ' | ';
    }
    return $title;
}

function add_manage_cat_to_author_role() 
{
    if ( ! current_user_can( 'author' ) )
        return;

    // here you should check if the role already has_cap already and if so, abort/return;

    if ( current_user_can( 'author' ) ) 
    {
        $GLOBALS['wp_roles']->add_cap( 'author','manage_categories' );
    }
}
add_action( 'admin_init', 'add_manage_cat_to_author_role', 10, 0 );

// function wpdocs_filter_wp_title( $title, $sep ) {
//     global $paged, $page;

//     // if ( is_feed() )
//     //     return $title;
 
//     // Add the site name.
//     $title .= get_bloginfo( 'name' );
 
//     // Add the site description for the home/front page.
//     $site_description = get_bloginfo( 'description', 'display' );
//     // && ( is_home() || is_front_page() )
//     // if ( is_home() || is_front_page() && $site_description )
//     //     $title = "$site_description";
        
//     // if ( $site_description )
//     //     $title = "$title $sep $site_description";
 
//     // Add a page number if necessary.
//     if ( $paged >= 2 || $page >= 2 )
//         $title = sprintf( __( 'Page %s', 'kineoself' ), max( $paged, $page ) ) . "$sep $title";

//     return $title;
// }
// add_filter( 'wp_title', 'wpdocs_filter_wp_title', 10, 2 );

// function wpb_comment_post( $incoming_comment ) {
//     $incoming_comment['comment_content'] = htmlspecialchars($incoming_comment['comment_content']);
//     $incoming_comment['comment_content'] = str_replace( "'", '&apos;', $incoming_comment['comment_content'] );
//     return( $incoming_comment );
//     }
//     function wpb_comment_display( $comment_to_display ) {
//      $comment_to_display = str_replace( '&apos;', "'", $comment_to_display );
//      return $comment_to_display;
// }
// add_filter( 'preprocess_comment', 'wpb_comment_post', '', 1);
// add_filter( 'comment_text', 'wpb_comment_display', '', 1);
// add_filter( 'comment_text_rss', 'wpb_comment_display', '', 1);
// add_filter( 'comment_excerpt', 'wpb_comment_display', '', 1);
// remove_filter( 'comment_text', 'make_clickable', 9 );

// Secure
function remove_default_login_errors(){
  return '<strong>Error</strong>: Username or password is incorrect!';
}
add_filter( 'login_errors', 'remove_default_login_errors' );


add_filter( 'generate_google_font_display', function() {
    return 'swap';
} );


// Load contact style and js in page Contact
add_action( 'wp_enqueue_scripts', 'custom_contact_script_conditional_loading' );
function custom_contact_script_conditional_loading(){
   //  Edit page IDs here
   if( !is_page(107) && !is_page(109) )    
   {    
      wp_dequeue_script('contact-form-7'); // Dequeue JS Script file.
      wp_dequeue_style('contact-form-7');  // Dequeue CSS file. 
   }
}

function defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );
