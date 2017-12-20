<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blogitems">
		<div class="blog-content">
				<div class="blog-img">
				   <?php  
					if (get_post_meta( get_the_ID(), 'klb_blog_video_type', true ) == 'vimeo') {  
					  echo '<iframe src="http://player.vimeo.com/video/'.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="100%" height="472" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';  
					}  
					else if (get_post_meta( get_the_ID(), 'klb_blog_video_type', true ) == 'youtube') {  
					  echo '<iframe width="100%" height="450" src="http://www.youtube.com/embed/'.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>';  
					}  
					else {  
						echo ' '.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).' '; 
					}  
					?> 
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
			<?php the_excerpt(); ?>
			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

		</div>
	</div>
</article>
