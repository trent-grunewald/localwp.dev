<?php
/**
 * Template part - Service Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buildo
 */
    $buildo_services_title = get_theme_mod('buildo-services_title');
	$buildo_services_section     = get_theme_mod( 'buildo_services_section_hideshow','hide');
	$col_layout         = get_theme_mod( 'buildo_service_col_layout', '4' );
	  
	   
	$buildo_service_no_excerpt = get_theme_mod('buildo_service_no_excerpt');
	 
	$services_no        = 8;
	$services_pages      = array();
	$services_icons     = array();
	for( $i = 1; $i <= $services_no; $i++ ) {
		$services_pages[]    =  get_theme_mod( "buildo_service_page_$i", 1 );
		$services_icons[]    = get_theme_mod( "buildo_page_service_icon_$i", '' );
	}

    $services_args  = array(
      'post_type' => 'page',
      'post__in' => array_map( 'absint', $services_pages ),
      'posts_per_page' => absint($services_no),
      'orderby' => 'post__in'
     
    ); 
    
    $services_query = new   wp_Query( $services_args );
    if( $buildo_services_section == "show"  ) :
?>
	 <section class="section">
        <div class="container container-front">
            <div class="title-block  title-build">
            	<?php if($buildo_services_title != "")   {  ?>
                	<h2 class="title "><?php echo esc_html(get_theme_mod('buildo-services_title')); ?></h2>
                <?php }?>
                <div class="sub-title">
                    <?php echo  esc_html(get_theme_mod('buildo-services_subtitle')); ?>
                </div>
            </div>
            <div class="row row-services orange-icon">
            	<?php
			    if($services_query->have_posts()):
			        $count = 0;
			        while($services_query->have_posts()) :
			        $services_query->the_post();
			    ?>
	                <div class="col-md-<?php echo esc_attr($col_layout); ?> col-sm-6  icon-style icon-style-2">
	                	<?php 
						   if($services_icons[$count] !=""){
					    ?>
	                    	<span class="fa <?php echo esc_html($services_icons[$count]); ?>"></span>
	                    <?php 
						} 
						?>
						<a href="<?php the_permalink() ?>">
	                    	<h3 class="middle-title title-no-line "><?php the_title(); ?></h3>
	                	</a>
	                    <?php the_excerpt(); ?>
	                </div>
                <?php
			        $count = $count + 1;
			        endwhile;
			        wp_reset_postdata();
			    endif;
			    ?>  
            </div>
        </div>
    </section>
<?php
    endif;
?>