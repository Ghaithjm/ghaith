<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blogitems">
		<div class="blog-content">
			 <div class="blog-img">
				<?php $images = rwmb_meta( 'klb_blogitemslides', 'type=image_advanced&size=medium' ); ?>
				<?php if($images) { ?>
					<?php wp_enqueue_script('zirto_carousel');  ?>
					<?php wp_enqueue_script('owl-carousel');  ?>
					<div class="blog-slider owl-carousel">
						<?php  foreach ( $images as $image ) { ?>
							<div class="item"><img src="<?php echo esc_url($image['full_url']); ?>" alt="blogimage"></div>
						<?php } ?>
					</div>
				<?php } ?>
			 </div>
			 <div class="blog-top">
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				<ul class="blog-socials">
					<li><a href="<?php the_permalink(); ?>"><i class="fa fa-calendar-o"></i><span><?php echo get_the_date(); ?></span></a></li>
					<?php if ( has_tag() ) { ?>
					<li><?php the_tags( '<i class="fa fa-tag"></i></i>', ', ' , ' '); ?></li>
					 <?php } ?>
					<?php if ( has_category() ) { ?>
					<li><i class="fa fa-folder-o"></i><span><?php the_category(', '); ?></span></li>
					 <?php } ?>
				</ul>
				<?php if ( is_sticky()) {
					printf( '<span class="sticky-post">%s</span>', esc_html__( 'Featured', 'zirto' ) );
				} ?>
			 </div>
			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

		</div>
	
	</div>
</article>