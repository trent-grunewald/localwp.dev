<?php 
// To display Clients-logo section on front page
//error_reporting(0);
?>
<?php
    $buildo_clients_section_hideshow = get_theme_mod('buildo_clients_section_hideshow','hide');
    $buildo_clients_title = get_theme_mod('buildo_clients_title');
    $clients_no        = 6;
    $clients_logo      = array();
    for( $i = 1; $i <= $clients_no; $i++ ) {
        $clients_logo[]    =  get_theme_mod( "buildo_client_logo_$i", 1 );
    }
    $client_args  = array(
      'post_type' => 'page',
      'post__in' => array_map( 'absint', $clients_logo ),
      'posts_per_page' => absint($clients_no),
      'orderby' => 'post__in'
    );
    $client_query = new   wp_Query( $client_args );
    if ($buildo_clients_section_hideshow =='show') { 
?> 
    <section class="section section-grey">
        <div class="container">
            <div class="title-block title-build">
                <?php if($buildo_clients_title != "")   {  ?>
                    <h2 class="title "><?php echo esc_html(get_theme_mod('buildo_clients_title')); ?></h2>
                <?php } ?>
                <div class="sub-title">
                    <?php echo esc_html(get_theme_mod('buildo-clients_subtitle')); ?>
                </div>
            </div>
            <div class="swiper-container client-slider" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive"
                data-xs-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="6">
                <div class="swiper-wrapper ">
                    <?php
                    if($client_query->have_posts() ):                   
                       while($client_query->have_posts()) :
                       $client_query->the_post();
                    ?>    
                        <div class="swiper-slide">
                            
                            <?php 
                            if(has_post_thumbnail()): 
                                the_post_thumbnail();
                            endif; 
                            ?>
                          
                        </div>
                    <?php     
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div class="pagination pagination-hide "></div>
            </div>
        </div>
    </section>

<!-- Main Content Section -->
<?php } ?>  