		<!-- Donete Slide -->
		<div class="donate-slide visible-palate">
			<div class="donate-trigger">
				<i class="fa fa-heart-o"></i>
			</div>
			<div class="donate-slide-head">
				<h6><?php echo esc_html(ot_get_option('zirto_donate_first_title')); ?></h6>
				<h4><?php echo esc_html(ot_get_option('zirto_donate_second_title')); ?></h4>
			</div>
			<div class="various-donate clearfix">
				<div class="colors-list">
					<?php if( get_option_tree( 'donate_button_type' ) == 'default_type') { ?>
						<a  href="<?php echo esc_url(ot_get_option('zirto_donate_button_url')); ?>"><?php echo esc_html(ot_get_option('zirto_donate_button_text')); ?></a>
					<?php } else { ?>
						<a href="#donate-popup" class="donate-btn"><?php echo esc_html(ot_get_option('zirto_donate_button_text')); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php	wp_enqueue_style('remodal');
				wp_enqueue_style('remodal-theme');
				wp_enqueue_script('remodal');  ?>

		<!-- /.End Of Donate Slide -->
		<!-- Donate-Button-Open -->	
           <div class="remodal" data-remodal-id="donate-popup">
           <button data-remodal-action="close" class="remodal-close"></button>
				<?php echo do_shortcode(get_option_tree('zirto_donate_modal_content')); ?>                 
           </div>
        <!-- end//Donate-Button-Open -->	
 