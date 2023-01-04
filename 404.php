<?php 

/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

  <!-- Main Content -->
  <main class="main-content text-center pb-lg-8">
    <div class="container">

      <p class="lead mt-6"><?php _e('Seems you are looking for something that does not exist.', 'kineoself'); ?></p>
      <br>
      <button class="btn btn-secondary btn-lg btn-round mw-200 mr-4" type="button" onclick="window.history.back();"><?php _e('Go back', 'kineoself'); ?></button>
      <a class="btn btn-success btn-lg btn-round mw-200" href="<?php echo get_home_url(); ?>"><?php _e('Return Home', 'kineoself'); ?></a>

    </div>
  </main><!-- /.main-content -->

<?php get_footer(); ?>