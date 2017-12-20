<?php
/**
 * functions.php
 * @package WordPress
 * @subpackage Zirto
 * @since Zirto 1.1
 * 
 */
 
/*************************************************
## Admin style and scripts  
*************************************************/ 

function zirto_admin_styles() {
     wp_enqueue_style('zirto_klbtheme',  get_template_directory_uri() . '/assets/theme/css/admin/klbtheme.css');
	 wp_enqueue_script('zirto_init', 	  get_template_directory_uri() . '/assets/theme/js/init.js', array('jquery','media-upload','thickbox'));
}
add_action('admin_enqueue_scripts', 'zirto_admin_styles');

 /*************************************************
## Post Type Support
*************************************************/

function zirto_post_formats() {
	add_post_type_support( 'portfolio', 'post-formats' );
}
add_action( 'init', 'zirto_post_formats' );


 /*************************************************
## Zirto Fonts
*************************************************/

function zirto_fonts_url() {
        $fonts_url = '';
 
		$opensans = _x( 'on', 'Open+Sans font: on or off', 'zirto' );	
		$raleway = _x( 'on', 'Raleway font: on or off', 'zirto' );
		$condensed = _x( 'on', 'Condensed font: on or off', 'zirto' );


		if ( 'off' !== $opensans ) {
		$font_families = array();
		 
		if ( 'off' !== $opensans ) {
		$font_families[] = 'Indie+Flower';
		}

		if ( 'off' !== $raleway ) {
		$font_families[] = 'Muli';
		}
		
		if ( 'off' !== $condensed ) {
		$font_families[] = 'Open+Sans+Condensed:300,700';
		}
		
		$query_args = array( 
		'family' => rawurldecode( implode( '|', $font_families ) ), 
		'subset' => rawurldecode( 'latin,latin-ext' ), 
		); 
		 
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}
 
return esc_url_raw( $fonts_url );
}

/*************************************************
## Styles and Scripts
*************************************************/ 
define('ZIRTO_INDEX_THEME',   get_template_directory_uri()  . '/assets/theme');
define('ZIRTO_INDEX_EXTERNAL',  get_template_directory_uri()  . '/assets/external');

function zirto_scripts() {
	
     if ( is_admin_bar_showing() ) {
		wp_enqueue_style( 'zirto_klbtheme',	ZIRTO_INDEX_THEME . '/css/admin/klbtheme.css', false, '1.0');    
     }	
	 
     if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); 
     wp_enqueue_style( 'bootstrap',    		ZIRTO_INDEX_EXTERNAL  . '/bootstrap/css/bootstrap.min.css', false, '1.0');
     wp_register_style( 'remodal',          ZIRTO_INDEX_EXTERNAL  . '/remodal/remodal.css', false, '1.0');
     wp_register_style( 'remodal-theme',	ZIRTO_INDEX_EXTERNAL  . '/remodal/remodal-default-theme.css', false, '1.0');
     wp_enqueue_style( 'owl-carousel', 		ZIRTO_INDEX_EXTERNAL  . '/owl-carousel/css/owl.carousel.css', false, '1.0');	
     wp_enqueue_style( 'owl-theme', 		ZIRTO_INDEX_EXTERNAL  . '/owl-carousel/css/owl.theme.css', false, '1.0');	
     wp_enqueue_style( 'cubeportfolio', 	ZIRTO_INDEX_EXTERNAL  . '/cubeportfolio/cubeportfolio.min.css', false, '1.0');	
     wp_enqueue_style( 'font-awesoma',    	ZIRTO_INDEX_EXTERNAL  . '/font-awesome-4.7.0/css/font-awesome.min.css', false, '1.0');
     wp_enqueue_style( 'zirto_tribe',    	ZIRTO_INDEX_THEME     . '/css/tribe-events.css', false, '1.0');
     wp_enqueue_style( 'zirto_blog',    	ZIRTO_INDEX_THEME     . '/css/blog-style.css', false, '1.0');
     wp_enqueue_style( 'zirto_stylem', 		ZIRTO_INDEX_THEME     . '/css/style.css', false, '1.0');
     wp_enqueue_style( 'zirto_font',        zirto_fonts_url(), array(), null );
	 wp_enqueue_style( 'zirto_style',       get_stylesheet_uri() );   
	 
	 $mapkey = ot_get_option('zirto_mapapi');
	
     wp_enqueue_script( 'waypoints', 	 	     ZIRTO_INDEX_EXTERNAL . '/counter-up/waypoints.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'counterup',             ZIRTO_INDEX_EXTERNAL . '/counter-up/jquery.counterup.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'cubeportfolio',     	 ZIRTO_INDEX_EXTERNAL . '/cubeportfolio/jquery.cubeportfolio.min.js', array('jquery'), '1.0', true);
     wp_register_script( 'particles',   	 	 ZIRTO_INDEX_EXTERNAL . '/particles/particles.min.js', array('jquery'), '1.0', true);
     wp_register_script( 'particleapp',   	 	 ZIRTO_INDEX_EXTERNAL . '/particles/particular-app.js', array('jquery'), '1.0', true);
	 wp_register_script( 'remodal',              ZIRTO_INDEX_EXTERNAL . '/remodal/remodal.min.js', array('jquery'), '1.0', true);
	 wp_register_script( 'googlemap',            'https://maps.googleapis.com/maps/api/js?key='. $mapkey .'', array('jquery'), '1.0', true);
     wp_register_script( 'owl-carousel',    	 ZIRTO_INDEX_EXTERNAL . '/owl-carousel/js/owl.carousel.js', array('jquery'), '1.0', true);
     wp_register_script( 'zirto_carousel',  	 ZIRTO_INDEX_EXTERNAL . '/owl-carousel/js/carousel.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'progressbar',  	     ZIRTO_INDEX_EXTERNAL . '/progressbar.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'bootstrap', 			 ZIRTO_INDEX_EXTERNAL . '/bootstrap/js/bootstrap.min.js', array('jquery'), '1.0', true);
	 wp_enqueue_script( 'countTo',               ZIRTO_INDEX_EXTERNAL . '/countto/jquery.countTo.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'zirto_theme',  		 ZIRTO_INDEX_THEME    . '/js/theme.js', array('jquery'), '1.0', true);

}
add_action( 'wp_enqueue_scripts', 'zirto_scripts' );

/*************************************************
## Zirto Theme options
*************************************************/

	require_once get_template_directory() . '/includes/aq_resizer.php'; 
	require_once get_template_directory() . '/includes/metaboxes.php';
	require_once get_template_directory() . '/includes/style.php';
   	add_filter( 'ot_show_pages', '__return_false' );
	add_filter( 'ot_show_new_layout', '__return_false' );
	require_once get_template_directory() . '/includes/theme-options.php';
	if(function_exists('vc_set_as_theme')) { 
	   require_once get_template_directory() . '/includes/js_composer/shortcodes.php';
	}

	
/*************************************************
## Theme Setup
*************************************************/ 

if ( ! isset( $content_width ) ) $content_width = 960;

function zirto_theme_setup() {
	
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array('gallery', 'audio', 'video')); 
}
add_action( 'after_setup_theme', 'zirto_theme_setup' );

/*************************************************
## zirto Register Menu 
*************************************************/

function zirto_register_menus() {
	register_nav_menus( array( 'main-menu' => esc_html__('Primary Navigation Menu','zirto')) );     
}
add_action('init', 'zirto_register_menus');


/*************************************************
## zirto Menu
*************************************************/ 

class zirto_description_walker extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'',
			( $display_depth % 2  ? 'dropdown' : 'menu-even' ),
			( $display_depth >=2 ? 'dropdown' : '' ),
			'menu-depth-' . $display_depth
			);
		$class_names = implode( ' ', $classes );
	  
		// build html
		$output .= "\n" . $indent . '<ul class="dropdown-menu' . $class_names . '" >' . "\n";
	}

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }


      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           $icon_class = $classes[0];
		   $classes = array_slice($classes,1);

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

      
           $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
           $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
           $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
          
           if($object->object == 'page'){
                $varpost = get_post($object->object_id);                
                $separate_page = get_post_meta($object->object_id, "klb_separate_page", true);
                $disable_menu = get_post_meta($object->object_id, "klb_disable_section_from_menu", true);
				$current_page_id = get_option('page_on_front');

                if ( ( $disable_menu != true ) && ( $varpost->ID != $current_page_id ) ) {

                	$output .= $indent . '<li ' . $value . $class_names .'>';

                	if ( $separate_page == true ) {
						if ( $args->has_children ) {
							$attributes .= ! empty( $object->url ) ? ' href="'   . esc_url( $object->url ) .'" class="dropdown-toggle" data-toggle="dropdown"' : '';
						} else{
							$attributes .= ! empty( $object->url ) ? ' href="'   . esc_url( $object->url ) .'"' : '';
						}
	                } else {
	                	if (is_front_page()) {
							if ( $args->has_children ) {
								$attributes .= ' class="dropdown-toggle page-scroll" href="#'. $varpost->post_name . '" ';
							} else {
								$attributes .= ' class="internal" href="#'. $varpost->post_name . '" ';
							}
	                 	} else {
							if ( $args->has_children ) {
								$attributes .= ' class="dropdown-toggle" href="' .  ''.esc_url(home_url('/')).'#' . $varpost->post_name . '" ';
							} else{
								$attributes .= ' href="' .  ''.esc_url(home_url('/')).'#' . $varpost->post_name . '" ';
							}
                        }
					}		

	                $object_output = $args->before;
		            $object_output .= '<a'. $attributes .' >';
		            $object_output .= $args->link_before .  apply_filters( 'the_title', $object->title, $object->ID ) . '';
		            $object_output .= $args->link_after;
		            $object_output .= '</a>';
		            $object_output .= $args->after;    

		             $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );           	              	
                }
                                         
           }else{

           		$output .= $indent . '<li ' . $value . $class_names .'>';
				if ( $args->has_children ) {
					$attributes .= ! empty( $object->url ) ? ' href="'   . esc_url( $object->url ) .'" class="dropdown-toggle" data-toggle="dropdown"' : '';
				} else {
					$attributes .= ! empty( $object->url ) ? ' href="' . esc_url( $object->url ) .'"' : '';
				}

	            $object_output = $args->before;
	            $object_output .= '<a'.$attributes.'>';
	            $object_output .= $args->link_before .  apply_filters( 'the_title', $object->title, $object->ID ) . '';
	            $object_output .= $args->link_after;
	            $object_output .= '</a>';
	            $object_output .= $args->after;

	             $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
	        }           
      }
}

/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/ 

require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'zirto_register_required_plugins' );

function zirto_register_required_plugins() {
	
	$plugins = array(
		
        array(
            'name'                  => esc_html__('Meta Box','zirto'),
            'slug'                  => 'meta-box',
        ),

        array(
            'name'                  => esc_html__('Portfolio Post Type','zirto'),
            'slug'                  => 'portfolio-post-type',
        ),

        array(
            'name'                  => esc_html__('Contact Form 7','zirto'),
            'slug'                  => 'contact-form-7',
        ),

        array(
            'name'                  => esc_html__('Theme Options','zirto'),
            'slug'                  => 'option-tree',
        ),
		
        array(
            'name'                  => 'The Events Calendar',
            'slug'                  => 'the-events-calendar',
        ),

        array(
            'name'                  => esc_html__('Visual Composer','zirto'),
            'slug'                  => 'js_composer',
            'source'                => get_template_directory() . '/plugins/js-composer.zip',
            'required'              => false,
            'version'               => '5.0.1',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),

        array(
            'name'                  => esc_html__('Klb Shortcode','zirto'),
            'slug'                  => 'klb-shortcode',
            'source'                => get_template_directory() . '/plugins/klb-shortcode.zip',
            'required'              => false,
            'version'               => '1.0',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),
		
        array(
            'name'                  => esc_html__('Revolution Slider','zirto'),
            'slug'                  => 'revslider',
            'source'                => get_template_directory() . '/plugins/revslider.zip',
            'required'              => false,
            'version'               => '5.3.1.5',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),
		
        array(
            'name'                  => esc_html__('Total Donations','zirto'),
            'slug'                  => 'totaldonations',
            'source'                => get_template_directory() . '/plugins/totaldonations.zip',
            'required'              => false,
            'version'               => '2.0.5',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),
		
        array(
            'name'                  => esc_html__('Envato Market Master','zirto'),
            'slug'                  => 'wp-envato-market-master',
            'source'                => get_template_directory() . '/plugins/wp-envato-market-master.zip',
            'required'              => true,
            'version'               => '1.0',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),

        array(
            'name'                  => esc_html__('Demo Installation','zirto'),
            'slug'                  => 'easy_installer',
            'source'                => get_template_directory() . '/plugins/easy_installer.zip',
            'required'              => false,
            'version'               => '1.2',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),

	);

	$config = array(
		'id'           => 'zirto',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

/*************************************************
## Widgets
*************************************************/ 

function zirto_widgets_init() {
	register_sidebar( array(
	  'name' => esc_html__( 'Blog Sidebar', 'zirto' ),
	  'id' => 'blog-sidebar',
	  'description'   => esc_html__( 'These are widgets for the Blog page.','zirto' ),
	  'before_widget' => '<div class="blog-item">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h1>',
	  'after_title'   => '</h1>'
	) );
}
add_action( 'widgets_init', 'zirto_widgets_init' );

/*************************************************
## Excerpt More
*************************************************/ 

function zirto_excerpt_more($more) {
  global $post;
  return '<div class="text-left"><a class="btnklb btn btn-black" href="'. esc_url(get_permalink($post->ID)) . '" >' . '' . esc_html__('READ MORE', 'zirto') . '</a></div>';
  }
 add_filter('excerpt_more', 'zirto_excerpt_more');

/*************************************************
## Events Calendar Map Filter
*************************************************/ 
 
function zirto_google_api_key() {
    $mapkey = ot_get_option('zirto_mapapi');
    return '//maps.googleapis.com/maps/api/js?key='. $mapkey .'';
}
add_filter('tribe_events_google_maps_api','zirto_google_api_key');

/*************************************************
## Events Calendar Map Zoom Filter
*************************************************/ 
function zirto_venue_map_zoom( $zoom ) {
	if( tribe_is_event() && is_single() ) {
		$zoom = 14;
	}
	return	$zoom;
}
add_filter( 'tribe_events_single_map_zoom_level', 'zirto_venue_map_zoom' );

/*************************************************
## Word Limiter
*************************************************/ 
function zirto_limit_words($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}

/*************************************************
## Pagination Function
*************************************************/

function zirto_pagination($pages = '', $range = 4) {
	$showitems = ($range * 2)+1;
	
	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}
	 if(1 != $pages){
	    echo '<nav class="pagination-wrap"><ul class="pagination"><li>'.get_previous_posts_link( esc_html__('Prev','zirto') ).'</li>';
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='active'><a class'button button-small' href='".get_pagenum_link(1)."'>&laquo; " . esc_html__('First', 'zirto') . "</a></li>";
		if($paged > 1 && $showitems < $pages) echo "<li><a class=\"page-numbers \" href='".get_pagenum_link($paged - 1)."'>&lsaquo; </a></li>";
		
		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<li class='active'><a href='".esc_url(get_pagenum_link($i))."' >".$i."</a></li>":"<li><a href='".esc_url(get_pagenum_link($i))."' >".$i."</a></li>";
			}
		}
	
		if ($paged < $pages && $showitems < $pages) echo "<li><a class=\"active\" href=\"".esc_url(get_pagenum_link($paged + 1))."\">" . esc_html__('Next', 'zirto') . " &rsaquo;</a></li>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a class=\"active\" href='".esc_url(get_pagenum_link($pages))."'>" . esc_html__('Last', 'zirto') . " &raquo;</a></li>";
	    echo '<li>'.get_next_posts_link( esc_html__('Next','zirto') ).'</li></ul></nav>';

		}
}


/*************************************************
## Zirto Comment
*************************************************/

if ( ! function_exists( 'zirto_comment' ) ) :
 function zirto_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
   case 'pingback' :
   case 'trackback' :
  ?>

   <article class="post pingback">
   <p><?php esc_html_e( 'Pingback:', 'zirto' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'zirto' ), ' ' ); ?></p>
  <?php
    break;
   default :
  ?>
		 <li class="comment-area">
			<div class="comment-list-comment">
				<div class="comment-list-comment-image">
					<img src="<?php echo get_avatar_url( $comment, 80 ); ?>);">
				</div>
				<div class="comment-right">
					<div class="comment-list-header">
						<h4><?php comment_author(); ?></h4>
						<span><?php comment_date(); ?> <?php esc_html_e('at','zirto'); ?> <?php comment_time(); ?></span>
					</div>
					<div class="comment-list-comment-text">
						<div class="klb-post"><?php comment_text(); ?></div>
					</div>
				</div>
				<span class="media-reply pull-right"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'zirto' ); ?></em>
			<?php endif; ?> 
			<article class="clearfix" id="comment-<?php comment_ID(); ?>"></article>  
			</div>
		</li>
  <?php
    break;
  endswitch;
 }
endif;


/*************************************************
## Zirto Comment Placeholder
*************************************************/

add_filter( 'comment_form_default_fields', 'zirto_comment_placeholders' );
function zirto_comment_placeholders( $fields ){
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'.esc_html__('NAME','zirto').'"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input',
        '<input placeholder="'.esc_html__('EMAIL','zirto').'"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input',
        '<input placeholder="'.esc_html__('WEBSITE','zirto').'"',
        $fields['url']
    );
    return $fields;
}


add_filter( 'comment_form_defaults', 'zirto_textarea_placeholder' );
function zirto_textarea_placeholder( $fields ){
  
        $fields['comment_field'] = str_replace(
            '<textarea',
            '<textarea placeholder="'.esc_html__('COMMENT','zirto').'"',
            $fields['comment_field']
        );
   
 
    return $fields;
}

/*************************************************
## Zirto Sanitize Data
*************************************************/

function zirto_sanitize_data( $string ) {

		$zirtodata = wp_kses( $string, array(
				'a' => array(
					'href' => array(),
					'title' => array(),
					'class' => array(),
					'target' => array('_blank', '_top'),
				),
				'br'        => array(),
				'em'        => array(),
				'strong'    => array(),
		) );
	
	return $zirtodata;
}