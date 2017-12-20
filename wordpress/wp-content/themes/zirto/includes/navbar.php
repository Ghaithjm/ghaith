		<?php if($contactinfo = ot_get_option( 'zirto_contact_info' ) || $sociallist = ot_get_option( 'zirto_socialicons' )){ ?>
	    <!--  main-navbar-socila  -->
		<div class="socials-top">
			<div class="container">
				<div class="col-md-12 navbar-socials">
					<div class="col-md-6 col-sm-6 col-xs-12 padding-0">
						<?php 
						$contactinfo = ot_get_option( 'zirto_contact_info' );
						if ($contactinfo) { ?>
						 <ul class="navbar-mail">
							 <?php foreach($contactinfo as $key => $value) {
							  echo '<li><i class="fa fa-'.esc_attr($value['zirto_contacticon']).'"></i>';
							  echo '<span>'.esc_html($value['zirto_contactinfo']).'</span>';
							  echo '</li>';
							  } ?>
						 </ul>				  
						<?php } ?> 
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 padding-0-res">
						<?php 
						$sociallist = ot_get_option( 'zirto_socialicons' );
						if ($sociallist) { ?>
						 <ul class="navbar-social">
							 <?php foreach($sociallist as $key => $value) {
							  echo '<li>';
							  echo '<a href="'.esc_url($value['zirto_sociallink']).'" target="_blank"><i class="fa fa-'.esc_attr($value['zirto_socialicon']).'"></i></a>';
							  echo '</li>';
							  } ?>
						 </ul>				  
						<?php } ?> 
					</div>
				</div>
			</div>
		</div>
		<!--  end///main-navbar-socila  -->
		<?php } ?>
		
		<!--  main-navbar  -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only"><?php esc_html_e('Toggle navigation','zirto'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
				<?php if (ot_get_option( 'zirto_logo' )) { ?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
						<img src="<?php echo esc_url(ot_get_option( 'zirto_logo' )); ?>" alt="<?php bloginfo('name'); ?>">
					</a> 
				<?php } elseif (ot_get_option( 'zirto_logotext' )) { ?>
					<a class="navbar-brand klbtext" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
						<?php echo esc_html(ot_get_option( 'zirto_logotext' )); ?>
					</a> 
				<?php } else { ?>
					<a class="navbar-brand klbtext" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
						<?php esc_html_e('Zirto','zirto'); ?>
					</a> 
				<?php } ?>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<?php 
				   wp_nav_menu(array(
				   'theme_location' => 'main-menu',
				   'container' => '',
				   'fallback_cb' => 'show_top_menu',
				   'menu_id' => '',
				   'menu_class' => 'nav navbar-nav',
				   'echo' => true,
				   'walker' => new zirto_description_walker(),
				   'depth' => 0 
					)); 
				 ?>	
			</div><!--/.nav-collapse -->
		  </div>
		</nav>
		<!--  end/main-navbar  -->