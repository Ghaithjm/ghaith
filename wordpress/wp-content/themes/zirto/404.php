<?php
/**
 * 404.php
 * @package WordPress
 * @subpackage Zirto
 * @since Zirto 1.0
 */
?>

<?php get_header(); ?>
      <div class="container">
          <div class="row">
			   <div class="col-md-offset-2 col-md-8">
				 <div class="box-content klberror">
					
					<div class="col-md-12">
					<center>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/theme/img/404.png" />
					<p class="error"><?php esc_html_e('Requested page not found! Let s head back to the','zirto'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','zirto'); ?></a></p>
					</center>
					</div>

					<div class="col-md-12">
					<center>
					<form class="input-group" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
						 <input  type="text" class="form-control" id="s" name="s" placeholder="<?php esc_attr_e('Search For', 'zirto') ?>" autocomplete="off" />
						 <span class="input-group-btn">
							<button class="btn btn-default" type="submit" value="<?php esc_html_e('Search For', 'zirto') ?>" id="searchsubmit"><i class="fa fa-search"></i></button>
						 </span>	 
				    </form>
					</center>
					</div>

				 </div>
			   </div>
           </div>
      </div>  

<?php get_footer(); ?>