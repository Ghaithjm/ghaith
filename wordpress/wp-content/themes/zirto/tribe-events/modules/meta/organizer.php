<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */

$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-organizer">
	<ul class="venue organizer">
		<?php
		do_action( 'tribe_events_single_meta_organizer_section_start' );

		foreach ( $organizer_ids as $organizer ) {
			if ( ! $organizer ) {
				continue;
			}

			?>
			<li>
				<dt><?php echo esc_html(tribe_get_organizer_label( ! $multiple )); ?></dt>
				<dd class="tribe-organizer">
					<?php echo tribe_get_organizer_link( $organizer ) ?>
				</dd>
			</li>
			<?php
		}

		if ( ! $multiple ) { // only show organizer details if there is one
			if ( ! empty( $phone ) ) {
				?>
				<li>
					<dt>
						<?php esc_html_e( 'Phone:', 'zirto' ) ?>
					</dt>
					<dd class="tribe-organizer-tel">
						<?php echo esc_html( $phone ); ?>
					</dd>
				</li>
				<?php
			}//end if

			if ( ! empty( $email ) ) {
				?>
				<li>
					<dt>
						<?php esc_html_e( 'Email:', 'zirto' ) ?>
					</dt>
					<dd class="tribe-organizer-email">
						<?php echo esc_html( $email ); ?>
					</dd>
				</li>
				<?php
			}//end if

			if ( ! empty( $website ) ) {
				?>
				<li>
					<dt>
						<?php esc_html_e( 'Website:', 'zirto' ) ?>
					</dt>
					<dd class="tribe-organizer-url">
						<?php echo zirto_sanitize_data($website); ?>
					</dd>
				</li>
				<?php
			}//end if
		}//end if

		do_action( 'tribe_events_single_meta_organizer_section_end' );
		?>

	</ul>
</div>
