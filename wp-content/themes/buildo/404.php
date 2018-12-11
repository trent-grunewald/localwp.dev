<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Buildo
 */

    get_header(); 
	
?>
   <div class="banner banner-template">
        <div class="container">
            <div class="title-header">
                <h2><?php wp_title(''); ?></h2>
            </div>
        </div>
        <div class="scroll-to mouse">
            <span></span>
        </div>
        <div class="clip">
            <div class="bg bg-bg" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>></div>
        </div>
        <div class="overlay"></div>
    </div>
    <!-- MAIN -->
    <main class="main-shotcodes start-block">
        <section class="section">
            <div class="error text-center">
                <h1><?php echo esc_html__( '404', 'buildo' ); ?></h1>
                <h2><?php echo esc_html__( 'NOT FOUND!', 'buildo' ); ?></h2>
                <p><?php echo esc_html__( 'We are sorry, the page you have looked for does not exist in our content! Perhaps you would like to go to
                    our homepage or try searching below.', 'buildo' ); ?></p>
                <a class="error-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Back to Home', 'buildo' ); ?></a>
            </div>
        </section>
    </main>
	<?php get_footer(); ?>	