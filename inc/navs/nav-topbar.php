<!-- Topbar -->
<div class="topbar d-lg-flex text-white bg-transparent">
    <div class="container small-3">
        <nav class="nav">
            <?php
                $top_bar_menu_items = wp_get_nav_menu_items(3);

                foreach($top_bar_menu_items as $key => $item):                    
            ?>

            <a class="nav-link <?php echo $key == 0 ? "pl-0" : null; ?>" href="<?php echo $item->url; ?>">
                <?php echo $item->title; ?>
            </a>
            <?php endforeach; ?>
            <a class="nav-link" href="#" data-toggle="offcanvas" data-target="#offcanvas-search-3">
                <?php _e('Search','kineoself'); ?>
            </a>
        </nav>

        
        <?php get_language_switcher(); ?>        
    </div>
</div><!-- /.topbar -->