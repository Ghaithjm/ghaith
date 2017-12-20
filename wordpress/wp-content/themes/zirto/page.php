<?php

/**
 * page.php
 * @package WordPress
 * @subpackage Zirto
 * @since Zirto 1.0
 */
?>

<?php get_header(); ?>

	 <?php while(have_posts()) : the_post(); ?>

			<?php the_content (); ?>
			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
		  </div>
	 <?php endwhile; ?>
	 <div class="container">
		<div class="row">
		   <div class="col-md-12">
			   <?php comments_template(); ?>    
		   </div>
		</div>
	 </div>		
<?php get_footer(); ?>
