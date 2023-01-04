<?php

/** 
 * Create numeric pagination in WordPress
 */

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) return; 

$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
     'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
     'format' => '?paged=%#%',
     'current' => max( 1, get_query_var('paged') ),
     'total' => $wp_query->max_num_pages,
     'mid_size' => 1,
     'type'  => 'array',
     'prev_next'   => true,
     'prev_text'    => __( '<span class="fa fa-angle-left"></span>', 'kineoself' ),
     'next_text'    => __( '<span class="fa fa-angle-right"></span>', 'kineoself'),
) );

$output = '';

if ( is_array( $pages ) ) {
     $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var( 'paged' );

     $output .=  '<ul class="pagination justify-content-center">';
     foreach ( $pages as $page ) {
          $status = '';
          if ( strpos( $page, "current" ) !== false ) { $status =  'active'; }
            $output .= '<li class="page-item ' . $status . '">' . $page . '</li>';
     }
     $output .= '</ul>';

     // Create an instance of DOMDocument 
     $dom = new \DOMDocument();

     // Populate $dom with $output, making sure to handle UTF-8, otherwise
     // problems will occur with UTF-8 characters.
     $dom->loadHTML( mb_convert_encoding( $output, 'HTML-ENTITIES', 'UTF-8' ) );

     // Create an instance of DOMXpath and all elements with the class 'page-numbers' 
     $xpath = new \DOMXpath( $dom );

     // http://stackoverflow.com/a/26126336/3059883
     $page_numbers = $xpath->query( "//*[contains(concat(' ', normalize-space(@class), ' '), ' page-numbers ')]" );

     // Iterate over the $page_numbers node...
     foreach ( $page_numbers as $page_numbers_item ) {

          // Add class="mynewclass" to the <li> when its child contains the current item.
          $page_numbers_item_classes = explode( ' ', $page_numbers_item->attributes->item(0)->value );

          if ( in_array( 'page', $page_numbers_item_classes ) ) {
               $page_numbers_item->attributes->item(1)->value = str_replace( 
                    'page-numbers',
                    'page-link',
                    $page_numbers_item->attributes->item(1)->value );
          }

          // Replace the class 'page-numbers' with 'page-link'
          $page_numbers_item->attributes->item(0)->value = str_replace( 
               'page-numbers',
               'page-link',
               $page_numbers_item->attributes->item(0)->value );
     }

     // Save the updated HTML and output it.
     $output = $dom->saveHTML();
}

echo '<nav class="mt-6">';
     echo $output;
echo '</nav>';