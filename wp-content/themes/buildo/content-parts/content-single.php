<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <article class="single-article">
        <?php if(has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('buildo-page-thumbnail', array('class' => 'single-img img-responsive')); ?>
        <?php endif; ?>
        <h1 class="single-title"><?php the_title(); ?></h1>
        <div class="post-info-row post-info-row-sm">
            <div class="post-info-item">
                <i class="fa fa-calendar"></i>
                <?php the_date();?>
            </div>
            <span>/</span>
            <div class="post-info-item">
                <i class="fa fa-user"></i>
                <?php echo esc_html__('By ','buildo'); ?> 
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                    <?php 
                       the_author(); 
                    ?>
                </a>
            </div>
            <span>/</span>
            <div class="post-info-item">
                <i class="fa fa-comments"></i>
                <?php comments_number( __('0 Comment', 'buildo'), __('1 Comment', 'buildo'), __('% Comments', 'buildo') ); ?>
            </div>
        </div>
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'buildo' ),
                'after'  => '</div>',
            ) );
        ?>
        <?php if (has_tag()) : ?>
            <div class="article-info article-info-tag">
                <h3><?php echo esc_html__('Tags:', 'buildo' ); ?> </h3>
                <?php echo esc_html__(' ', 'buildo' ); ?><?php the_tags('&nbsp;'); ?>
            </div>
        <?php endif; ?>
    </article>
</div>
