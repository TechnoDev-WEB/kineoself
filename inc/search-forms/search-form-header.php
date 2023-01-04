<!-- Search 3 -->
<div id="offcanvas-search-3" class="offcanvas text-white h-150" data-animation="slide-down" style="background-color: rgba(0,0,0,0.95)">

    <div class="row align-items-center text-center h-100">
        <div class="col-md-8 mx-auto">
            <div class="row">

                <div class="col">
                  <form class="input-transparent" action="<?php echo home_url( '/' ); ?>" method="GET">
                    <input class="form-control form-control-lg border-0 lead-3" type="text" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php esc_attr_e('Enter your keywords here', 'kineoself'); ?>">
                  </form>
                </div>

                <div class="col-auto">
                  <button type="button" class="close position-static" data-dismiss="offcanvas" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

            </div>
        </div>
    </div>
</div>