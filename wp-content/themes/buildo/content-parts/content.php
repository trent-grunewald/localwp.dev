 <?php
/**
 * @package Buildo
 */
?>
<div class="post">
	<?php if(has_post_thumbnail()) : ?>
	    <a class="post-img-link" href="<?php the_permalink(); ?>">
	        <?php the_post_thumbnail('buildo-page-thumbnail', array('class' => 'img-responsive')); ?>
	    </a>
	<?php endif; ?>
	<div class="post-info">
		<div class="post-content">
            <h2 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <div class="post-info-row post-info-row-sm">
                <div class="post-info-item">
                    <i class="fa fa-calendar"></i>
                    <?php echo get_the_date();?>
                </div>
                <span>/</span>
                <div class="post-info-item">
                    <i class="fa fa-user"></i>
                    <?php echo esc_html__('By ','buildo'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
                </div>
                <span>/</span>
                <div class="post-info-item">
                    <i class="fa fa-comments"></i>
                    <?php comments_number( __('0 Comment', 'buildo'), __('1 Comment', 'buildo'), __('% Comments', 'buildo') ); ?>
                </div>

            </div>
            <?php the_excerpt(); ?>
            <a class="button button-type-3-xs" href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More', 'buildo' ); ?></a>
        </div>
    </div>
</div>
