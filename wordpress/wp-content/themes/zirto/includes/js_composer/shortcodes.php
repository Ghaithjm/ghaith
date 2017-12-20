<?php
/*-----------------------------------------------------------------------------------*/
/*	Shortcode Filter
/*-----------------------------------------------------------------------------------*/

vc_remove_element( "vc_gmaps");
vc_remove_element( "vc_wp_search");
vc_remove_element(  "vc_wp_meta" );
vc_remove_element(  "vc_wp_recentcomments" );
vc_remove_element(  "vc_wp_calendar" );
vc_remove_element(  "vc_wp_pages" );
vc_remove_element(  "vc_wp_tagcloud" );
vc_remove_element(  "vc_wp_custommenu" );
vc_remove_element(  "vc_wp_text" );
vc_remove_element(  "vc_wp_posts" );
vc_remove_element(  "vc_wp_categories" );
vc_remove_element(  "vc_wp_archives" );
vc_remove_element(  "vc_wp_rss" );
vc_remove_element(  "vc_progress_bar" );
vc_remove_element(  "vc_message" );
vc_set_as_theme( $disable_updater = false ); 
vc_is_updater_disabled();

function zirto_vc_remove_woocommerce() {
    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        vc_remove_element( 'woocommerce_cart' );
        vc_remove_element( 'woocommerce_checkout' );
        vc_remove_element( 'woocommerce_order_tracking' );
        vc_remove_element( 'woocommerce_my_account' );
        vc_remove_element( 'recent_products' );
        vc_remove_element( 'featured_products' );
        vc_remove_element( 'product' );
        vc_remove_element( 'products' );
        vc_remove_element( 'add_to_cart' );
        vc_remove_element( 'add_to_cart_url' );
        vc_remove_element( 'product_page' );
        vc_remove_element( 'product_category' );
        vc_remove_element( 'product_categories' );
        vc_remove_element( 'sale_products' );
        vc_remove_element( 'best_selling_products' );
        vc_remove_element( 'top_rated_products' );
        vc_remove_element( 'product_attribute' );
        vc_remove_element( 'related_products' );
    }
}
// Hook for admin editor.
add_action( 'vc_build_admin_page', 'zirto_vc_remove_woocommerce', 11 );
// Hook for frontend editor.
add_action( 'vc_load_shortcode', 'zirto_vc_remove_woocommerce', 11 );


/*-----------------------------------------------------------------------------------*/
/*	Zirto Particular Image
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_particular_image_integrateWithVC' );
function zirto_particular_image_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Zirto Particular Image", "zirto" ),
      "base" => "particular_image",
	  "category" => "Zirto",
      "params" => array( 
	  
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Background Image', 'zirto' ),
			'param_name' => 'image_url',
			'description' => esc_html__( 'Add Background Image', 'zirto' ),
            'group' => esc_html__( 'General', 'zirto' ),	
		),
		
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Dot Color", "zirto"),
			"param_name" => "dotcolor",
			"description" => esc_html__("Select dot color.", "zirto"),
            'group' => esc_html__( 'General', 'zirto' ),	
		),

		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Line Color", "zirto"),
			"param_name" => "linecolor",
			"description" => esc_html__("Select line color.", "zirto"),
            'group' => esc_html__( 'General', 'zirto' ),	
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Number', 'zirto' ),
			'param_name' => 'number',
			'description' => esc_html__( 'Set dots count.', 'zirto' ),
            'group' => esc_html__( 'General', 'zirto' ),	
		),
		
		array(
			'type' => 'textarea_html',
			'heading' => esc_html__( 'Title', 'zirto' ),
			'param_name' => 'content',
			'description' => esc_html__( 'Add title for particular background image.', 'zirto' ),
            'group' => esc_html__( 'Title', 'zirto' ),	
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Hover Types', 'zirto' ),
			'param_name' => 'hovertype',
			'value' => array(
				esc_html__( 'Select Type', 'zirto' ) => 'select-type',
				esc_html__( 'No Hover', 'zirto' ) => 'false',
				esc_html__( 'Grab', 'zirto' ) => 'grab',
				esc_html__( 'Bubble', 'zirto' ) => 'bubble',
				esc_html__( 'Repulse', 'zirto' ) => 'repulse',
			),
			'description' => esc_html__( 'Select hover type.', 'zirto' ),
            'group' => esc_html__( 'Hover', 'zirto' ),	
		),
					
		
      ),
   ) );
}
class WPBakeryShortCode_Particular_Image extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Campaign Form
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_campaign_form_integrateWithVC' );
function zirto_campaign_form_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Zirto Campaign Form", "zirto" ),
      "base" => "campaign_form",
	  "category" => "Zirto",
      "params" => array(
	  
		array(
			"type" => "textfield",
			"heading" => esc_html__("Campaign Id", "zirto"),
			"param_name" => "campaign_id",
			"description" => esc_html__("Add one of the available id of the campaign(Total Donations > Campaign) ", "zirto"),
			"admin_label" => true,
		),
		
      ),
   ) );
}
class WPBakeryShortCode_Campaign_Form extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Fundraise Bar
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_fundraise_bar_vc' );
function zirto_fundraise_bar_vc() {
   vc_map( array(
      "name" => esc_html__( "Zirto Fundraise Bar", "zirto" ),
      "base" => "fundraise_bar",
	  "category" => "Zirto",
      "params" => array(

		array(
			"type" => "textfield",
			"heading" => esc_html__("Campaign Title", "zirto"),
			"param_name" => "title",
			"description" => esc_html__("Add one of the available name of the campaign(Total Donations > Campaign)", "zirto"),
			'admin_label' => true,
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Campaign Id", "zirto"),
			"param_name" => "campaign_id",
			"description" => esc_html__("Add one of the available id of the campaign(Total Donations > Campaign)", "zirto"),
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Due Date", "zirto"),
			"param_name" => "duedate",
			"description" => esc_html__("Add due date for example : 25 December 2016", "zirto"),
		),
		
      ),
   ) );
}
class WPBakeryShortCode_Fundraise_Bar extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Title
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_title_klb' );
function zirto_title_klb() {
   vc_map( array(
      "name" => esc_html__( "Zirto Title", "zirto" ),
      "base" => "title",
	  "category" => "Zirto",
      "params" => array(

		array(
			'type' => 'textarea',
			'heading' => esc_html__( 'Title', 'zirto' ),
			'param_name' => 'title',
			'description' => esc_html__( 'Add title.', 'zirto' ),
			'admin_label' => true,
		),
		
		array(
			'type' => 'textarea',
			'heading' => esc_html__( 'Subtitle', 'zirto' ),
			'param_name' => 'subtitle',
			'description' => esc_html__( 'Add subtitle.', 'zirto' ),
		),
		
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Title Color', 'zirto' ),
			'param_name' => 'titlecolor',
			'description' => esc_html__( 'Select a color for title.', 'zirto' ),
			'group'       => 'Color',
		),
		
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Subtitle Color', 'zirto' ),
			'param_name' => 'subtitlecolor',
			'description' => esc_html__( 'Select a color for subtitle.', 'zirto' ),
			'group'       => 'Color',
		),
		
      ),
   ) );
}
class WPBakeryShortCode_Title extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	Zirto Icon Box
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_icon_box_integrateWithVC' );
function zirto_icon_box_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Zirto Icon Box", "zirto" ),
      "base" => "icon_box",
	  "category" => "Zirto",
      "params" => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon library', 'zirto' ),
			'value' => array(
				esc_html__( 'Font Awesome', 'zirto' ) => 'fontawesome',
				esc_html__( 'Open Iconic', 'zirto' ) => 'openiconic',
				esc_html__( 'Typicons', 'zirto' ) => 'typicons',
				esc_html__( 'Entypo', 'zirto' ) => 'entypo',
				esc_html__( 'Linecons', 'zirto' ) => 'linecons',
				esc_html__( 'Mono Social', 'zirto' ) => 'monosocial',
				esc_html__( 'Elegant', 'zirto' ) => 'elegant',
				esc_html__( 'Etline', 'zirto' ) => 'etline',
			),
			'param_name' => 'type',
			'description' => esc_html__( 'Select icon library.', 'zirto' ),
			'dependency' => array(
				'element' => 'use_image',
				'is_empty' => true,
			),
		),

		
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'fontawesome',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),		
		),
		

		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_openiconic',
			'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'openiconic',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_typicons',
			'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'typicons',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_entypo',
			'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_linecons',
			'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'linecons',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_monosocial',
			'value' => 'vc-mono vc-mono-fivehundredpx', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'monosocial',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'monosocial',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title", "zirto"),
			"param_name" => "title",
			"description" => esc_html__("Add title for the icon box.", "zirto"),
			"admin_label" => true,
		),
		
		array(
			"type" => "textarea_html",
			"heading" => esc_html__("Content", "zirto"),
			"param_name" => "content",
			"description" => esc_html__("Add your content.", "zirto"),
		),

      ),
   ) );
}
class WPBakeryShortCode_Icon_Box extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Latest Portfolio
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_portfolio_integrateWithVC' );
function zirto_portfolio_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Zirto Portfolio", "zirto" ),
      "base" => "portfolio",
	  "category" => "Zirto",
      "params" => array(
	  
        array(
            "type" => "textfield",
            "heading" => esc_html__("Post Count", "zirto"),
            "param_name" => "posts",
            "description" => esc_html__("Add Post Count for example:8", "zirto")
        ),
		
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Category", "zirto"),
            "param_name" => "categories",
            "description" => esc_html__("Add category slug and seperate with comma or use all", "zirto")
        ),		

		array(
			'type' => 'checkbox',
			'param_name' => 'filter',
			'heading' => esc_html__( 'Activate Category Filter?', 'zirto' ),
			'description' => esc_html__( 'You want to use filter with categories?', 'zirto' ),
			'value' => array( esc_html__( 'Yes', 'zirto' ) => 'yes' ),
		),	

        array(
            "type" => "textfield",
            "heading" => esc_html__("All Text", "zirto"),
            "param_name" => "all_text",
            "description" => esc_html__("Translate All button", "zirto")
        ),
		
      ),
   ) );
}
class WPBakeryShortCode_Portfolio extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Team Box
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_team_box_integrateWithVC' );
function zirto_team_box_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Zirto Team Box", "zirto" ),
      "base" => "team_box",
	  "category" => "Zirto",
      "params" => array( 
	  
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Member Image', 'zirto' ),
			'param_name' => 'image_url',
			'description' => esc_html__( 'Add Member Image', 'zirto' ),
		),	
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Name", "zirto"),
			"param_name" => "name",
			"description" => esc_html__("Add member name.", "zirto"),
			"admin_label" => true,
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Job", "zirto"),
			"param_name" => "position",
			"description" => esc_html__("Add member position.", "zirto"),
		),

		array(
			"type" => "textarea",
			"heading" => esc_html__("About Member", "zirto"),
			"param_name" => "contentm",
			"description" => esc_html__("Add content about the member.", "zirto"),
		),
	  
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Social', 'zirto' ),
			'param_name' => 'social',
			'value' => urlencode( json_encode( array(
				array(
					'title' => esc_html__( 'facebook', 'zirto' )
				),
			) ) ),
			'group' => 'Social',
			'params' => array(
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'URL (Link)', 'zirto' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Add a url for social box.', 'zirto' ),
				),	
				
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'zirto' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-info-circle',
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'iconsPerPage' => 200, // default 100, how many icons per/page to display
					),
					'description' => esc_html__( 'Select icon from library.', 'zirto' ),
					'admin_label' => true,
				),
			
			)
		),
		
      ),
   ) );
}
class WPBakeryShortCode_Team_Box extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Campaign Box
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_campaign_box_vc' );
function zirto_campaign_box_vc() {
   vc_map( array(
      "name" => esc_html__( 'Zirto Campaign Box', 'zirto' ),
      "base" => "campaign_box",
	  "category" => "Zirto",
      "params" => array(
		
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Campaign Image', 'zirto' ),
			'param_name' => 'image_url',
			'description' => esc_html__( 'Add Campaign Image', 'zirto' ),
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Campaign Title", "zirto"),
			"param_name" => "title",
			"description" => esc_html__("Add one of the available name of the campaign(Total Donations > Campaign)", "zirto"),
			'admin_label' => true,
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Campaign Id", "zirto"),
			"param_name" => "campaign_id",
			"description" => esc_html__("Add one of the available id of the campaign(Total Donations > Campaign)", "zirto"),
		),
		
		array(
			"type" => "textarea_html",
			"heading" => esc_html__("Content", "zirto"),
			"param_name" => "content",
			"description" => esc_html__("Text area with default WordPress WYSIWYG Editor", "zirto"),
		),
		
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),	
			"group"  => "Box Settings",
			'dependency' => array(
				'element' => 'type',
				'value' => 'type-1',
			),
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Box Title", "zirto"),
			"param_name" => "box_title",
			"description" => esc_html__("Add box title.", "zirto"),
            'group' => esc_html__( 'Box Settings', 'zirto' ),	
			'dependency' => array(
				'element' => 'type',
				'value' => 'type-1',
			),
		),
		
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Color", "zirto"),
			"param_name" => "titlecolor",
			"description" => esc_html__("Set title font color.", "zirto"),
            'group' => esc_html__( 'Box Settings', 'zirto' ),
			'dependency' => array(
				'element' => 'type',
				'value' => 'type-1',
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Box Type', 'zirto' ),
			'param_name' => 'type',
			'value' => array(
				esc_html__( 'Select Type', 'zirto' ) => 'select-type',
				esc_html__( 'Type 1', 'zirto' ) => 'type-1',
				esc_html__( 'Type 2', 'zirto' ) => 'type-2',
			),
			'description' => esc_html__( 'Select one of the type for the campaign box.', 'zirto' ),
			'group' => 'Type',
		),	
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Text Total", "zirto"),
			"param_name" => "translate_total",
			"description" => esc_html__("Translate the word for your own language.", "zirto"),
			'dependency' => array(
				'element' => 'type',
				'value' => array('type-2','select-type'),
			),
			'group' => esc_html__('Translation','zirto'),
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Text Target", "zirto"),
			"param_name" => "translate_target",
			"description" => esc_html__("Translate the word for your own language.", "zirto"),
			'dependency' => array(
				'element' => 'type',
				'value' => array('type-2','select-type'),
			),
			'group' => esc_html__('Translation','zirto'),
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Text Donate Button", "zirto"),
			"param_name" => "translate_donate",
			"description" => esc_html__("Translate the word for your own language.", "zirto"),
			'dependency' => array(
				'element' => 'type',
				'value' => array('type-2','select-type'),
			),
			'group' => esc_html__('Translation','zirto'),
		),
		
      ),
   ) );
}
class WPBakeryShortCode_Campaign_Box extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Latest Events
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_latest_events_integrateWithVC' );
function zirto_latest_events_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Zirto Latest Events", "zirto" ),
      "base" => "events",
	  "category" => "Zirto",
      "params" => array(
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Post Count", "zirto"),
            "param_name" => "posts",
            "description" => esc_html__("Add Post Count for example:8", "zirto")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Excerpt Size", "zirto"),
            "param_name" => "excerpt_size",
            "description" => esc_html__("Add Post Excerpt Size for example : 15", "zirto")
        ),
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Category", "zirto"),
            "param_name" => "categories",
            "description" => esc_html__("Add a post category or write all", "zirto")
        ),
		
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),	
			"group"  => esc_html__("Box Settings","zirto"),
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Box Title", "zirto"),
			"param_name" => "widget_title",
			"description" => esc_html__("Add box title.", "zirto"),
			"group"  => "Box Settings",
		),

		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Color", "zirto"),
			"param_name" => "titlecolor",
			"description" => esc_html__("Set widget title font color.", "zirto"),
            'group' => esc_html__( 'Box Settings', 'zirto' ),	
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Date Type', 'zirto' ),
			'param_name' => 'date_type',
			'value' => array(
				esc_html__( 'Select Type', 'zirto' ) => 'select-type',
				esc_html__( 'Start Date', 'zirto' ) => 'startdate',
				esc_html__( 'End Date', 'zirto' ) => 'enddate',
			),
			'description' => esc_html__( 'Select one of the both Start date and End date to be displaied.', 'zirto' ),
		),	
		
      ),
   ) );
}
class WPBakeryShortCode_Latest_Events extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Latest Blog
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_blog_integrateWithVC' );
function zirto_blog_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Zirto Latest Blog", "zirto" ),
      "base" => "blog",
	  "category" => "Zirto",
      "params" => array(
		
        array(
            "type" => "textfield",
            "heading" => esc_html__("Post Count", "zirto"),
            "param_name" => "posts",
            "description" => esc_html__("Add Post Count for example:8", "zirto")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Excerpt Size", "zirto"),
            "param_name" => "excerpt_size",
            "description" => esc_html__("Add Post Excerpt Size for example : 15", "zirto")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Category", "zirto"),
            "param_name" => "categories",
            "description" => esc_html__("Add a post category or write all", "zirto")
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Order", "zirto"),
            "param_name" => "order",
            "description" => esc_html__("Designates the ascending or descending order.", "zirto"),
			'value' => array(
				esc_html__( 'Select Type', 'zirto' ) => 'select-type',
				esc_html__( 'DESC', 'zirto' ) => 'DESC',
				esc_html__( 'ASC', 'zirto' ) => 'ASC',						
			),	
        ),	
		
      ),
   ) );
}
class WPBakeryShortCode_Blog extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Button
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_btn_button_integrateWithVC' );
function zirto_btn_button_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Zirto Button", "zirto" ),
      "base" => "btn_button",
	  "category" => "Zirto",
      "params" => array( 

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Type', 'zirto' ),
			'param_name' => 'button_type',
			'value' => array(
				esc_html__( 'Select Type', 'zirto' ) => 'select-type',
				esc_html__( 'Default', 'zirto' ) => 'default',
				esc_html__( 'Modal(Popup)', 'zirto' ) => 'modal',						
			),		
			'description' => esc_html__( 'Select Button Type', 'zirto' ),
			'group' => 'Button',
		),
		
		//Button
		array(
			'type' => 'vc_link',
			'heading' => esc_html__( 'URL (Link)', 'zirto' ),
			'param_name' => 'link',
			'description' => esc_html__( 'Add Button for item', 'zirto' ),
			'dependency' => array(
				'element' => 'button_type',
				'value' => array( 'default','select-type' ),
			),
            'group'       => 'Button',
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", "zirto"),
			"param_name" => "buttonname",
			"description" => esc_html__("Add a text for button.for example 'mybutton'", "zirto"),
			'dependency' => array(
				'element' => 'button_type',
				'value' => 'modal',
			),
            'group'       => 'Button',
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Modal Id", "zirto"),
			"param_name" => "modal_id",
			"description" => esc_html__("Add a id for modal popup.for example 'mymodal1'.", "zirto"),
			'dependency' => array(
				'element' => 'button_type',
				'value' => 'modal',
			),
            'group'       => 'Button',
		),
		
		array(
			"type" => "textarea_html",
			"heading" => esc_html__("Modal content", "zirto"),
			"param_name" => "content",
			"description" => esc_html__("Add content for modal popup screen.", "zirto"),
			'dependency' => array(
				'element' => 'button_type',
				'value' => 'modal',
			),
            'group'       => 'Button',
		),
		array(
			'type' => 'checkbox',
			'param_name' => 'button_icon',
			'heading' => esc_html__( 'Add Icon?', 'zirto' ),
			'description' => esc_html__( 'You want to use icon on button?', 'zirto' ),
			'value' => array( esc_html__( 'Yes', 'zirto' ) => 'yes' ),
			'group' => 'Icon',
		),

		array(
			'type' => 'colorpicker',
			'param_name' => 'bgcolor',
			'heading' => esc_html__( 'Background Color', 'zirto' ),
			'description' => esc_html__( 'Set background color for act button', 'zirto' ),
			'group' => 'Color',
		),
		
		array(
			'type' => 'colorpicker',
			'param_name' => 'bordercolor',
			'heading' => esc_html__( 'Border Color', 'zirto' ),
			'description' => esc_html__( 'Set border color for act button', 'zirto' ),
			'group' => 'Color',
		),
		
		array(
			'type' => 'colorpicker',
			'param_name' => 'fontcolor',
			'heading' => esc_html__( 'Font Color', 'zirto' ),
			'description' => esc_html__( 'Set font color for act button', 'zirto' ),
			'group' => 'Color',
		),

		array(
			'type' => 'colorpicker',
			'param_name' => 'hoverbgcolor',
			'heading' => esc_html__( 'Background Color', 'zirto' ),
			'description' => esc_html__( 'Set hover background color for act button', 'zirto' ),
			'group' => 'Hover',
		),
		
		array(
			'type' => 'colorpicker',
			'param_name' => 'hoverbordercolor',
			'heading' => esc_html__( 'Border Color', 'zirto' ),
			'description' => esc_html__( 'Set Hover border color for act button', 'zirto' ),
			'group' => 'Hover',
		),
		
		array(
			'type' => 'colorpicker',
			'param_name' => 'hoverfontcolor',
			'heading' => esc_html__( 'Font Color', 'zirto' ),
			'description' => esc_html__( 'Set Hover font color for act button', 'zirto' ),
			'group' => 'Hover',
		),
		
		
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'button_icon',
				'value' => 'yes',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
			'group' => 'Icon',
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon Alignment', 'zirto' ),
			'param_name' => 'icon_alignment',
			'value' => array(
				esc_html__( 'Select', 'zirto' ) => 'select-type',
				esc_html__( 'Left', 'zirto' ) => 'left',
				esc_html__( 'Right', 'zirto' ) => 'right',						
			),
			'dependency' => array(
				'element' => 'button_icon',
				'value' => 'yes',
			),			
			'description' => esc_html__( 'Select icon alignment.', 'zirto' ),
			'group' => 'Icon',
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Alignment', 'zirto' ),
			'param_name' => 'btnalignment',
			'value' => array(
				esc_html__( 'Select', 'zirto' ) => 'select-type',
				esc_html__( 'Left', 'zirto' ) => 'left',
				esc_html__( 'Center', 'zirto' ) => 'center',
				esc_html__( 'Right', 'zirto' ) => 'right',						
			),		
			'description' => esc_html__( 'Select button alignment.', 'zirto' ),
			'group' => 'Alignment',
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Size', 'zirto' ),
			'param_name' => 'button_size',
			'value' => array(
				esc_html__( 'Select Size', 'zirto' ) => 'select-size',
				esc_html__( 'Default', 'zirto' ) => '1',
				esc_html__( 'Big', 'zirto' ) => '2',	
			),
			'description' => esc_html__( 'Select predefined list design ', 'zirto' ),
			'group' => 'Size',
		),
		
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'zirto' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'zirto' ),
        ),
		
      ),
   ) );
}
class WPBakeryShortCode_btn_button extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Action Box
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_action_box_integrateWithVC' );
function zirto_action_box_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Zirto Action Box", "zirto" ),
      "base" => "action_box",
	  "category" => "Zirto",
      "params" => array(
	  
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "zirto"),
            "param_name" => "title",
            "description" => esc_html__("Add a title for action box.", "zirto"),
			"admin_label" => true,
        ),
		
        array(
            "type" => "textarea_html",
            "heading" => esc_html__("Content", "zirto"),
            "param_name" => "content",
            "description" => esc_html__("Add content for action box", "zirto")
        ),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon library', 'zirto' ),
			'value' => array(
				esc_html__( 'Font Awesome', 'zirto' ) => 'fontawesome',
				esc_html__( 'Open Iconic', 'zirto' ) => 'openiconic',
				esc_html__( 'Typicons', 'zirto' ) => 'typicons',
				esc_html__( 'Entypo', 'zirto' ) => 'entypo',
				esc_html__( 'Linecons', 'zirto' ) => 'linecons',
				esc_html__( 'Mono Social', 'zirto' ) => 'monosocial',
				esc_html__( 'Elegant', 'zirto' ) => 'elegant',
			),
			'param_name' => 'type',
			'description' => esc_html__( 'Select icon library.', 'zirto' ),
		),
			
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'fontawesome',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),		
		),
		

		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_openiconic',
			'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'openiconic',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_typicons',
			'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'typicons',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_entypo',
			'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_linecons',
			'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'linecons',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_monosocial',
			'value' => 'vc-mono vc-mono-fivehundredpx', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'monosocial',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'monosocial',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Background Color", "zirto"),
			"param_name" => "bgcolor",
			"description" => esc_html__("Set background color for the box.", "zirto"),
			"group" => 'Color',
		),
		
      ),
   ) );
}
class WPBakeryShortCode_Action_Box extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Counter Box
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_counter_box_integrateWithVC' );
function zirto_counter_box_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Zirto Counter Box", "zirto" ),
      "base" => "counter_box",
	  "category" => "Zirto",
      "params" => array(
	  
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "zirto"),
            "param_name" => "title",
            "description" => esc_html__("Add a title for the counter box.", "zirto"),
			"admin_label" => true,
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Count", "zirto"),
            "param_name" => "count",
            "description" => esc_html__("Set a number for the counter box.", "zirto"),
			"admin_label" => true,
        ),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon library', 'zirto' ),
			'value' => array(
				esc_html__( 'Font Awesome', 'zirto' ) => 'fontawesome',
				esc_html__( 'Open Iconic', 'zirto' ) => 'openiconic',
				esc_html__( 'Typicons', 'zirto' ) => 'typicons',
				esc_html__( 'Entypo', 'zirto' ) => 'entypo',
				esc_html__( 'Linecons', 'zirto' ) => 'linecons',
				esc_html__( 'Mono Social', 'zirto' ) => 'monosocial',
				esc_html__( 'Elegant', 'zirto' ) => 'elegant',
			),
			'param_name' => 'type',
			'description' => esc_html__( 'Select icon library.', 'zirto' ),
		),
			
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'fontawesome',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),		
		),
		

		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_openiconic',
			'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'openiconic',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_typicons',
			'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'typicons',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_entypo',
			'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_linecons',
			'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'linecons',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'zirto' ),
			'param_name' => 'icon_monosocial',
			'value' => 'vc-mono vc-mono-fivehundredpx', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'type' => 'monosocial',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'monosocial',
			),
			'description' => esc_html__( 'Select icon from library.', 'zirto' ),
		),
		
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Background Color", "zirto"),
			"param_name" => "bgcolor",
			"description" => esc_html__("Set background color for the box.", "zirto"),
			"group" => 'Color',
		),
		
      ),
   ) );
}
class WPBakeryShortCode_Counter_Box extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Zirto Google Map
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'zirto_map_integrateWithVC' );
function zirto_map_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Zirto Google Map", "zirto" ),
      "base" => "map_container",
	  "category" => "Zirto",
      "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Latitude", "zirto"),
            "param_name" => "latitude",
            "description" => esc_html__("Add latitude for google map", "zirto")
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Longitude', 'zirto' ),
            'param_name' => 'longitude',
            "description" => esc_html__("Add longitude for google map", "zirto"),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Zoom', 'zirto' ),
            'param_name' => 'zoom',
            "description" => esc_html__("Adjust zoom for google map", "zirto"),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Height', 'zirto' ),
            'param_name' => 'height',
            "description" => esc_html__("Adjust height for google map", "zirto"),
        ),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Map Icon', 'zirto' ),
			'param_name' => 'mapimage',
			'description' => esc_html__( 'Add a image for map marker', 'zirto' ),
		),
		
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'zirto' ),
            'param_name' => 'title',
            "description" => esc_html__("Add title for the contact details.", "zirto"),
			'group' => 'Contact Details',

        ),
		
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Subtitle', 'zirto' ),
            'param_name' => 'subtitle',
            "description" => esc_html__("Add subtitle for the contact details.", "zirto"),
			'group' => 'Contact Details',
        ),
		
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Contact Details', 'zirto' ),
			'param_name' => 'values',
			'group' => 'Contact Details',
			'value' => urlencode( json_encode( array(
				array(
					'title' => esc_html__( 'myadress', 'zirto' )
				),
			) ) ),			
			'params' => array(
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'zirto' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-info-circle',
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'iconsPerPage' => 200, // default 100, how many icons per/page to display
					),
					'description' => esc_html__( 'Select icon from library.', 'zirto' ),		
				),
				
				array(
					"type" => "textfield",
					"heading" => esc_html__("Item Title", "zirto"),
					"param_name" => "itemtitle",
					"description" => esc_html__("Add title.", "zirto"),
					"admin_label" => true,
				),
		
				array(
					"type" => "textarea",
					"heading" => esc_html__("Content", "zirto"),
					"param_name" => "itemdetail",
					"description" => esc_html__("Add detail for the contact details.", "zirto"),
				),
			
			)
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Open Map", "zirto"),
			"param_name" => "openmap",
			"description" => esc_html__("Translate open map text.", "zirto"),
			"group" => 'Translation',
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Close Map", "zirto"),
			"param_name" => "closemap",
			"description" => esc_html__("Translate close map text.", "zirto"),
			"group" => 'Translation',
		),
		
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'zirto' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'zirto' ),
        ),


      ),
   ) );
}
class WPBakeryShortCode_Map extends WPBakeryShortCode {
}