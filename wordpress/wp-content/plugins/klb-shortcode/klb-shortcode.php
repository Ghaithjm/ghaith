<?php 
    /*
    Plugin Name: Klb Shortcode
    Plugin URI: http://themeforest.net/user/klbtheme/portfolio
    Description: Plugin for displaying theme shortcodes.
    Author: KlbTheme
    Version: 1.0
    Author URI: http://themeforest.net/user/klbtheme/portfolio
    */

/*-----------------------------------------------------------------------------------*/
/*	Zirto Particular Image
/*-----------------------------------------------------------------------------------*/

function zirto_particular_image( $atts, $content = null ) {
    extract( shortcode_atts(array(  
    'image_url'    => 'share',
    'dotcolor'     => '#fff',
    'linecolor'    => '#fff',
    'number'       => '80',
    'hovertype'    => '',
    ), $atts) );	

    $output = '';

if(!$hovertype == 'false'){
   $hover = 'false';
} else {
   $hover = 'true';
}
			wp_enqueue_script('particles');
			wp_enqueue_script('particleapp');
			wp_localize_script('particleapp', 'particle',			
			    array( 
				 'dotcolor' => $dotcolor,
                 'linecolor' => $linecolor,
				 'number' => $number,
                 'hovertype' => $hovertype,
                 'hover'     => $hover,
				));

                $image_urls = wp_get_attachment_url( $image_url, 'full' );
				$output .= '<div class="full-height">';
				$output .= '<div id="particles-js" style="background-image:url('.esc_url($image_urls).');">';
				$output .= '<div class="klb-centered">';
				$output .= '<div class="text-big">'.do_shortcode($content).'</span></div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
  		        return $output;

}

add_shortcode('particular_image', 'zirto_particular_image');

/*-----------------------------------------------------------------------------------*/
/*  Zirto Campaign Form
/*-----------------------------------------------------------------------------------*/

function zirto_campaign_form( $atts, $content = null ) {	
    extract( shortcode_atts(array(       
        "title"       => '',	
        "campaign_id"        => '',
		"image_url"    => '',		
    ), $atts) );

	$output = '';
	
	if($campaign_id){
	$output .= do_shortcode('[totaldonations form_id="'.$campaign_id.'"]');
    } else {
	$output .= do_shortcode('[totaldonations]');
    }
	
   return $output;

}

add_shortcode('campaign_form', 'zirto_campaign_form');


/*-----------------------------------------------------------------------------------*/
/*	Zirto Fundraise Bar
/*-----------------------------------------------------------------------------------*/

function zirto_fundraise_bar( $atts, $content = null ) {
    extract( shortcode_atts(array(       
        "title"            => '',
        "image_url"        => '',
		"campaign_id"      => '',
		"desc"             => '',
		"link"             => '',
		"duedate"          => '',
    ), $atts) );
	
            $output = '';
			
		    $image_urls = wp_get_attachment_url( $image_url, 'full' );
			
			ob_start();
			 $target = migla_get_target($title); //toplanan
			 $total = migla_get_total_amount($title);
			 
             $totalstr = str_replace(array('$',',','.'),'',$total);
             $targetstr = str_replace(array('$',',','.'),'',$target);

			 $c = $targetstr / 100; 

             $percent = floor($totalstr / $c); // yuvarlama


			 
			$christmas = strtotime($duedate);
			$now = time();
			$timeleft = $christmas-$now;
			$daysleft = round((($timeleft/24)/60)/60);

			$donater = do_shortcode('[totaldonations-text-fields campaign="'.$title.'" text="#backers#"]');
			$output .= '<div id="fundraiser-bar" class="bottom-bar-responsive bg-brand-secondary-darkest">';
			$output .= '<div class="col-md-6 fundraiser-progress-bar animated-longer-delay-3 fadeIn">';
			$output .= '<div class="vert-centered-wrapper-120px">';
			$output .= '<div class="vert-centered">';
			$output .= '<div class="progress">';
			$output .= '<div class="progress-bar progress-bar-tertiary" role="progressbar"  style="width:'.$percent.'%;">';
			$output .= '<h3><span class="responsive-hide">'.$title.'</span> &nbsp;<b>'.do_shortcode('[totaldonations-text-fields campaign="'.$title.'" text="#total#"]').'</b></h3>';
			$output .= '</div>';
			$output .= '<h3 class="goal"><span class="responsive-hide">Goal</span> <b>'.do_shortcode('[totaldonations-text-fields campaign="'.$title.'" text="#target#"]').'</b></h3>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="col-md-4 col-sm-9 col-xs-12 fundraiser-stats">';
			$output .= '<div class="col-md-4 col-sm-4  col-xs-4 animated-longer-delay-7 fadeIn">';
			$output .= '<div class="vert-centered-wrapper-120px">';
			$output .= '<div class="vert-centered">	';
			$output .= '<h2><span class="timer" data-to="'.$percent.'" >'.$percent.'</span>%</h2>';
			$output .= '<h4>'.esc_html__('of our goal','act').'</h4>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="col-md-4 col-sm-4 col-xs-4 animated-longer-delay-8 fadeIn">';
			$output .= '<div class="vert-centered-wrapper-120px">';
			$output .= '<div class="vert-centered">';
			$output .= '<h2><span class="timer" data-to="'.$daysleft.'" data-speed="1000">'.$daysleft.'</span></h2>';
			$output .= '<h4>'.esc_html__('Days Left','act').'</h4>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="col-md-4 col-sm-4 col-xs-4 animated-longer-delay-9 fadeIn end">';
			$output .= '<div class="vert-centered-wrapper-120px">';
			$output .= '<div class="vert-centered">	';
			$str = do_shortcode('[totaldonations-text-fields campaign="'.$title.'" text="#backers#"]');
			$output .= '<h2><span class="timersa" data-speed="2500">'.do_shortcode('[totaldonations-text-fields campaign="'.$title.'" text="#backers#"]').'</span></h2>';
			$output .= '<h4>'.esc_html__('Donations','act').'</h4>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div><div class="clearfix"></div>';
			$output .= '</div>';
			$output .= '<div class="col-md-2 col-sm-3 col-xs-12  make-a-donation  animated-longer-delay-10 fadeIn">';
			$output .= '<div class="vert-centered-wrapper-120px">';
			$output .= '<div class="vert-centered">	';
			$output .= do_shortcode('[totaldonations-text-fields campaign="'.$title.'" button="yes"]');
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
  		return $output;
}

add_shortcode('fundraise_bar', 'zirto_fundraise_bar');

/*-----------------------------------------------------------------------------------*/
/*	Zirto Title
/*-----------------------------------------------------------------------------------*/

function zirto_title( $atts, $content = null ) {
    extract( shortcode_atts(array(       
        "title"      => '',
		"subtitle"      => '',
		"titlecolor"    => '',
		"subtitlecolor"    => '',
    ), $atts) );
	
            $output  = '';
			
				$output .= '<div class="header">';
				$output .= '<h1 style="color:'.esc_attr($titlecolor).'">'.$title.'</h1>';
				$output .= '<h4 style="color:'.esc_attr($subtitlecolor).'">'.$subtitle.'</h4>';
				$output .= '</div>';

  		return $output;
}

add_shortcode('title', 'zirto_title');


/*-----------------------------------------------------------------------------------*/
/*  Zirto Icon Box
/*-----------------------------------------------------------------------------------*/

function zirto_icon_box( $atts, $content = null ) {	
    extract( shortcode_atts(array(       
        "title"       => '',	
        "type"    			 => '',
        "icon_fontawesome"   => '',	
        "icon_openiconic"    => '',	
        "icon_typicons"      => '',	
        "icon_entypo"    	 => '',	
        "icon_linecons"      => '',	
        "icon_monosocial"    => '',		
    ), $atts) );

		    $output = '';
			vc_icon_element_fonts_enqueue( $type ); 

			$output .= '<div class="about-item">';
			$output .= '<i class="'.esc_attr($icon_fontawesome) . esc_attr($icon_openiconic) . $icon_typicons . $icon_entypo . $icon_linecons . $icon_monosocial.'"></i>';
			$output .= '<div class="about-text">';
			$output .= '<h3>'.esc_html($title).'</h3>';
			$output .= '<p>'.do_shortcode($content).'</p>';
			$output .= '</div>';
			$output .= '</div>';
	
   return $output;

}

add_shortcode('icon_box', 'zirto_icon_box');

/*-----------------------------------------------------------------------------------*/
/*	Zirto Latest Portfolio
/*-----------------------------------------------------------------------------------*/

function zirto_portfolio($atts){
	extract(shortcode_atts(array(
       	'posts'           => '8',
       	'categories'      => 'all',
        'filter'    	  => '',
        'all_text'     	  => 'All Works',
        'portfolio_type'  => '',
    ), $atts));
    
    global $post;
	$blog_post_type = '';
    $portfolio_filters = get_terms('portfolio_category');
    $out1 = '';
	
           if($filter == true) {
          	     if($portfolio_filters){

				 $out1 .= '<div id="js-filters-mosaic" class="cbp-l-filters-button">';
				 
				 $out1 .= '<div data-filter="*" class="cbp-filter-item-active cbp-filter-item">'.esc_html($all_text).'</div>';

				 foreach($portfolio_filters as $portfolio_filter){
					 if($categories == 'all'){
						 
				         $out1 .= '<div data-filter=".'.esc_attr($portfolio_filter->slug).'" class="cbp-filter-item">'.esc_attr($portfolio_filter->name).'</div>';

					 } else {
				         $str = str_replace(',',' ',$categories);
				         $category = explode(' ',$str);
						 if ( in_array( $portfolio_filter->slug, $category ) ) { 
						 
				         $out1 .= '<div data-filter=".'.esc_attr($portfolio_filter->slug).'" class="cbp-filter-item">'.esc_attr($portfolio_filter->name).'</div>';

						 }
					 }
	             }
				 $out1 .= '</div>'; 
                 }
            }
	
	
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => $posts,
		'order'          => 'DESC',
		'orderby'        => 'date',
		'post_status'    => 'publish',
		'post_taxonomy'    => $categories,
        'paged' 			=> $paged
    );

    if($categories != 'all'){
    	
    	// string to array
    	$str = $categories;
    	$arr = explode(',', $str);
    	//var_dump($arr);
    	
		$args['tax_query'][] = array(
			'taxonomy' 	=> 'portfolio_category',
			'field' 	=> 'slug',
			'terms' 	=> $arr
		);
	}

    query_posts( $args );		
    $out = '';

	if( have_posts() ) : while ( have_posts() ) : the_post();

			    $out .= '';			

				$blog_thumbnail= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "squarefolio-portfolio-thumb" );
				$blog_image= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );				 
				$image = zirto_resize( $blog_image[0], 457, 393, true, true, true );   

                $terms = get_the_terms( get_the_ID(), 'portfolio_category' );
                $taxonomy = strip_tags( get_the_term_list($post->ID, 'portfolio_category', '', ' / ', '') );


				$out .= '<div class="cbp-item '; if($terms) : foreach ($terms as $term) {$out .= $term->slug.' ';} endif; $out .= '">';

					$out .= '<a href="'.$blog_image[0].'" class="cbp-caption cbp-lightbox" data-title="'.get_the_title().'<br>'.$taxonomy.'">';
					$out .= '<div class="cbp-caption-defaultWrap"><img src="'.$blog_image[0].'" alt="'.get_the_title().'"> </div>';
					$out .= '<div class="cbp-caption-activeWrap">';
					$out .= '<div class="cbp-l-caption-alignCenter">';
					$out .= '<div class="cbp-l-caption-body">';
					$out .= '<div class="cbp-l-caption-title">'.get_the_title().'</div>';
					$out .= '<div class="cbp-l-caption-desc">'.$taxonomy.'</div>';
					$out .= '</div>';
					$out .= '</div>';
					$out .= '</div>';
					$out .= '</a>';

				$out .= '</div>';			   		
		   
		endwhile;

          
		 wp_reset_query();
	endif;

		return  $out1.'<div id="js-grid-mosaic" class="cbp cbp-l-grid-mosaic">'.$out.'</div>';

}
add_shortcode('portfolio', 'zirto_portfolio');

/*-----------------------------------------------------------------------------------*/
/*  Zirto Team Box
/*-----------------------------------------------------------------------------------*/

function zirto_team_box( $atts, $content = null ) {	
    extract( shortcode_atts(array(       
        "name"       => '',	
        "position"    			 => '',
        "contentm"    			 => '',
        "image_url"    			 => '',
        "social"    			 => '',
        "link"    			 => '',
        "icon_fontawesome"   => '',	
    ), $atts) );

		    $output = '';
			
	        $social = (array) vc_param_group_parse_atts($social);
            $image_urls = wp_get_attachment_url( $image_url, 'full' );

			$output .= '<div class="team-img">';
			$output .= '<img src="'.esc_url($image_urls).'" alt="'.esc_attr($name).'"/>';
			$output .= '<div class="team-img-text">';
			$output .= '<p>'.$contentm.'</p>';
			$output .= '<ul>';
			foreach($social as $s){
				$link = ( '||' === $s['link'] ) ? '' : $s['link'];
				$link = vc_build_link( $s['link'] );
				$a_href = $link['url'];
				$a_title = $link['title'];
				$a_target = $link['target'];
			
			    $output .= '<li><a href="'.esc_attr( $a_href ).'" target="'.esc_attr( $a_target ).'" title="'.esc_attr( $a_title ).'"><i class="'.esc_attr($s['icon_fontawesome']).'"></i></a></li>';
			}
			$output .= '</ul>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="team-content">';
			$output .= '<h4>'.esc_html($name).' <span>'.esc_html($position).'</span></h4>';
			$output .= '</div>';
	
   return $output;

}

add_shortcode('team_box', 'zirto_team_box');


/*-----------------------------------------------------------------------------------*/
/*	Zirto Campaign Box
/*-----------------------------------------------------------------------------------*/

function zirto_campaign_box( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "title"            => '',
        "box_title"        => '',
        "image_url"        => '',
		"campaign_id"      => '',
		"desc"             => '',
		"link"             => '',
		"duedate"          => '',
        "icon_fontawesome" => '',	
        "titlecolor" 	   => '',
        "type" 	   		   => '',
		"translate_total"  => 'Total',
		"translate_target"  => 'Target',
		"translate_donate"  => 'Donate Now',
    ), $atts) );
	
            $output = '';
			
		    $image_urls = wp_get_attachment_url( $image_url, 'full' );

			 $target = migla_get_target($title); //toplanan
			 $total = migla_get_total_amount($title);
             $totalstr = str_replace(array('$',',','.'),'',$total);
             $targetstr = str_replace(array('$',',','.'),'',$target);
			 $c = $targetstr / 100; 
             $percent = floor($totalstr / $c); // yuvarlama
			 
			if($type == 'type-1'){
			$output .= '<div class="campaign-box">';
			if($box_title){
			$output .= '<h3 style="color:'.$titlecolor.';"><i class="'.$icon_fontawesome.'"></i>'.$box_title.'</h3>';
			}
			$output .= '<div class="events">';
			$output .= '<div class="events-img">';
			if($image_url){
			$output .= '<img src="'.esc_url($image_urls).'" alt="'.$title.'"/>';
			}
			$output .= '</div>';
			$output .= '<div class="events-content">';
			$output .= '<h4>'.do_shortcode('[totaldonations-text-fields campaign="'.$title.'" button="yes"]').'<a class="title">'.$title.'</a></h4>';
			$output .= '<div class="skillbar clearfix" data-percent="'.$percent.'%">';
			$output .= '<div class="skillbar-title"></div>';
			$output .= '<div class="skillbar-bar" style="background-color:#D1345B;">';
			$output .= '<div class="skill-bar-percent">'.$percent.'%</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= do_shortcode($content);
			$output .= ''.do_shortcode('[totaldonations-text-fields campaign="'.$title.'" button="yes"]').'';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			
			} else {
				
			$output .= '<div class="cause type-2">';
			if($image_url){
				$output .= '<div class="causes-img">';
				$output .= '<img src="'.esc_url($image_urls).'" alt="'.esc_attr($title).'"/>';
				$output .= '</div>';
			}
			$output .= '<div class="causes-content">';
			$output .= '<h4>'.do_shortcode('[totaldonations-text-fields campaign="'.esc_attr($title).'" button="yes"]') . esc_html($title).'</h4>';
			$output .= do_shortcode($content);
			$output .= '<div class="skillbar clearfix" data-percent="'.esc_attr($percent).'%">';
			$output .= '<div class="skillbar-title-top">';
			$output .= '<span>'.do_shortcode('[totaldonations-text-fields campaign="'.$title.'" text="#total#"]').'</span>';
			$output .= '<span>'.do_shortcode('[totaldonations-text-fields campaign="'.$title.'" text="#target#"]').'</span>';
			$output .= '</div>';
			$output .= '<div class="skillbar-bar" style="background-color:#D1345B;">';
			$output .= '<div class="skill-bar-percent">'.esc_html($percent).'%</div>';
			$output .= '</div>';
			$output .= '<div class="skillbar-title">';
			$output .= '<span>'.esc_html($translate_total).'</span>';
			$output .= '<span>'.esc_html($translate_target).'</span>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="bottom-donate">';
			$output .= do_shortcode('[totaldonations-text-fields campaign="'.esc_attr($title).'" button="yes"]');
			$output .= '</div>';
			$output .= '<a>'.$translate_donate.'</a>';
			$output .= '</div>';
			$output .= '</div>';
			}

			

  		return $output;
}

add_shortcode('campaign_box', 'zirto_campaign_box');

/*-----------------------------------------------------------------------------------*/
/*	Zirto Events
/*-----------------------------------------------------------------------------------*/

function zirto_events($atts){
	extract(shortcode_atts(array(
        'title'      => '',
       	'posts'      => '6',
       	'categories' => 'all',
		'columns'  =>  '4',
        'readmore_text' => 'Read More',
        'date_type' => '',					
        'widget_title' => '',					
        'excerpt_size' => '15',					
        "titlecolor" => '#c7c7c7',	
        "icon_fontawesome" => '',	
    ), $atts));
    
    global $post;
	$blog_post_type = '';

	$args = array(
		'post_type' => 'tribe_events',
		'posts_per_page' => $posts,
		'order'          => 'ASC',
		'orderby'        => 'date',
		'post_status'    => 'publish',
		'post_taxonomy'    => $categories
    );

    if($categories != 'all'){
    	
    	// string to array
    	$str = $categories;
    	$arr = explode(',', $str);
    	//var_dump($arr);
    	
		$args['tax_query'][] = array(
			'taxonomy' 	=> 'tribe_events_cat',
			'field' 	=> 'slug',
			'terms' 	=> $arr
		);
	}

    query_posts( $args );		
    $out = '';
     $i = 0;

	 $post_id =   
	 $count_posts = wp_count_posts( 'tribe_events' )->publish;
	 
	 $out .= '<h3 class="event-title" style="color:'.esc_attr($titlecolor).';"><i class="'.$icon_fontawesome.'"></i>'.$widget_title.'</h3>';
	 $out .= '<div id="js-grid-slider-team" class="events-carousel cbp cbp-slider-edge">';
				
	 if( have_posts() ) : while ( have_posts() ) : the_post();
	
			    $out .= '';			

                if($date_type == 'startdate'){
	                $date = tribe_get_start_date($post, false, $format = "d F y");
                } else {
	                $date = tribe_get_end_date($post, false, $format = "d F y");
				}

				$blog_thumbnail= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "blog-thumb" );
                $image = zirto_resize( $blog_thumbnail[0], 360, 235, true, true, true ); 
					
				$out .= '<div class="cbp-item">';
				$out .= '<div class="cbp-caption">';
				if($image){
				$out .= '<div class="cbp-caption-defaultWrap">';
				$out .= '<a href="'.get_permalink().'" title="'.get_the_title().'"><img src="'.esc_url($image).'" alt="'.get_the_title().'"></a>';
				$out .= '</div>';
				}
				$out .= '</div>';
				$out .= '<div class="cbp-l-grid-slider-team-wrap">';
				$out .= '<div class="cbp-l-grid-slider-team-name"><a href="'.get_permalink().'" title="'.get_the_title().'"><h4>'.get_the_title().'</h4></a></div>';
				$out .= '<div class="cbp-l-grid-slider-team-position"><div class="date"><i class="fa fa-calendar"></i>'.$date.'</div>
				<div class="map-link"><i class="fa fa-map-marker"></i>'.tribe_get_map_link_html().'</div></div>';
				$out .= '</div>';
				$out .= '<div class="cbp-l-grid-slider-team-desc">'.zirto_limit_words(get_the_excerpt(), $excerpt_size).'</div>';
				$out .= '</div>';

		endwhile;
		 wp_reset_query();
	endif;
	
	$out .= '</div>';

	return  $out;
}
add_shortcode('events', 'zirto_events');

/*-----------------------------------------------------------------------------------*/
/*	Zirto Button Btn
/*-----------------------------------------------------------------------------------*/

function zirto_btn_button( $atts, $content = null ) {
    extract( shortcode_atts(array(       
        "icon_fontawesome"    => '',
		"button_icon"         => '',
        "link"                => '',
        "btnalignment"	      => '',
        "button_size"	      => '',		
		"icon_alignment"      => '',
		"css"       		  => '',
		"bgcolor"             => '#000',
		"fontcolor"           => '#fff',
		"bordercolor"         => '#000',
		"hoverbgcolor"        => '#404040',
		"hoverfontcolor"      => '#fff',
		"hoverbordercolor"    => '#404040',
		"button_type"   	  => '',
		"buttonname"          => '',
		"modal_id"          => '',
    ), $atts) );

	        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
			
			$link = ( '||' === $link ) ? '' : $link;
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = $link['target'];
			
            $output         = '';
			$klb            = '';
			$size           = '';
			$alignment   = '';

			if($button_size == '2'){
			  $size .= 'btn-big';
			} elseif($button_size == '3'){
			  $size .= 'btn-small';	
			} else {
			  $size .= '';	
			}

			if($btnalignment == 'center'){
			  $alignment .= 'text-center';
			} elseif($btnalignment == 'right'){
			  $alignment .= 'text-right';	
			} else {
			  $alignment .= 'text-left';	
			}
?>
			<style>
			
			 <?php $bgcolor22 = str_replace(array('#','.',',','(',')'),'',$hoverbgcolor); ?>
			 <?php $fontcolor22 = str_replace(array('#','.',',','(',')'),'',$hoverfontcolor); ?>
			 <?php $bordercolor22 = str_replace(array('#','.',',','(',')'),'',$hoverbordercolor); ?>

			.btn.klb_<?php echo $bgcolor22 ?>:hover {
				background-color: <?php echo esc_html($hoverbgcolor); ?> !important;
			}
			
			.btn.klb_<?php echo $fontcolor22 ?>:hover {
				color: <?php echo esc_html($hoverfontcolor); ?> !important;
			}

			.btn.klb_<?php echo $bordercolor22 ?>:hover {
				border-color: <?php echo esc_html($hoverbordercolor); ?> !important;
			}
			
			</style>
<?php

            $output .= '<div class="button-klb '.esc_attr($alignment) . esc_attr( $css_class ).'">';
			if($button_type == 'modal'){
			wp_enqueue_style('remodal');
			wp_enqueue_style('remodal-theme');
			wp_enqueue_script('remodal');
				
            $output .= '<div class="remodal" data-remodal-id="'.esc_attr($modal_id).'">';
            $output .= '<button data-remodal-action="close" class="remodal-close"></button>';
            $output .= do_shortcode($content);                 
            $output .= '</div>';
            $output .= '<a class="btn btn-black klb_'.$bgcolor22.' klb_'.$fontcolor22.' klb_'.$bordercolor22.' '.$size.'" href="#'.esc_attr( $modal_id ).'" title="'.esc_attr( $buttonname ).'" style="color:'.esc_attr($fontcolor).';background-color:'.esc_attr($bgcolor).'; border:2px solid '.esc_attr($bordercolor).';">';
			} else {
            $output .= '<a class="btn btn-black klb_'.$bgcolor22.' klb_'.$fontcolor22.' klb_'.$bordercolor22.' '.$size.'" href="'.esc_attr( $a_href ).'" target="'.esc_attr( $a_target ).'" title="'.esc_attr( $a_title ).'" style="color:'.esc_attr($fontcolor).';background-color:'.esc_attr($bgcolor).'; border:2px solid '.esc_attr($bordercolor).';">';
			}

   			    if($button_icon == true){
				  if($icon_alignment == 'right'){
				    
				  } else {
					$output .= '<i class="'.$icon_fontawesome.'"></i> ';
				  }
				}
			if($button_type == 'modal'){
            $output .= esc_attr( $buttonname );
			} else {
            $output .= esc_attr( $a_title );
			}
				if($button_icon == true){
				  if($icon_alignment == 'right'){
				    $output .= ' <i class="'.$icon_fontawesome.'"></i>';
				  }
				}			
			$output .= '</a>';

			$output .= '</div>';

  		return $output;
}

add_shortcode('btn_button', 'zirto_btn_button');

/*-----------------------------------------------------------------------------------*/
/*	Zirto Latest Blog
/*-----------------------------------------------------------------------------------*/

function zirto_blog($atts){
	extract(shortcode_atts(array(
        'title'        => '',
       	'posts'        => '4',
       	'categories'   => 'all',
		'columns'  	   =>  '4',
		'excerpt_size' => '15',		
		'order' 	   => 'DESC',		
    ), $atts));
    
    global $post;
	$blog_post_type = '';

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $posts,
		'order'          => $order,
		'orderby'        => 'date',
		'post_status'    => 'publish',
		'post_taxonomy'    => $categories
    );

    if($categories != 'all'){
    	
    	// string to array
    	$str = $categories;
    	$arr = explode(',', $str);
    	//var_dump($arr);
    	
		$args['tax_query'][] = array(
			'taxonomy' 	=> 'category',
			'field' 	=> 'slug',
			'terms' 	=> $arr
		);
	}

    query_posts( $args );		
    $out = '';
				$out .= '<h3 class="latest-news"><i class="fa fa-handshake-o"></i>latest news</h3>';
				$out .= '<ul class="latestnews">';
	if( have_posts() ) : while ( have_posts() ) : the_post();

			    $out .= '';			

				$blog_thumbnail= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "blog-thumb" );
			    $image = zirto_resize( $blog_thumbnail[0], 144, 94, true, true, true );   
                
                $terms = get_the_terms( get_the_ID(), 'category' );
                $taxonomy = strip_tags( get_the_term_list($post->ID, 'category', '', ', ', '') );
            
				
				$out .= '<li>';
				$out .= '<div class="latestnew">';
				$out .= '<div class="latestnew-img">';
				if($image){
				$out .= '<img src="'.esc_url($image).'" alt="'.get_the_title().'"/>';
				}
				$out .= '</div>';
				$out .= '<div class="latestnew-content">';
				$out .= '<a href="'.get_permalink().'" title="'.get_the_title().'"><h6>'.get_the_title().'</h6></a>';
				$out .= '<span><i class="fa fa-calendar"></i>'.get_the_date().'</span>';
				$out .= '</div>';
				$out .= '</div>';
				$out .= '</li>';

		endwhile;
		 wp_reset_query();
	endif;
				$out .= '</ul>';
	return  $out;
}


add_shortcode('blog', 'zirto_blog');

/*-----------------------------------------------------------------------------------*/
/*	Zirto Action Box
/*-----------------------------------------------------------------------------------*/

function zirto_action_box( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "title"              => '',
        "type"        		 => '',
        "icon_fontawesome"   => '',	
        "icon_openiconic"    => '',	
        "icon_typicons"      => '',	
        "icon_entypo"    	 => '',	
        "icon_linecons"      => '',	
        "icon_monosocial"    => '',	
        "bgcolor" 			 => '',	
    ), $atts) );
	
            $output = '';
			
			vc_icon_element_fonts_enqueue( $type ); 
			$style = '';
			if($bgcolor){
			  $style .= 'style="background-color:'.esc_attr($bgcolor).';"';
			}
			$output .= '<div class="help-us-visible-item">';
			$output .= '<div class="overlay-darker" '.$style.'></div>';
			$output .= '<i class="'.esc_attr($icon_fontawesome) . esc_attr($icon_openiconic) . $icon_typicons . $icon_entypo . $icon_linecons . $icon_monosocial.'"></i>';
			$output .= '<h3>'.$title.'</h3>';
			$output .= '<p>'.$content.'</p>';
			$output .= '</div>';

  		return $output;
}

add_shortcode('action_box', 'zirto_action_box');

/*-----------------------------------------------------------------------------------*/
/*	Zirto Counter Box
/*-----------------------------------------------------------------------------------*/

function zirto_counter_box( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "title"              => '',
        "count"              => '',
        "type"              => '',
        "icon_fontawesome"   => '',	
        "icon_openiconic"    => '',	
        "icon_typicons"      => '',	
        "icon_entypo"    	 => '',	
        "icon_linecons"      => '',	
        "icon_monosocial"    => '',	
    ), $atts) );
	
            $output = '';
			
			vc_icon_element_fonts_enqueue( $type ); 
			
			$output .= '<div class="counter-item">';
			$output .= '<i class="'.esc_attr($icon_fontawesome) . esc_attr($icon_openiconic) . $icon_typicons . $icon_entypo . $icon_linecons . $icon_monosocial.'"></i>';
			$output .= '<span class="counter">'.$count.'</span>';
			$output .= '<h6>'.esc_html($title).'</h6>';
			$output .= '</div>';

  		return $output;
}

add_shortcode('counter_box', 'zirto_counter_box');

/*-----------------------------------------------------------------------------------*/
/*  Zirto Map Container
/*-----------------------------------------------------------------------------------*/

function zirto_map_container( $atts, $content = null ) {	
 	extract(shortcode_atts(array(
       	'latitude'      => '51.5209564',
       	'longitude' => '0.157134',
        'zoom'      => '10',
        'css' => '',
        'height' => '500',	
        'mapimage' => '',	
        'title' => '',	
        'subtitle' => '',	
        'values' => '',	
        'icon_fontawesome' => '',	
        'itemtitle' => '',	
        'itemdetail' => '',	
        'openmap' => 'Open the map',	
        'closemap' => 'Close the map',	
    ), $atts)); 
	$image_urls = wp_get_attachment_url( $mapimage, 'full' );	
    wp_enqueue_script('googlemap');
?>

<script type="text/javascript">
jQuery(document).ready(function() {
function initialize() {
	
var styles = [
    {
      stylers: [
        { hue: "#eec55b" },
        { saturation: -100 },
        { gamma: 0.9 }
      ]
    },{
      featureType: "road",
      elementType: "geometry",
      stylers: [
        { lightness: 100 },
        { visibility: "simplified" }
      ]
    },{
      featureType: "road",
      elementType: "labels",
      stylers: [
        { visibility: "on" }
      ]
    }
  ];
    var styledMap = new google.maps.StyledMapType(styles,
    {name: "Gray Map"});  
	
    var latlng = new google.maps.LatLng(<?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>);
    var myOptions = {
        zoom: <?php echo esc_attr($zoom); ?>,
        center: latlng,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControlOptions: {
		  mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
		}
    };

    var map = new google.maps.Map(document.getElementById("map"),
            myOptions);
  map.mapTypes.set('map_style', styledMap);
  map.setMapTypeId('map_style');
  
  var markerimage = '<?php echo esc_url($image_urls); ?>';
  var marker = new google.maps.Marker({
    position: {lat: <?php echo esc_attr($latitude); ?>, lng: <?php echo esc_attr($longitude); ?>},
    map: map,
    icon: markerimage,
  });
}
google.maps.event.addDomListener(window, "load", initialize);
});
</script>

<?php 

            $values = (array) vc_param_group_parse_atts($values);

            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

	        $output = '';
			
            $output .= '<div id="map_container" class="contact-map '.esc_attr( $css_class ).'">';
            $output .= '<div id="map" class="google-map" style="height:'.esc_attr($height).'px;"></div>';
			
            $output .= '<div class="cover-map">';
            $output .= '<div class="mm-open">'.$openmap.' <i class="fa fa-angle-down"></i></div>';
            $output .= '<div class="mm-close">'.$closemap.' <i class="fa fa-angle-up"></i></div>';
            $output .= '<div class="container">';
            $output .= '<div class="row">';
            $output .= '<div class="find-us-items">';
            $output .= '<div class="col-md-8 col-md-offset-2 header">';
            $output .= '<h1>'.$title.'</h1>';
            $output .= '<h4>'.$subtitle.'</h4>';
            $output .= '</div>';
						  
			foreach($values as $v){
            $output .= '<div class="col-md-4 col-sm-4 col-xs-4 find-us-item">';
            $output .= '<div class="map-header">';
            $output .= '<i class="'.$v['icon_fontawesome'].'"></i>';	
            $output .= '<h2>'.$v['itemtitle'].'</h2>';
            $output .= '</div>';
            $output .= '<span>'.$v['itemdetail'].'</span>';
            $output .= '</div>';
			}		  
						
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';

   return $output;

}

add_shortcode('map_container', 'zirto_map_container');

/*-----------------------------------------------------------------------------------*/
/*	Br-Tag
/*-----------------------------------------------------------------------------------*/

function zirto_br() {
   return '<br />';
}

add_shortcode('br', 'zirto_br');