 <?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Buildo
 */
    
?>
	<!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <?php dynamic_sidebar('buildo-footer-widget-area-1'); ?>   
                </div>
                <div class="col-sm-4">
                    <?php dynamic_sidebar('buildo-footer-widget-area-2'); ?> 
                </div>
                <div class="col-sm-4">
                    <?php dynamic_sidebar('buildo-footer-widget-area-3'); ?>
                </div>
            </div>
        </div>
        <div class="copy-row">
            <div class="container text-center">
                <div class="copy">
                    <?php if( get_theme_mod('buildo-footer_title') ) : ?>
                        <?php echo wp_kses_post( html_entity_decode(get_theme_mod('buildo-footer_title'))); ?>
                    <?php else :
                        /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                        printf( esc_html__('%1$sPowered by %2$s%3$s','buildo'),'<span>','<a href="'. esc_url( __( 'https://wordpress.org/','buildo')).'"target="_blank">WordPress.</a>','</span>');
                        /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                        printf( esc_html__( ' Theme: powered by:WordPress %1$sDesign By %2$s%3$s', 'buildo' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'buildo' ) ) .'" target="_blank">"'. esc_html('Wordpress','buildo'). '"</a>', '</span>' );
                    endif;  ?> 
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER -->
    <a class="scroll-top" href="#">
        <i class="fa fa-angle-up"></i>
    </a>

	<?php wp_footer(); ?>
    </body>
</html>