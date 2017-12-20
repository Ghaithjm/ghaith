<?php

if ( ! class_exists( 'OT_Loader' )){
	function ot_get_option() {
		return false;
	}

	function get_option_tree() {
		return false;
	}
}

/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => esc_html__('General Config','zirto'),
      ),
	  
      array(
        'id'          => 'blog_settings',
        'title'       => esc_html__('Blog Settings','zirto'),
      ),

      array(
        'id'          => 'donate_settings',
        'title'       => esc_html__('Donate Button','zirto'),
      ),

      array(
        'id'          => 'google_fonts',
        'title'       => esc_html__('Google Fonts','zirto'),
      ),

      array(
        'id'          => 'typography',
        'title'       => esc_html__('Typography','zirto'),
      ),
	  
	  array(
		'id'          => 'map_settings',
		'title'       => esc_html__('Map Settings','zirto'),
	  ),
	  
	  array(
		'id'          => 'contact_info',
		'title'       => esc_html__('Contact Info','zirto'),
	  ),
	  
	  array(
		'id'          => 'social',
		'title'       => esc_html__('Social','zirto'),
	  ),
	  
      array(
        'id'          => 'copyright',
        'title'       => esc_html__('Footer / Copyright','zirto'),
      )	  
	
    ),
    'settings'        => array(
	
      array(
        'label'       => esc_html__( 'Logo', 'zirto' ),
        'id'          => 'tab_logo',
        'type'        => 'tab',
        'section'     => 'general'
      ),
	  array(
        'id'          => 'zirto_logo',
        'label'       => esc_html__('Logo Image','zirto'),
        'desc'        => esc_html__('Upload your own logo.','zirto'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	 
	  array(
        'id'          => 'zirto_logotext',
        'label'       => esc_html__('Logo Text','zirto'),
        'desc'        => esc_html__('Add Logo Text','zirto'),
        'std'         => 'Zirto',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  
	  
      array(
        'label'       => esc_html__( 'Css', 'zirto' ),
        'id'          => 'tab_css',
        'type'        => 'tab',
        'section'     => 'general'
      ),

      array(
        'id'          => 'zirto_css',
        'label'       => esc_html__('Additional CSS','zirto' ),
        'desc'        => esc_html__('Additional css here (optional)','zirto' ),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

      array(
        'label'       => esc_html__( 'Js', 'zirto' ),
        'id'          => 'tab_js',
        'type'        => 'tab',
        'section'     => 'general'
      ),
	  
       array(
        'id'          => 'zirto_js',
        'label'       => esc_html__('Additional JS','zirto' ),
        'desc'        => esc_html__('Additional js here (optional)','zirto' ),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  
	  
      array(
        'id'          => 'layout_set',
        'label'       => esc_html__( 'Blog Layout', 'zirto' ),
        'desc'        => esc_html__( ' Left Sidebar - Right Sidebar - Full Width', 'zirto' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'blog_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	

      array(
        'id'          => 'zirto_donate_button',
        'label'       => esc_html__('On/Off Donate Button', 'zirto' ),
        'desc'        => esc_html__('Disable or Enable Donate Button from left side of the site.','zirto'),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'donate_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'id'          => 'zirto_donate_first_title',
        'label'       => esc_html__('First Title','zirto'),
        'desc'        => esc_html__('Add title for donate button.','zirto'),
        'std'         => esc_html__('Hey Would You Like To','zirto'),
        'type'        => 'text',
        'section'     => 'donate_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
		'condition'	  => 'zirto_donate_button:is(on)',
      ),

	  array(
        'id'          => 'zirto_donate_second_title',
        'label'       => esc_html__('Second Title','zirto'),
        'desc'        => esc_html__('Add title for donate button.','zirto'),
        'std'         => esc_html__('DONATE NOW ?','zirto'),
        'type'        => 'text',
        'section'     => 'donate_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
		'condition'	  => 'zirto_donate_button:is(on)'
      ),

	  array(
        'id'          => 'zirto_donate_button_text',
        'label'       => esc_html__('Text of Button','zirto'),
        'desc'        => esc_html__('Set text for donation button','zirto'),
        'std'         => 'Donate',
        'type'        => 'text',
        'section'     => 'donate_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
		'condition'	  => 'zirto_donate_button:is(on)'
      ),

      array(
        'id'          => 'zirto_donate_button_type',
        'label'       => esc_html__( 'Select Button Type', 'zirto' ),
        'desc'        => esc_html__( '<strong>Modal Type:</strong> Popup window will be appeared.<br><strong>Default Type:</strong> You can set a url to redirect the button.', 'zirto' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'donate_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
		'condition'	  => 'zirto_donate_button:is(on)',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'modal_type',
            'label'       => esc_html__( 'Modal Type', 'zirto' ),
            'src'         => ''
          ),
          array(
            'value'       => 'default_type',
            'label'       => esc_html__( 'Default Type', 'zirto' ),
            'src'         => ''
          )
        )
      ),

	  array(
        'id'          => 'zirto_donate_modal_content',
        'label'       => esc_html__('Modal Content','zirto'),
        'desc'        => esc_html__('Add content for modal popup screen.To add donation form use "[totaldonations]" shortcode','zirto'),
        'std'         => 'Donate',
        'type'        => 'textarea',
        'section'     => 'donate_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'condition'   => 'zirto_donate_button_type:is(modal_type),zirto_donate_button:is(on)'
      ),

	  array(
        'id'          => 'zirto_donate_button_url',
        'label'       => esc_html__('Button Url','zirto'),
        'desc'        => esc_html__('Add url for donation button ','zirto'),
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'donate_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'condition'   => 'zirto_donate_button_type:is(default_type)'
      ),

	 array(
	    'id'          => 'body_google_fonts',
	    'label'       => esc_html__('Google Fonts','zirto' ),
	    'desc'        => esc_html__('Add Google Font and after the save settings follow these steps Dashboard > Appearance > Theme Options > Typography','zirto' ),
	    'std'         => '',
	    'type'        => 'google-fonts',
	    'section'     => 'google_fonts',
	    'rows'        => '',
	    'post_type'   => '',
	    'taxonomy'    => '',
	    'min_max_step'=> '',
	    'class'       => '',
	    'condition'   => '',
	    'operator'    => 'and'
	),

      array(
        'label'       => esc_html__( 'General', 'zirto' ),
        'id'          => 'tab_general',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'tipigrof',
        'label'       => esc_html__( 'Body Typography', 'zirto' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'zirto' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H1 Title', 'zirto' ),
        'id'          => 'tab_h1title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'h1_tipigrof',
        'label'       => esc_html__( 'H1 Title Typography', 'zirto' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'zirto' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H2 Title', 'zirto' ),
        'id'          => 'tab_h2title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'h2_tipigrof',
        'label'       => esc_html__( 'H2 Title Typography', 'zirto' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'zirto' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H3 Title', 'zirto' ),
        'id'          => 'tab_h3title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'h3_tipigrof',
        'label'       => esc_html__( 'H3 Title Typography', 'zirto' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'zirto' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H4 Title', 'zirto' ),
        'id'          => 'tab_h4title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'h4_tipigrof',
        'label'       => esc_html__( 'H4 Title Typography', 'zirto' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'zirto' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H5 Title', 'zirto' ),
        'id'          => 'tab_h5title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'h5_tipigrof',
        'label'       => esc_html__( 'H5 Title Typography', 'zirto' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.', 'zirto' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'H6 Title', 'zirto' ),
        'id'          => 'tab_h6title',
        'type'        => 'tab',
        'section'     => 'typography'
      ),


      array(
        'id'          => 'h6_tipigrof',
        'label'       => esc_html__( 'H6 Title Typography', 'zirto' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.','zirto' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

      array(
        'label'       => esc_html__( 'P(Content)', 'zirto' ),
        'id'          => 'tab_pcontent',
        'type'        => 'tab',
        'section'     => 'typography'
      ),

      array(
        'id'          => 'p_tipigrof',
        'label'       => esc_html__( 'P(Content) Typography', 'zirto' ),
        'desc'        => esc_html__('The Typography option type is for adding typography styles to your site.','zirto' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	
	  array(
			'id'          => 'zirto_mapapi',
			'label'       => esc_html__('Google Map Api Key','zirto' ),
			'desc'        => esc_html__('Add your google map api key','zirto' ),
			'std'         => '',
			'type'        => 'text',
			'section'     => 'map_settings',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => ''
	  ),	
	  
      array(
        'id'          => 'zirto_contact_info',
        'label'       => esc_html__('Set Contact Informations','zirto'),
        'desc'        => esc_html__('Create contact informations for the top header.','zirto'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'contact_info',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 

          array(
            'id'          => 'zirto_contactinfo',
            'label'       => esc_html__('Contact Info','zirto'),
            'desc'        => esc_html__('Set information as text.','zirto'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),

          array(
            'id'          => 'zirto_contacticon',
            'label'       => esc_html__('Icon Name','zirto'),
            'desc'        => esc_html__('Add Your Icon : phone','zirto'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
        )
      ),

      array(
        'id'          => 'zirto_socialicons',
        'label'       => esc_html__('Set Social Icon','zirto'),
        'desc'        => esc_html__('Create Social Icons','zirto'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 

          array(
            'id'          => 'zirto_sociallink',
            'label'       => esc_html__('Link','zirto'),
            'desc'        => esc_html__('Add Your Link','zirto'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),

          array(
            'id'          => 'zirto_socialicon',
            'label'       => esc_html__('Icon Name','zirto'),
            'desc'        => esc_html__('Add Your Icon : facebook','zirto'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
        )
      ),
	  
      array(
        'label'       => esc_html__( 'General', 'zirto' ),
        'id'          => 'tab__footer_general',
        'type'        => 'tab',
        'section'     => 'copyright'
      ),
	  
      array(
        'id'          => 'zirto_copyright',
        'label'       => esc_html__('Footer Copyright','zirto'),
        'desc'        => esc_html__('Footer Copyright','zirto'),
        'std'         => esc_html__('Copyright 2017.KlbTheme . All rights reserved','zirto'),
        'type'        => 'text',
        'section'     => 'copyright',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}