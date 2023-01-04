 <?php $home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) ); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="smart">
    <div class="container">

        <div class="navbar-left">
        <button class="navbar-toggler" type="button">&#9776;</button>
        <a class="navbar-brand" href="<?php echo $home_url; ?>">
            <img width="123" height="40" class="logo-dark" src="https://kineoself.com/wp-content/uploads/2020/11/kineoself-logo-dark.png" alt="logo">
            <img width="123" height="40" class="logo-light" src="https://kineoself.com/wp-content/uploads/2020/11/kineoself-logo-light.png" alt="logo">
        </a>
        </div>

        <div class="navbar-mobile">
        <?php
            $primary_nav_items = wp_get_nav_menu_items(2);
        ?>
            <nav class="nav nav-navbar ml-auto">
                <?php foreach($primary_nav_items as $item) : ?>
                    <a class="nav-link" href="<?php echo $item->url; ?>">
                        <?php echo $item->title?>
                    </a>
                <?php endforeach; ?>
            </nav>
            <div class="mobile-lang">
                <?php get_language_switcher(); ?>
            </div>
        </div>

    </div>
</nav><!-- /.navbar -->