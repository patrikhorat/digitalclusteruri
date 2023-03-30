<?php
/**
 * The template for displaying search forms
 *
 * @package digitalclusteruri
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'digitalclusteruri_bootstrap_version', 'bootstrap4' );
$uid               = wp_unique_id( 's-' ); // The search form specific unique ID for the input.

$aria_label = '';
if ( isset( $args['aria_label'] ) && ! empty( $args['aria_label'] ) ) {
	$aria_label = 'aria-label="' . esc_attr( $args['aria_label'] ) . '"';
}
?>

<form role="search" class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" <?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?>>
	<label class="screen-reader-text" for="<?php echo $uid; ?>"><?php echo esc_html_x( 'Search for:', 'label', 'digitalclusteruri' ); ?></label>
	<div class="input-group">
		<input type="search" class="field search-field form-control" id="<?php echo $uid; ?>" name="s" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'digitalclusteruri' ); ?>">
		<?php if ( 'bootstrap5' === $bootstrap_version ) : ?>
			<input type="submit" class="submit search-submit btn btn-primary" name="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'digitalclusteruri' ); ?>">
		<?php else : ?>
			<span class="input-group-append">
				<input type="submit" class="submit search-submit btn btn-primary" name="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'digitalclusteruri' ); ?>">
			</span>
		<?php endif; ?>
	</div>
</form>
<?php
