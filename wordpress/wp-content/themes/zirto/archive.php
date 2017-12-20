<?php

/**
 * archive.php
 * @package WordPress
 * @subpackage Zirto
 * @since Zirto 1.0
 * 
 */

?>

<?php get_header(); ?>  
	
	<section id="template-klb-blog" data-section="blog">
		<div class="blog-head">
			<h2 class="archive"><?php the_archive_title(); ?></h2>
		</div>
		<div class="container">
			<div class="row">
				<div class="section-heading">
				
					<?php if( ot_get_option( 'layout_set' ) == 'left-sidebar') { ?>
								
							<div class="col-md-3">
								
							  <?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
								<div class="sidebar">								
								  <?php dynamic_sidebar( 'blog-sidebar' ); ?>
								</div>							   
							  <?php } ?>
								
							</div>
							<div class="col-md-9">
							  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
							  
								   <?php  get_template_part( 'post-format/content', get_post_format() ); ?>
							   
							  <?php endwhile;
							  
								  get_template_part( 'post-format/pagination' ); 
			
								  else : ?>

								  <h2><?php esc_html_e('No Posts Found', 'zirto') ?></h2>
							
							<?php endif; ?>

							</div>

					<?php } elseif( ot_get_option( 'layout_set' ) == 'full-width') { ?>
							<div class="col-md-12">
							  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
							  
								   <?php  get_template_part( 'post-format/content', get_post_format() ); ?>
							   
							  <?php endwhile;
							  
								  get_template_part( 'post-format/pagination' ); 
			
								  else : ?>

								  <h2><?php esc_html_e('No Posts Found', 'zirto') ?></h2>
							
							<?php endif; ?>

							</div>
					
					<?php } else { ?>
							<div class="col-md-9">
							  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
							  
								   <?php  get_template_part( 'post-format/content', get_post_format() ); ?>
							   
							  <?php endwhile;
							  
								  get_template_part( 'post-format/pagination' ); 
			
								  else : ?>

								  <h2><?php esc_html_e('No Posts Found', 'zirto') ?></h2>
							
							<?php endif; ?>

							</div>
							<div class="col-md-3">
								
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
	
<?php get_footer(); ?>   