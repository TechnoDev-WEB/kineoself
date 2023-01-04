<?php

$search_query = isset($_GET["s"]) ? $_GET["s"] : null;

?>

<h6 class="sidebar-title">
    <?php _e('Search','kineoself'); ?>
</h6>
<form action="<?php echo home_url( '/' ); ?>" class="input-group" method="GET" >    
    <input type="text" value="<?php echo $search_query; ?>" class="form-control" name="s" placeholder="<?php _e('Search','kineoself'); ?>">
    <div class="input-group-addon">
        <span class="input-group-text"><i class="ti-search"></i></span>
    </div>
</form>