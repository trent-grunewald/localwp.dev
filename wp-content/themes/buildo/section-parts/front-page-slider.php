<?php
/**
 * Template part - Features Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildo
 */

    $buildo_slider_section     = get_theme_mod( 'buildo_slider_section_hideshow','hide');
    
    $slider_no        = 3;
    $slider_pages      = array();
    for( $i = 1; $i <= $slider_no; $i++ ) {
        $slider_pages[]    =  get_theme_mod( "buildo_slider_page_$i", 1 );
        $buildo_slider_btntxt[]    =  get_theme_mod( "buildo_slider_btntxt_$i", '' );
        $buildo_slider_btnurl[]    =  get_theme_mod( "buildo_slider_btnurl_$i", '' );
        

    }

    $slider_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $slider_pages ),
        'posts_per_page' => absint($slider_no),
        'orderby' => 'post__in'
    ); 
    
    $slider_query = new wp_Query( $slider_args );

    if ($buildo_slider_section =='show' && $slider_query->have_posts() ) { ?>

<!-- Start Slider Section -->
        <div class="banner full-height-banner banner-type-3 build-slider">
            <div class="swiper-container full-height-slider" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
            
                <div class="swiper-wrapper">
                    <?php
                        $count = 0;
                       while($slider_query->have_posts()) :
                        $slider_query->the_post();
                    ?>
                        <div class="swiper-slide full-height-slide" <?php if(has_post_thumbnail()) : ?> style="background-image: url(<?php the_post_thumbnail_url('buildo-slider-thumbnail', array('class' => 'img-responsive')); ?>);" <?php endif; ?>)">
                            <div class="overlay "></div>
                            <div class="container">
                                <div class="center">
                                    <h1 class="slide-title"><?php the_title(); ?></h1>
                                    <div class="slider-sub-title"><?php the_content(); ?></div>
                                    <div class="button-row">
                                        <?php if (!empty($buildo_slider_btntxt[$count])) { ?>
                                            <a href="<?php echo esc_url($buildo_slider_btnurl[$count]); ?>" class="button-type-4"><?php echo esc_html($buildo_slider_btntxt[$count]); ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
            
                    <?php
                         $count = $count + 1;
                         endwhile;
                         wp_reset_postdata();
                    ?>  
                </div>
                <div class="pagination pagination-white pagination-bottom  "></div>
                <div class="nav-slider-min nav-slider-min-left arrow-type-1 swiper-arrow-left">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="nav-slider-min nav-slider-min-right  arrow-type-1 swiper-arrow-right">
                    <i class="fa fa-angle-right"></i>
                </div>
        </div>
    </div>
<!-- End Slider Section -->
<?php } ?>