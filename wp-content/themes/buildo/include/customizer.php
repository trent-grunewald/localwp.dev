<?php
/**
 * Buildo Theme Customizer
 *
 * @package Buildo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/


function buildo_customize_register( $wp_customize ) {	
	 
	// Buildo theme choice options
	if (!function_exists('buildo_section_choice_option')) :
		function buildo_section_choice_option()
		{
			$buildo_section_choice_option = array(
				'show' => esc_html__('Show', 'buildo'),
				'hide' => esc_html__('Hide', 'buildo')
			);
			return apply_filters('buildo_section_choice_option', $buildo_section_choice_option);
		}
	endif;
	
	/**
	 * Sanitizing the select callback example
	 *
	 */
	if ( !function_exists('buildo_sanitize_select') ) :
		function buildo_sanitize_select( $input, $setting ) {

			// Ensure input is a slug.
			$input = sanitize_text_field( $input );

			// Get list of choices from the control associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}
	endif;

	/**
	 * Drop-down Pages sanitization callback example.
	 *
	 * - Sanitization: dropdown-pages
	 * - Control: dropdown-pages
	 * 
	 * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
	 * as an absolute integer, and then validates that $input is the ID of a published page.
	 * 
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
	 *
	 * @param int                  $page    Page ID.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
	function buildo_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );
		
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
	
	
	/** Front Page Section Settings starts **/	

	$wp_customize->add_panel(
		'frontpage', 
		array(
			'title' => esc_html__('Buildo Options', 'buildo'),        
			'description' => '',                                        
			'priority' => 3,
		)
	);
	
	/** Slider Section Settings starts **/
   

	// Panel - Slider Section 1
    $wp_customize->add_section('sliderinfo', 
	    array(
		    'title'   => esc_html__('Home Slider Section', 'buildo'),
		    'description' => '',
			'panel' => 'frontpage',
		    'priority'    => 140
	    )
	);

	// hide show
	
	$wp_customize->add_setting('buildo_slider_section_hideshow',
	    array(
	        'default' => 'hide',
	        'sanitize_callback' => 'buildo_sanitize_select',
	    )
    );
	 
    $buildo_section_choice_option = buildo_section_choice_option();
    
    $wp_customize->add_control(
    'buildo_slider_section_hideshow',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Slider Option', 'buildo'),
	        'description' => esc_html__('Show/hide option for Slider Section.', 'buildo'),
	        'section' => 'sliderinfo',
	        'choices' => $buildo_section_choice_option,
	        'priority' => 1
	    )
    );
  
    $slider_no = 3;
	for( $i = 1; $i <= $slider_no; $i++ ) {
		$buildo_slider_page = 'buildo_slider_page_' .$i;
		$buildo_slider_btntxt = 'buildo_slider_btntxt_' . $i;
		$buildo_slider_btnurl = 'buildo_slider_btnurl_' .$i;
		 

		$wp_customize->add_setting( $buildo_slider_page,
			array(
				'default'           => 1,
				'sanitize_callback' => 'buildo_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $buildo_slider_page,
			array(
				'label'    			=> esc_html__( 'Slider Page ', 'buildo' ) .$i,
				'section'  			=> 'sliderinfo',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);

		$wp_customize->add_setting( $buildo_slider_btntxt,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $buildo_slider_btntxt,
			array(
				'label'    			=> esc_html__( 'Slider Button Text','buildo' ),
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
		
		$wp_customize->add_setting( $buildo_slider_btnurl,
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( $buildo_slider_btnurl,
			array(
				'label'    			=> esc_html__( 'Button URL', 'buildo' ),
				'section'  			=> 'sliderinfo',
				'priority' 			=> 100,
			)
		);
    }
	/** Slider Section Settings end **/
	
	// Header info
	$wp_customize->add_section(
		'buildo_header_section', 
		array(
			'title'   => esc_html__('Top Header Info Section', 'buildo'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 130
		)
	);

	$wp_customize->add_setting(
		'buildo_header_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'buildo_sanitize_select',
		)
	);
	
	$buildo_section_choice_option = buildo_section_choice_option();
	$wp_customize->add_control(
		'buildo_header_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Header Info Option', 'buildo'),
			'description' => esc_html__('Show/hide option for Header Section.', 'buildo'),
			'section' => 'buildo_header_section',
			'choices' => $buildo_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'buildo_header_phone_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'buildo_header_phone_value', 
		array(
			'label'   => esc_html__('Contact Number', 'buildo'),
			'section' => 'buildo_header_section',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'buildo_header_email_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'buildo_header_email_value',
		array(
			'label'   => esc_html__('Email', 'buildo'),
			'section' => 'buildo_header_section',
			'priority'  => 5
		)
	);

	$wp_customize->add_setting(
		'buildo_header_address_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'buildo_header_address_value',
		array(
			'label'   => esc_html__('Address', 'buildo'),
			'section' => 'buildo_header_section',
			'priority'  => 5
		)
	);

	$wp_customize->add_setting(
		'buildo_header_timing', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'buildo_header_timing',
		array(
			'label'   => esc_html__('Timing', 'buildo'),
			'section' => 'buildo_header_section',
			'priority'  => 5
		)
	);
	
	
	
	//  Services section
	if (!function_exists('buildo_col_layout_option')) :
	    function buildo_col_layout_option()
	    {
	        $buildo_col_layout_option = array(
	            '6' => esc_html__('2 Column Layout', 'buildo'),
				'4' => esc_html__('3 Column Layout', 'buildo'),
				'3' => esc_html__('4 Column Layout', 'buildo'),
	        );
	        return apply_filters('buildo_col_layout_option', $buildo_col_layout_option);
	    }
	endif;

	$wp_customize->add_section(
		'services',              
		array(
			'title' => esc_html__('Home Service Section', 'buildo'),          
			'description' => '',             
			'panel' => 'frontpage',		 
			'priority' => 150,
		)
	);
	
	$wp_customize->add_setting(
		'buildo_services_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'buildo_sanitize_select',
		)
    );
    
    $buildo_section_choice_option = buildo_section_choice_option();
    $wp_customize->add_control(
		'buildo_services_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Services Option', 'buildo'),
			'description' => esc_html__('Show/hide option Section.', 'buildo'),
			'section' => 'services',
			'choices' => $buildo_section_choice_option,
			'priority' => 1
		)
    );	

    // column layout
	$wp_customize->add_setting(
	'buildo_service_col_layout',
		array(
			'default' => '4',
			'sanitize_callback' => 'buildo_sanitize_select',
		)
	);
	$buildo_section_col_layout = buildo_col_layout_option();
	
	$wp_customize->add_control(
	'buildo_service_col_layout',
		array(
			'type' => 'radio',
			'label' => esc_html__('Column Layout option ', 'buildo'),
			'description' => '',
			'section' => 'services',
			'choices' => $buildo_section_col_layout,
			'priority' => 2
		)
	);
   
    $wp_customize->add_setting(
		'buildo-services_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'buildo-services_title',
		array(
			'label'   => esc_html__('Services Section Title', 'buildo'),
			'section' => 'services',
			'priority'  => 3
		)
	);
	
	$wp_customize->add_setting(
		'buildo-services_subtitle',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'buildo-services_subtitle',
		array(
			'label'   => esc_html__('Service Section Subtitle', 'buildo'),
			'section' => 'services',	  
			'priority'  => 4
		)
	);

    $service_no = 8;
	for( $i = 1; $i <= $service_no; $i++ ) {
		$buildo_servicepage = 'buildo_service_page_' . $i;
		$buildo_serviceicon = 'buildo_page_service_icon_' . $i;
		
		// Setting - Feature Icon
		$wp_customize->add_setting( 
			$buildo_serviceicon,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( 
			$buildo_serviceicon,
			array(
				'label'    			=> esc_html__( 'Service Icon ', 'buildo' ).$i,
				'description' 		=>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','buildo'),
				'section'  			=> 'services',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
		
		$wp_customize->add_setting( 
			$buildo_servicepage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'buildo_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( 
			$buildo_servicepage,
			array(
				'label'    			=> esc_html__( 'Service Page ', 'buildo' ) .$i,
				'section'  			=> 'services',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
    }
	
	
	//  Projects section
	$wp_customize->add_section(
		'projects',              
		array(
			'title' => esc_html__('Project Section', 'buildo'),          
			'description' => '',             
			'panel' => 'frontpage',		 
			'priority' => 160,
		)
	);
	
	$wp_customize->add_setting(
		'buildo_projects_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'buildo_sanitize_select',
		)
	);
	
	$buildo_section_choice_option = buildo_section_choice_option();
	$wp_customize->add_control(
		'buildo_projects_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Projects Option', 'buildo'),
			'description' => esc_html__('Show/hide option Section.', 'buildo'),
			'section' => 'projects',
			'choices' => $buildo_section_choice_option,
			'priority' => 1
		)
	);
		
	$wp_customize->add_setting(
		'buildo-projects_title', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'buildo-projects_title', 
		array(
			'label'   => esc_html__('Projects Section Title', 'buildo'),
			'section' => 'projects',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'buildo-projects_subtitle', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'buildo-projects_subtitle',
		array(
			'label'   => esc_html__('Projects Description', 'buildo'),
			'section' => 'projects', 
			'priority'  => 4
		)
	);
	
	$projects_no = 8;
	
	for( $i = 1; $i <= $projects_no; $i++ ) {
		$buildo_projectspage = 'buildo_projects_page_' . $i;		
		$wp_customize->add_setting( 
			$buildo_projectspage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'buildo_sanitize_dropdown_pages',
			)
		);
		$wp_customize->add_control( 
			$buildo_projectspage,
			array(
				'label'    			=> esc_html__( 'Projects Page ', 'buildo' ) .$i,
				'section'  			=> 'projects',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
	}
	// Blog section
	$wp_customize->add_section(
		'buildo-blog_info',
		array(
			'title'   => esc_html__('Home Blog Section', 'buildo'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 170
		)
	);
	
	$wp_customize->add_setting(
		'buildo_blog_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'buildo_sanitize_select',
		)
	);
    
    $buildo_section_choice_option = buildo_section_choice_option();
    $wp_customize->add_control(
		'buildo_blog_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Blog Option', 'buildo'),
			'description' => esc_html__('Show/hide option for Blog Section.', 'buildo'),
			'section' => 'buildo-blog_info',
			'choices' => $buildo_section_choice_option,
			'priority' => 1
		)
    );
	
	$wp_customize->add_setting(
		'buildo_blog_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'buildo_blog_title',
		array(
			'label'   => esc_html__('Blog Title', 'buildo'),
			'section' => 'buildo-blog_info',
			'priority'  => 1
		)
	);

	$wp_customize->add_setting('buildo-blog_subtitle',
	    array(
            'default'   => '',
            'type'      => 'theme_mod',
	        'sanitize_callback'	=> 'sanitize_text_field'
        )
	);

    $wp_customize->add_control('buildo-blog_subtitle', 
    	array(
	        'label'   => esc_html__('Blog Description', 'buildo'),
	        'section' => 'buildo-blog_info', 
		    'type'  => 'text',
	        'priority'  => 2
        )
    );

	// Callout section
	$wp_customize->add_section(
		'buildo_footer_contact', 
		array(
			'title'   => esc_html__('Callout Section', 'buildo'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 140
		)
	);
	
	$wp_customize->add_setting(
		'buildo_contact_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'buildo_sanitize_select',
		)
	);

	$buildo_section_choice_option = buildo_section_choice_option();
	$wp_customize->add_control(
		'buildo_contact_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Footer Callout', 'buildo'),
			'description' => esc_html__('Show/hide option for Footer Callout Section.', 'buildo'),
			'section' => 'buildo_footer_contact',
			'choices' => $buildo_section_choice_option,
			'priority' => 5
		)
	);

	$wp_customize->add_setting(
		'ctah_heading', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'ctah_heading', 
		array(
			'label'   => esc_html__('Callout Text', 'buildo'),
			'section' => 'buildo_footer_contact',
			'priority'  => 8
		)
	);

	$wp_customize->add_setting(
		'ctah_btn_url', 
		array(
			'default'   =>'',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'ctah_btn_url', 
		array(
			'label'   => esc_html__('Button URL', 'buildo'),
			'section' => 'buildo_footer_contact',
			'priority'  => 10
		)
	);

	$wp_customize->add_setting(
		'ctah_btn_text', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'ctah_btn_text', 
		array(
			'label'   => esc_html__('Button Text', 'buildo'),
			'section' => 'buildo_footer_contact',
			'priority'  => 12
		)
	);
	
	// clients logo  info
	$wp_customize->add_section(
		'clients_logo', 
		array(
			'title'   => esc_html__('Clients logo Section', 'buildo'),
			'description' => '',
			'panel' => 'frontpage', 
			'priority'        => 170
		)
	);

	$wp_customize->add_setting(
		'buildo_clients_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'buildo_sanitize_select',
		)
	);

	$buildo_section_choice_option = buildo_section_choice_option();
	$wp_customize->add_control(
		'buildo_clients_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Clients-logo', 'buildo'),
			'description' => esc_html__('Show/hide option for Clients-logo Section.', 'buildo'),
			'section' => 'clients_logo',
			'choices' => $buildo_section_choice_option,
			'priority' => 5
		)
	);

	// Clients title
	$wp_customize->add_setting(
		'buildo_clients_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'buildo_clients_title',
		array(
			'label'   => esc_html__('Clients logo Section Title', 'buildo'),
			'section' => 'clients_logo',
			'priority'  => 6
		)
	);

	$wp_customize->add_setting('buildo-clients_subtitle',
	    array(
            'default'   => '',
            'type'      => 'theme_mod',
	        'sanitize_callback'	=> 'sanitize_text_field'
        )
	);

    $wp_customize->add_control('buildo-clients_subtitle', 
    	array(
	        'label'   => esc_html__('Clients Description', 'buildo'),
	        'section' => 'clients_logo', 
		    'type'  => 'text',
	        'priority'  => 6
        )
    );

	$client_no = 6;
	for( $i = 1; $i <= $client_no; $i++ ) 
	{
		$buildo_client_logo = 'buildo_client_logo_' . $i;   

		$wp_customize->add_setting( 
			$buildo_client_logo,
			array(
				'default'           => 1,
				'sanitize_callback' => 'buildo_sanitize_dropdown_pages',
			)
		);
		$wp_customize->add_control( 
			$buildo_client_logo,
			array(
				'label'    			=> esc_html__( 'Client Page ', 'buildo' ) .$i,
				'section'  			=> 'clients_logo',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);

	}

	// Footer Section
	
	$wp_customize->add_section(
		'buildo-footer_info',
		array(
			'title'   => esc_html__('Footer Section', 'buildo'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 170
		)
	);

	$wp_customize->add_setting(
		'buildo_footer_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'buildo_sanitize_select',
		)
	);
	$buildo_section_choice_option = buildo_section_choice_option();
	$wp_customize->add_control(
		'buildo_footer_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Footer Option', 'buildo'),
			'description' => esc_html__('Show/hide option for Footer Section.', 'buildo'),
			'section' => 'buildo-footer_info',
			'choices' => $buildo_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'buildo-footer_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'wp_kses_post'
		)
	);

	$wp_customize->add_control(
		'buildo-footer_title',
		array(
			'label'   => esc_html__('Copyright', 'buildo'),
			'section' => 'buildo-footer_info',
			'type'      => 'textarea',
			'priority'  => 1
		)
	);
   
  	
/** Front Page Section Settings end **/	

}
add_action( 'customize_register', 'buildo_customize_register' );
