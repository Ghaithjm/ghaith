<?php
/**
 * search.php
 * @package WordPress
 * @subpackage zirto
 * @since zirto 1.0
 * 
 */
 ?>

<?php get_header(); ?>  

	<section id="template-klb-blog" data-section="blog">
		<div class="blog-head">
		  <h2 class="text-center">
			  <?php printf( esc_html__( 'Search Results for: %s', 'zirto' ), get_search_query() ); ?>
		  </h2>
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
								  <form class="input-group" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
									 <input  type="text" class="form-control" id="s" name="s" placeholder="<?php esc_attr_e('Search For', 'zirto') ?>" autocomplete="off" />
									 <span class="input-group-btn">
										<button class="btn btn-default" type="submit" value="<?php esc_html_e('Search For', 'zirto') ?>" id="searchsubmit"><i class="fa fa-search"></i></button>
									 </span>	 
								  </form>
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
								  <form class="input-group" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
									 <input  type="text" class="form-control" id="s" name="s" placeholder="<?php esc_attr_e('Search For', 'zirto') ?>" autocomplete="off" />
									 <span class="input-group-btn">
										<button class="btn btn-default" type="submit" value="<?php esc_html_e('Search For', 'zirto') ?>" id="searchsubmit"><i class="fa fa-search"></i></button>
									 </span>	 
								  </form>
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
								  <form class="input-group" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
									 <input  type="text" class="form-control" id="s" name="s" placeholder="<?php esc_attr_e('Search For', 'zirto') ?>" autocomplete="off" />
									 <span class="input-group-btn">
										<button class="btn btn-default" type="submit" value="<?php esc_html_e('Search For', 'zirto') ?>" id="searchsubmit"><i class="fa fa-search"></i></button>
									 </span>	 
								  </form>
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