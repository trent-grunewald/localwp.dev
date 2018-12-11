<?php 
/**
 * The header for our theme.
 *
 * Displays all of the <head> section 
 *
 * @package Buildo
 */
 ?>
 <!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   
    <!-- HEADER -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <?php
                $buildo_header_section = get_theme_mod('buildo_header_section_hideshow','show');
                    if ($buildo_header_section =='show') {  
                    $buildo_phone_value = get_theme_mod('buildo_header_phone_value');  
                    $buildo_email_value = get_theme_mod('buildo_header_email_value');
                    $buildo_address_value = get_theme_mod('buildo_header_address_value');
                    $buildo_timing = get_theme_mod('buildo_header_timing');
                ?>
                <div class="col-md-4 col-sm-12">

                    <div class="cons-logo-img">
                        <?php   
                            if (has_custom_logo()) :
                        ?> 
                            <?php the_custom_logo(); 
                        else : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                            <span class="site-title" ><?php bloginfo( 'title' ); ?></span></a>
                        <?php 
                        endif;?>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="header-middle-link">
                        <?php if (!empty($buildo_phone_value)) { ?>
                            <div class="header-info">
                                <div class="header-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="header-info-text">
                                    <span class="info-first"><?php echo esc_html($buildo_phone_value); ?></span>
                                    <?php 
                                    if (!empty($buildo_email_value)) {  ?>
                                        <span class="info-simple"><?php echo esc_html($buildo_email_value); ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } if (!empty($buildo_address_value)) { ?>
                            <div class="header-info">
                                <div class="header-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="header-info-text">
                                    <span class="info-first"><?php echo esc_html($buildo_address_value); ?></span>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (!empty($buildo_timing)) { ?>
                            <div class="header-info">
                                <div class="header-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="header-info-text">
                                    <span class="info-first"><?php echo esc_html($buildo_timing); ?></span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
                <div class="col-md-12 text-center">

                    <div class="cons-logo-img logo-img">
                        <?php   
                            if (has_custom_logo()) :
                        ?> 
                            <?php the_custom_logo(); 
                        else : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                            <span class="site-title-1" ><?php bloginfo( 'title' ); ?></span></a>
                        <?php 
                        endif;?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    </div>
    <header class="header header-type-2 landing-header build-header" >
        <div class="container">
            <div class="nav-panel clearfix ">
                <div class="info-panel">
                    <a class="open-menu" href="#">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <nav class="nav">
                    <?php wp_nav_menu(
                        array(
                            'container'        => 'ul', 
                            'theme_location'    => 'primary', 
                            'menu_class'        => '', 
                            'items_wrap'        => '<ul>%3$s</ul>',
                            'fallback_cb'       => 'buildo_wp_bootstrap_navwalker::fallback',
                            'walker'            => new buildo_wp_bootstrap_navwalker()
                        )
                    ); 
                    ?>         
                    <a class="close-menu" href="#">
                        <i class="fa fa-times"></i>
                    </a>
                </nav>
            </div>
        </div>
    </header>