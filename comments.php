<?php
/**
 * The template for displaying Comments.
 */
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
 
<div id="comments" class="comments-area">
 
    <?php if ( have_comments() ) : ?>
        <h4 class="comments-title">
            <?php
                printf( _nx( 'One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'kineoself' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h4>
 
        <!-- Lista comentari -->
        <div class="media-list">
            <?php wp_list_comments( 'type=comment&callback=mytheme_comment' ); ?>
        </div>
 
        <?php
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <h5 class="screen-reader-text section-heading divider mt-7"><?php _e( 'Comment navigation', 'kineoself' ); ?></h5>
        <nav class="flexbox mb-2 navigation comment-navigation" role="navigation">
            <div class="nav-previous"><?php previous_comments_link( __( '<i class="fa fa-angle-left mr-1"></i> Next', 'kineoself' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Previous <i class="fa fa-angle-right ml-1"></i>', 'kineoself' ) ); ?></div>
        </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
 
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.' , 'kineoself' ); ?></p>
        <?php endif; ?>

    <?php else : ?>
        <h4 class="comments-title">
            <?php _e( 'Leave a comment' , 'kineoself' ); ?>
        </h4>
    <?php endif; // have_comments() ?>

    <div class="media-list" id="respond">
        <hr>
     
        <?php if ( comments_open() ) : ?>

            <form action="<?php echo site_url('/wp-comments-post.php') ?>" method="POST" id="commentform" class="comment-form needs-validation" novalidate>

                <?php if ( is_user_logged_in() ) : ?>
                    <div class="form-group">
                        <p class=""><?php _e('Logged in as', 'kineoself'); ?> <strong><?php echo get_user_option('user_nicename') ?></strong></p>
                    </div>
                <?php else : ?>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <input class="form-control" type="text" name="author" id="comment-author" placeholder="<?php esc_attr_e('Name', 'kineoself'); ?>" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <input class="form-control" type="email" name="email" id="comment-email" placeholder="<?php esc_attr_e('Email', 'kineoself'); ?>" required>
                    </div>
                </div>
                <?php endif ?>
                <div class="form-group">
                    <textarea class="form-control" name="comment" id="comment" rows="5" placeholder="<?php esc_attr_e('Comment', 'kineoself'); ?>" required></textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="prdates" name="policy" required>
                    <label id="labpp" for="scales"><?php _e('I understand and accept the <a href="https://kineoself.com/en/privacy-policy/">Privacy Policies</a>.', 'kineoself' ); ?></label>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <button class="btn btn-primary btn-block" type="submit"><?php _e('Post comment', 'kineoself' ); ?></button>
                    </div>
                </div>
                <div class="form-group">
                    <?php comment_form_hidden_fields() ?>
                    <?php wp_nonce_field(); ?>
                </div>

            </form>

        <?php endif; ?>

    </div>
</div><!-- #comments -->