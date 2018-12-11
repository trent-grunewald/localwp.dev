<?php

/**
 * buildo functions and definitions
  @package Buildo
 *
*/

/* Set the content width in pixels, based on the theme's design and stylesheet.
*/
function buildo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'buildo_content_width', 980 );
}
add_action( 'after_setup_theme', 'buildo_content_width', 0 );


if( ! function_exists( 'buildo_theme_setup' ) ) {


	function buildo_theme_setup() {

		load_theme_textdomain( 'buildo', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
       // Add title tag 
		add_theme_support( 'title-tag' );


		// Add default logo support		
        add_theme_support( 'custom-logo');

        add_theme_support('post-thumbnails');
        add_image_size('buildo-page-thumbnail',738,423, true);
        add_image_size('buildo-about-thumbnail',370,225, true);
        add_image_size('buildo-blog-front-thumbnail',370,225, true);
        add_image_size('buildo-projects-thumbnail',500,400, true);
        add_image_size('buildo-slider-thumbnail',1350,600, true);
        
         
         // Add theme support for Semantic Markup
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) ); 

		$defaults = array(
			'default-image'          => get_template_directory_uri() .'/assets/images/header_img.jpg',
			'width'                  => 1920,
			'height'                 => 540,
			'uploads'                => true,
			'default-text-color'     => "#FFBC13",
			'wp-head-callback'       => 'buildo_header_style',
			
			);
		add_theme_support( 'custom-header', $defaults );

		// Menus
		 register_nav_menus(array(
       'primary' => esc_html__('Primary Menu', 'buildo'),
       
       ));
		// add excerpt support for pages
        add_post_type_support( 'page', 'excerpt' );

        if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
        }
		  // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
		
		 
    	// To use additional css
 	    add_editor_style( 'assets/css/editor-style.css' );
	}
	add_action( 'after_setup_theme', 'buildo_theme_setup' );
}

// Register Nav Walker class_alias
require_once('class-wp-bootstrap-navwalker.php');
require get_template_directory(). '/include/extras.php';
/**
 * Enqueue CSS stylesheets */		
if( ! function_exists( 'buildo_enqueue_styles' ) ) {
	function buildo_enqueue_styles() {	
	    wp_enqueue_style('buildo-font', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400|Roboto:400,500,700,900','');
		wp_enqueue_style('font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css');
		wp_enqueue_style('buildo-fonts', get_template_directory_uri() .'/assets/css/font.css');
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
		
		// main style
		wp_enqueue_style( 'buildo-style', get_stylesheet_uri() );

		wp_enqueue_style('cons', get_template_directory_uri() . '/assets/css/cons.css');
	}
	add_action( 'wp_enqueue_scripts', 'buildo_enqueue_styles' );
}

function buildo_header_style()
{
	$header_text_color = get_header_textcolor();
	?>
		<style type="text/css">
			 
				.site-title{
					color: #<?php echo esc_attr($header_text_color); ?>;
					
				}
			 
		</style>
	<?php

}


/**
 * Load Upsell Button In Customizer
 * 2016 &copy; [Justin Tadlock](http://justintadlock.com).
 */

require_once( trailingslashit( get_template_directory() ) . '/include/upgrade/class-customize.php' );

/**
 * Enqueue JS scripts
 */

if( ! function_exists( 'buildo_enqueue_scripts' ) ) {
	function buildo_enqueue_scripts() {   
		wp_enqueue_script('jquery');
		wp_enqueue_script('idangerous', get_template_directory_uri() . '/assets/js/idangerous.swiper.js',array(),'', true);
		wp_enqueue_script('mixit', get_template_directory_uri() . '/assets/js/jquery.mixitup.js',array(),'', true);
		wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js',array(),'', true);
	}
	add_action( 'wp_enqueue_scripts', 'buildo_enqueue_scripts' );
}
/**
 * Register sidebars for buildo
*/
function buildo_sidebars() {

	// Blog Sidebar
	
	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', "buildo"),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Sidebar on the blog layout.', "buildo"),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="middle-title">',
		'after_title' => '</h3>',
	));
  	

	// Footer Sidebar
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 1', "buildo"),
		'id' => 'buildo-footer-widget-area-1',
		'description' => esc_html__( 'The footer widget area 1', "buildo"),
		'before_widget' => ' <div class="widget %2$s">',
		'after_widget' => '</div> ',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 2', "buildo"),
		'id' => 'buildo-footer-widget-area-2',
		'description' => esc_html__( 'The footer widget area 2', "buildo"),
		'before_widget' => '<div class="widget %2$s"> ',
		'after_widget' => ' </div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 3', "buildo"),
		'id' => 'buildo-footer-widget-area-3',
		'description' => esc_html__( 'The footer widget area 3', "buildo"),
		'before_widget' => '<div class=" widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));	
}

add_action( 'widgets_init', 'buildo_sidebars' );
/**
 * Comment layout
 */
function buildo_comments( $comment, $args, $depth ) {  ?>
    <div <?php comment_class('comments'); ?> id="<?php comment_ID() ?>">
        <?php if ($comment->comment_approved == '0') : ?>
		    <div class="alert alert-info">
		      <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'buildo' ) ?></p>
		    </div>
	    <?php endif; ?>
        
		<?php echo get_avatar( $comment,'88', null,'User', array( 'class' => array('media-object ava','' ) )); ?>
		<h4 class="user-name">
			<?php 
			/* translators: '%1$s %2$s: edit term */
			printf(esc_html__( '%1$s %2$s', 'buildo' ), get_comment_author_link(), edit_comment_link(esc_html__( '(Edit)', 'buildo' ),'  ','') ) ?>
			
        </h4>
        <div class="comment-info">
        	<?php echo esc_html__('Posted at', 'buildo' ); ?> <?php echo get_the_date();?>
            <a class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
        </div>
		<?php comment_text() ;?>
	</div>
<?php
} 

/**
* Customizer additions.
*/
require get_template_directory(). '/include/customizer.php';
?>
