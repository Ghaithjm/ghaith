<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>

<div class="tribe-events-meta-group tribe-events-meta-group-venue">

		<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

	<ul class="venue">
		<?php if ( tribe_address_exists() ) : ?>
			<li>
				<address class="tribe-events-address">
					<?php echo tribe_get_full_address(); ?>

					<?php if ( tribe_show_google_map_link() ) : ?>
						<?php echo tribe_get_map_link_html(); ?>
					<?php endif; ?>
				</address>
			</li>
		<?php endif; ?>

		<?php if ( ! empty( $phone ) ): ?>
		   <li>
			 <dt> <?php esc_html_e( 'Phone:', 'zirto' ) ?> </dt>
			 <dd class="tribe-venue-tel"> <?php echo esc_html($phone) ?> </dd>
		   </li>
		<?php endif ?>

		<?php if ( ! empty( $website ) ): ?>
		  <li>
			<dt> <?php esc_html_e( 'Website:', 'zirto' ) ?> </dt>
			<dd class="url"> <?php echo zirto_sanitize_data($website) ?> </dd>
		  </li>
		<?php endif ?>
	</ul>
		<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>

</div>
