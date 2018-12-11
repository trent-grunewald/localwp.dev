<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Use this page template to remove the sidebar from any page.
 *  @package Buildo
 */
?>
<?php
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
            <div class="container">
                <div class="row ">
                    <div class="col-md-12 page-news">
						<div class="page-cont">
							<?php if(have_posts()) : ?>
								<?php while(have_posts()) : the_post(); ?>
									<?php if(has_post_thumbnail()) : ?>
									    <a class="post-img-link" href="<?php the_permalink(); ?>">
									        <?php the_post_thumbnail('buildo-page-thumbnail', array('class' => 'img-responsive')); ?>
									    </a>
									<?php endif; ?>
								    <?php the_content(); ?>
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
					</div>
				</div>
            </div>
        </section>
    </main>
	<?php get_footer(); ?>