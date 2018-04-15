<?php
/**
 * SKT Lawzo Theme Customizer
 *
 * @package SKT Lawzo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_lawzo_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#fa5c5d',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','skt-lawzo'),			
			 'description' => __( 'More color options in PRO Version.', 'skt-lawzo' ),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('color_option',array(
			'default'	=> '#fa5c5d',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_option',array(
			'label' => __('Other Color Option','skt-lawzo'),			
			 'description' => __( 'More color options in PRO Version.', 'skt-lawzo' ),			
			'section' => 'colors',
			'settings' => 'color_option'
		))
	);	
	
	// Slider Section		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'skt-lawzo'),
            'priority' => null,
            'description' => __( 'Featured Image Size Should be ( 1209x494 ) More slider settings available in PRO Version.', 'skt-lawzo' ),			
        )
    );
	
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'skt_lawzo_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','skt-lawzo'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_lawzo_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','skt-lawzo'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_lawzo_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','skt-lawzo'),
			'section'	=> 'slider_section'
	));	// Slider Section
	
	$wp_customize->add_setting('hide_slides',array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => true,
	));	 

	$wp_customize->add_control('hide_slides', array(
    	   'section'   => 'slider_section',
    	   'label'     => 'Uncheck to show slider',
    	   'type'      => 'checkbox'
     ));	
	
	
	// Home Welcome Section 	
	$wp_customize->add_section('section_first',array(
		'title'	=> __('Homepage  Why Choose Us','skt-lawzo'),
		'description'	=> __('Select Page from the dropdown for first section','skt-lawzo'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_lawzo_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-setting1',array('type' => 'dropdown-pages',
			'section' => 'section_first',
	));
	
	$wp_customize->add_setting('hide_choose',array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_choose', array(
    	   'section'   => 'section_first',
    	   'label'     => 'Uncheck to show this section',
    	   'type'      => 'checkbox'
     ));
	
	// Home Why Choose Us Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> __('Homepage Three Box Services','skt-lawzo'),
		'description'	=> __('Select Pages from the dropdown for homepage three column box section','skt-lawzo'),
		'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('page-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_lawzo_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_lawzo_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_lawzo_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));	//end three column part
	
	$wp_customize->add_setting('hide_column',array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_column', array(
    	   'section'   => 'section_second',
    	   'label'     => 'Uncheck to show this section',
    	   'type'      => 'checkbox'
     ));	
	
	
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','skt-lawzo'),				
			'description' => __( 'More social icon available in PRO Version.', 'skt-lawzo' ),			
			'priority'		=> null
	));
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','skt-lawzo'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','skt-lawzo'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','skt-lawzo'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','skt-lawzo'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	$wp_customize->add_setting('hide_social',array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_social', array(
    	   'section'   => 'social_sec',
    	   'label'     => 'Uncheck to show this section',
    	   'type'      => 'checkbox'
     ));	
	
	$wp_customize->add_section('footer_area',array(
			'title'	=> __('Footer Area','skt-lawzo'),
			'priority'	=> null,
			'description'	=> __('Add footer copyright text','skt-lawzo')
	));
	
	$wp_customize->add_setting('about_title',array(
			'default'	=> __('About Us','skt-lawzo'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_title',array(
			'label'	=> __('Add title for our philosophy','skt-lawzo'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_title'
	));
	
	$wp_customize->add_setting('about_description',array(
			'default'	=> __('Donec ut ex ac nulla pellentesque mollis in a enim. Praesent placerat sapien mauris, vitae sodales tellus venenatis ac. Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin sed, porta quis urna. Quisque velit nibh, egestas et erat a, vehicula interdum augue. <br /> </br > Donec ut ex ac nulla pellentesque mollis in a enim. Praesent placerat sapien mauris, vitae sodales tellus venenatis ac suspendisse suscipit velit. ','skt-lawzo'),
			'sanitize_callback'	=> 'wp_kses_post'
	));
	
	$wp_customize->add_control('about_description', array(	
			'label'	=> __('Add description for about us','skt-lawzo'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_description',
			'type' => 'textarea',
	));
	
	$wp_customize->add_setting('services_title',array(
			'default'	=> __('Our Services','skt-lawzo'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('services_title',array(
			'label'	=> __('Add title for our services','skt-lawzo'),
			'section'	=> 'footer_area',
			'setting'	=> 'services_title'
	));	
	
	$wp_customize->add_setting('latestpost_title',array(
			'default'	=> __('Latest Posts','skt-lawzo'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('latestpost_title',array(
			'label'	=> __('Add title for office hours','skt-lawzo'),
			'section'	=> 'footer_area',
			'setting'	=> 'latestpost_title'
	));		
	
	
	$wp_customize->add_setting('footer_copyright',array(
			'default'	=> __('Copyright @ 2016 SKT Lawzo. All Rights Reserved','skt-lawzo'),
			'sanitize_callback'	=> 'wp_kses_post'
	));
	
	$wp_customize->add_control('footer_copyright', array(
				'label'	=> __('Add copyright text for footer','skt-lawzo'),
				'section'	=> 'footer_area',
				'setting'	=> 'footer_copyright',
				'type' => 'textarea',
	));	
	
	$wp_customize->add_section('header_info',array(
			'title'	=> __('Header And Footer Info','skt-lawzo'),
			'priority'	=> null
	));
	
	
	$wp_customize->add_setting('hide_headfoo',array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_headfoo', array(
    	   'section'   => 'footer_area',
    	   'label'     => 'Uncheck to show this section',
    	   'type'      => 'checkbox'
     ));	
	
	
	
	$wp_customize->add_setting('opning_hours_title',array(
			'default'	=> __('Opening Hours','skt-lawzo'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('opning_hours_title',array(
			'label'	=> __('Add title for opening hour','skt-lawzo'),
			'section'	=> 'header_info',
			'setting'	=> 'opning_hours_title'
	));		
	
	$wp_customize->add_setting('opning_hours',array(
			'default'	=> __('Mon to Fri - 10.00 AM to 7.00 PM Sat - 10.00 AM to 4.00 PM','skt-lawzo'),
			'sanitize_callback'	=> 'wp_kses_post'
	));
	
	$wp_customize->add_control('opning_hours', array(
				'label'	=> __('Add opning hours for header','skt-lawzo'),
				'section'	=> 'header_info',
				'setting'	=> 'opning_hours',
				'type' => 'textarea',
	));
	
	
	
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> __('Address','skt-lawzo'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_title',array(
			'label'	=> __('Add title for contact address','skt-lawzo'),
			'section'	=> 'header_info',
			'setting'	=> 'contact_title'
	));
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('SKT Lawzo 10 Down Street, Hunterdon, United States','skt-lawzo'),
			'sanitize_callback'	=> 'wp_kses_post'
	));
	
	$wp_customize->add_control('contact_add', array(
				'label'	=> __('Add contact address here','skt-lawzo'),
				'section'	=> 'header_info',
				'setting'	=> 'contact_add',
				'type' => 'textarea',
	));
	
	
	
	$wp_customize->add_setting('callus_title',array(
			'default'	=> __('Call Us','skt-lawzo'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('callus_title',array(
			'label'	=> __('Add title for call us','skt-lawzo'),
			'section'	=> 'header_info',
			'setting'	=> 'callus_title'
	));	
	
	
	$wp_customize->add_setting('header_phone',array(
			'default'	=> __(' +10 2234567890 +10 1123456789','skt-lawzo'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('header_phone',array(
			'label'	=> __('Add contact phone number for header','skt-lawzo'),
			'section'	=> 'header_info',
			'setting'	=> 'header_phone'
	));	
	
	$wp_customize->add_setting('emailus_title',array(
			'default'	=> __('Email Us','skt-lawzo'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('emailus_title',array(
			'label'	=> __('Add title for email us','skt-lawzo'),
			'section'	=> 'header_info',
			'setting'	=> 'emailus_title'
	));	
	
	$wp_customize->add_setting('email_address',array(
			'default'	=> __('support@sitename.com info@sitename.com','skt-lawzo'),
			'sanitize_callback'	=> 'wp_kses_post'
	));
	
	$wp_customize->add_control('email_address', array(
				'label'	=> __('Add email address for header','skt-lawzo'),
				'section'	=> 'header_info',
				'setting'	=> 'email_address',
				'type' => 'textarea',
	));
	
	$wp_customize->add_setting('getquote_title',array(
			'default'	=> __('Get A Quote','skt-lawzo'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('getquote_title',array(
			'label'	=> __('Add title for get a quote','skt-lawzo'),
			'section'	=> 'header_info',
			'setting'	=> 'getquote_title'
	));	
	
	$wp_customize->add_setting('getquote_link',array(
			'default'	=> __('#','skt-lawzo'),
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('getquote_link',array(
			'label'	=> __('Add link for get a quote','skt-lawzo'),
			'section'	=> 'header_info',
			'setting'	=> 'getquote_link'
	));	
	
	$wp_customize->add_setting('hide_headfooinfo',array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_headfooinfo', array(
    	   'section'   => 'header_info',
    	   'label'     => 'Uncheck to show option in header and footer',
    	   'type'      => 'checkbox'
     ));	
}
add_action( 'customize_register', 'skt_lawzo_customize_register' );

//Integer
function skt_lawzo_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function skt_lawzo_custom_css_styles() {
        wp_enqueue_style( 'skt-lawzo-custom-styles', get_template_directory_uri() . '/css/custom-style.css' ); 
        $color = esc_attr(get_theme_mod('color_scheme','#fa5c5d')); //E.g. #fa5c5d
		$othercolor = esc_attr(get_theme_mod('color_option','#fa5c5d')); //E.g. #fa5c5d
        $custom_css = "a, .blog_lists h2 a:hover, .logo h1{color: {$color};} .pagination ul li a:hover, #commentform input#submit:hover, .nivo-controlNav a.active, h3.widget-title, .wpcf7 input[type=submit], #pagearea .threebox:hover, .current, input.search-submit, .post-password-form input[type=submit], .wpcf7-form input[type=submit]{background-color: {$color} !important;}.headerxxx{border-color: {$color};}.sitenav ul li a:hover, .sitenav ul li.current_page_item a, #sidebar ul li a:hover, .cols-3 ul li a:hover, .cols-3 ul li.current_page_item a, div.recent-post a:hover, .design-by a:hover, .container a:hover, .topleft ul li a:hover{color: {$othercolor};}.getaquote ul li a{background-color: {$othercolor};}";
        wp_add_inline_style( 'skt-lawzo-custom-styles', $custom_css ); // Custom CSS after style sheet
}
add_action( 'wp_enqueue_scripts', 'skt_lawzo_custom_css_styles' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_lawzo_customize_preview_js() {
	wp_enqueue_script( 'skt_lawzo_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_lawzo_customize_preview_js' );


function skt_lawzo_custom_customize_enqueue() {
	wp_enqueue_script( 'skt-lawzo-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'skt_lawzo_custom_customize_enqueue' );