<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage buildo
 * @since Buildo 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

 if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <div class="comment-box">
        <?php if ( have_comments() ) : ?>
        <h3>
            <?php
                $comments_number = get_comments_number();
                if ( 1 === $comments_number ) {
                    /* translators: %s: post title */
                    printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','buildo' ), get_the_title() );
                } else {
                    printf(
                        /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s Comment',
                            '%1$s Comments',
                            $comments_number,
                            'comments title',
                            'buildo'
                        ),
                        esc_html(number_format_i18n( $comments_number ) ),
                        get_the_title()
                    );
                }
            ?>
        </h3>

        <?php the_comments_navigation(); ?>
        <?php
            wp_list_comments( array(
                'style'       => '',
                'short_ping'  => true,
                'avatar_size' => 42,
                'callback' => 'buildo_comments',
            ) );
        ?>
        <!-- .comment-list -->

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'buildo' ) ) :
    ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'buildo' ); ?></p> 
    <?php endif; ?>

    <?php 
        $req      = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );

        $comments_args = array
        (
            'submit_button' => '<div class="form-group">'.
              '<input  name="%1$s" type="submit" id="%2$s" class="submit button button-type-3-xs" value="submit comment" />'.
            '</div>',
            'title_reply'  =>  __( '<h3>LEAVE A REPLY</h3>', 'buildo'  ), 
            'comment_notes_after' => '',  
                
            'comment_field' =>  
                '<textarea class="p-textarea form-control" id="comment" name="comment" placeholder="' . esc_attr__( 'Your Message', 'buildo' ) . '" rows="3" aria-required="true" '. $aria_req . '>' .
                '</textarea>',
            'fields' => apply_filters( 'comment_form_default_fields', array (
                'author' => '<div id="comment-name" class="input-groupe clearfix">'.               
                    '<input id="author" class="form-control" name="author" placeholder="' . esc_attr__( 'Name', 'buildo' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' /></div>',
                'email' =>'<div id="comment-name" class="input-groupe clearfix">'.
                    '<input id="email" class="form-control" name="email" placeholder="' . esc_attr__( 'Email Address', 'buildo' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' /></div>',
            
            ) ),
        );
        ?>
    </div>
    <div class="comment-form clearfix" id="comment-box"> 
        <?php
        comment_form($comments_args);
        ?>
    </div>
</div>

<!-- .comments-area -->
