<?php $footer_nav_items = wp_get_nav_menu_items(25); ?>

<div class="col-12 col-md-4 col-xl-2 offset-xl-1">
    <div class="nav flex-column">
        <?php 
        $count = 0;
        foreach($footer_nav_items as $item) : 
            if ($count <= 2) { 
                ?>
        
                <a class="nav-link" href="<?php echo $item->url; ?>">
                    <?php echo $item->title?>
                </a>
            
            <?php } 
            $count++;
        endforeach;
        ?>
    </div>
</div>

<div class="col-12 col-md-4 col-xl-2">
    <div class="nav flex-column">
        <?php 
        $count = 0; 
        foreach($footer_nav_items as $item) :
            if ($count > 2 && $count <= 4) { 
                ?>
        
                <a class="nav-link" href="<?php echo $item->url; ?>">
                    <?php echo $item->title?>
                </a>
            
            <?php } 
            $count++;
        endforeach;
        ?>
    </div>
</div>

<div class="col-12 col-md-4 col-xl-2">
    <div class="nav flex-column">
        <?php 
        $count = 0; 
        foreach($footer_nav_items as $item) : 
            if ($count > 4) { 
                ?>
        
                <a class="nav-link" href="<?php echo $item->url; ?>">
                    <?php echo $item->title?>
                </a>
            
            <?php }
            $count++;
        endforeach;
        ?>
    </div>
</div>