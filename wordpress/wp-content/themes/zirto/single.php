<?php
/**
 * single.php
 * @package WordPress
 * @subpackage Zirto
 * @since zirto 1.0
 * 
 */
 ?>

<?php get_header(); ?>
			  
	<section id="template-klb-blog" data-section="blog">
		<div class="container">
			<div class="row">
				<div class="section-heading ">
				
					<?php if( ot_get_option( 'layout_set' ) == 'left-sidebar') { ?>
					
							<div class="col-md-3 ">
								<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
									  <div class="sidebar">
										<?php dynamic_sidebar( 'blog-sidebar' ); ?>
									  </div>
								<?php } ?>
							</div>
							
							<div class="col-md-9">
							
								  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
								  
									   <?php  get_template_part( 'post-format/single', get_post_format() ); ?>
								   
								  <?php endwhile;
								  
									  else : ?>

									  <h2><?php esc_html_e('No Posts Found', 'zirto') ?></h2>
								
								<?php endif; ?>
								
								<?php comments_template(); ?>
								
							</div>

					<?php } elseif( ot_get_option( 'layout_set' ) == 'full-width') { ?>
							<div class="col-md-12">
							
								  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
								  
									   <?php  get_template_part( 'post-format/single', get_post_format() ); ?>
								   
								  <?php endwhile;
								  
									  else : ?>

									  <h2><?php esc_html_e('No Posts Found', 'zirto') ?></h2>
								
								<?php endif; ?>
								
								<?php comments_template(); ?>
								
							</div>
					<?php } else { ?>
					
							<div class="col-md-9">
							
								  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
								  
									   <?php  get_template_part( 'post-format/single', get_post_format() ); ?>
								   
								  <?php endwhile;
								  
									  else : ?>

									  <h2><?php esc_html_e('No Posts Found', 'zirto') ?></h2>
								
								<?php endif; ?>
								
								<?php comments_template(); ?>
								
							</div>
							<div class="col-md-3 ">
								<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
									  <div class="sidebar">
										<?php dynamic_sidebar( 'blog-sidebar' ); ?>
									  </div>
								<?php } ?>
							</div>
									
					<?php } ?>
				</div>
			</div>
			
		</div>
	</section>
	<!-- END SERVICES -->


<!-- BLOG END-->
<?php get_footer(); ?>   
