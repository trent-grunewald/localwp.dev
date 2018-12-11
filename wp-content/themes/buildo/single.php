<?php
/**
 * The template for displaying all single posts.
 *
 * @package Buildo
 */
    get_header(); 
?>

    <!-- MAIN -->
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
    <main class="main-blog start-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
					<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
							<?php  get_template_part( 'content-parts/content', 'single' ); ?>
						<?php endwhile; ?>
					<?php else :  
						get_template_part( 'content-parts/content', 'none' );
					endif; ?>
					<!-- Comments -->
                    <?php 
						if ( comments_open() || get_comments_number() ) :
								comments_template();
						endif; 
					?> 
					<!--End Comments -->
                </div>
                <div class="col-sm-4 col-md-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>