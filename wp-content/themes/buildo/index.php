<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
    <main class="main-blog start-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <?php if(have_posts()) : ?>
    				    <?php while(have_posts()) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php get_template_part('content-parts/content', get_post_format()); ?>
							</div>
    				    <?php endwhile; ?>
                    
	                    <div class="post-pagination">
	                        <?php the_posts_pagination(
								array(
								  'prev_text' =>__('<i class="fa fa-chevron-left"></i>','buildo'),
								  'next_text' =>__('<i class="fa fa-chevron-right"></i>','buildo')
								)
							); ?>
	                    </div>
                    <?php else :  
				        get_template_part( 'content-parts/content', 'none' );
				    endif; ?>
                </div>
                <div class="col-sm-4 col-md-3">
                    <?php get_sidebar(); ?>   
                </div>
            </div>
        </div>
	</main>
<?php get_footer(); ?>