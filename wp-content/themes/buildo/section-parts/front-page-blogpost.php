<?php 
// To display Blog Post section on front page
?>
<?php  
$buildo_blog_title =  get_theme_mod('buildo_blog_title');  
$buildo_blog_section = get_theme_mod('buildo_blog_section_hideshow','show');

if ($buildo_blog_section =='show') { 
?>

    <section class="section ">
        <div class="container a-info-container">
            <div class="title-block title-build">
                <?php if($buildo_blog_title !="")
                {?>
                    <h2 class="title"><?php echo esc_html(get_theme_mod('buildo_blog_title')); ?></h2>
                <?php } ?>
                <div class="sub-title">
                    <?php echo esc_html(get_theme_mod('buildo-blog_subtitle')); ?>
                </div>
            </div>
            <div class="row">
                <?php 
                $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
                if ( $latest_blog_posts->have_posts() ) : 
                    while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); 
                ?>
                    <div class="col-sm-4 clone">
                        <div class="latest-post">
                            <?php if(has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink() ?>" class="latest-post-link">
                                    <img class="img-responsive" src="<?php the_post_thumbnail_url('buildo-blog-front-thumbnail', array('class' => 'img-responsive')); ?>" alt="">
                                    <div class="post-layer">
                                        <span class="post-l-ico post-ico-orange">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                    </div>
                                </a>
                            <?php endif;?>
                            <div class="l-post-info">
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html__('By ','buildo'); the_author(); ?> / <?php the_date();?></a>
                            </div>
                            <h3 class="l-post-title">
                                <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                            </h3>
                            <?php the_excerpt();?>
                            <a class="read" href="<?php the_permalink();?>"><?php echo esc_html__('Read More', 'buildo' ); ?></a>
                        </div>
                    </div>
                <?php endwhile; 
				wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </section>
<?php 

} ?>
<!-- post ends-->

