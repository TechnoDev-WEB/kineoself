<header class="header text-center text-white" style="background-color: #464A60;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
            
                <?php if(is_404()) { ?>
                    <h1 class="display-3 fw-500"><?php _e('Nothing found!', 'kineoself'); ?></h1>
                <?php } else { ?>
                    <h1 class="display-3 fw-500"><?php echo the_title();  ?></h1>
                <?php } ?>
                <p class="lead-2 opacity-90 mt-6"><?php echo the_field('descriere_generala'); ?></p>
            </div>
        </div>
    </div>
</header>