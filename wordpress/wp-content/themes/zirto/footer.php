<?php
/**
 * footer.php
 * @package WordPress
 * @subpackage Zirto
 * @since Zirto 1.0
 * 
 */
 ?>
		<footer id="footerdown">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php if(ot_get_option( 'zirto_copyright' )){ ?>
						<p><?php  $allowed_html = array(
							'a' => array(
								'href' => array(),
								'title' => array(),
								'class' => array(),
								'target' => array('_blank', '_top'),
							), );	?>						
							<?php echo  wp_kses(ot_get_option( 'zirto_copyright' ),$allowed_html); ?></p>
						<?php } else { ?>
							<p><?php esc_html_e('Copyright 2017.KlbTheme . All rights reserved','zirto'); ?>
						<?php } ?>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						$sociallist = ot_get_option( 'zirto_socialicons' );
						if ($sociallist) { ?>
						 <ul class="footer-social">
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
		</footer>
	</div>

	<?php wp_footer(); ?>
</body>	
</html>