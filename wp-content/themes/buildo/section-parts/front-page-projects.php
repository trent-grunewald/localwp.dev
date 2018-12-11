<?php
/**
 * Template part - Projects Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildo
 */
    $buildo_projects_title = get_theme_mod('buildo-projects_title');
    $buildo_projects_section     = get_theme_mod( 'buildo_projects_section_hideshow','hide');
    
    $projects_no        = 8;
    $projects_pages      = array();
    
    for( $i = 1; $i <= $projects_no; $i++ ) {
      $projects_pages[]    =  get_theme_mod( "buildo_projects_page_$i", 1 );
    }

    $projects_args  = array(
      'post_type' => 'page',
      'post__in' => array_map( 'absint', $projects_pages ),
      'posts_per_page' => absint($projects_no),
      'orderby' => 'post__in'
    ); 
      
    $projects_query = new   wp_Query( $projects_args );
    if( $buildo_projects_section == "show") :
?>
  
        <section class="section  section-grey">
        <div class="container">
            <div class="title-block  title-build">
                <?php if($buildo_projects_title != "")   {  ?>
                      <h2 class="title"><?php echo esc_html(get_theme_mod('buildo-projects_title')); ?></h2>
                <?php } ?>
                <div class="sub-title">
                    <?php echo  esc_html(get_theme_mod('buildo-projects_subtitle')); ?>
                </div>
            </div>
        </div>
        <div class="container">
            
            <div class="container-mix clearfix">
                <div class="row">
                    <?php
                    if($projects_query->have_posts()):
                        while($projects_query->have_posts()) :
                        $projects_query->the_post();
                    ?>
                        <div class="col-sm-6 mix col-xs-12 category-2 col-md-3">
                            <div class="portfolio-b-item build-box ">
                                <?php if(has_post_thumbnail()) : ?>
                                  <?php the_post_thumbnail('buildo-projects-thumbnail', array('class' => 'img-responsive')); 
                                endif; ?>
                                <div class="portfolio-mask">
                                    <div class="portfolio-mask-info">
                                        <span><?php the_title(); ?></span>
                                        <h3><?php the_excerpt();?></h3>
                                    </div>
                                    <div class="portfolio-mask-info-bottom">
                                        <a href="<?php the_permalink();?>" class="btn-view"><?php echo esc_html__('View project', 'buildo' ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>  
                </div>
            </div>
        </div>
    </section>
<?php
    endif;
?>