<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Havnehotellet_i_Halden
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses havnehotellet_i_halden_header_style()
 */
function havnehotellet_i_halden_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'havnehotellet_i_halden_custom_header_args', array(
		'default-image'          => get_stylesheet_directory_uri() . '/images/havnehotellet-i-halden.jpg',
		'default-text-color'     => '000000',
		'width'                  => 1920,
		'height'                 => 600,
		'flex-height'            => true,
		'wp-head-callback'       => 'havnehotellet_i_halden_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'havnehotellet_i_halden_custom_header_setup' );

if ( ! function_exists( 'havnehotellet_i_halden_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see havnehotellet_i_halden_custom_header_setup().
	 */
	function havnehotellet_i_halden_header_style() {
		$header_text_color = get_header_textcolor();
		$header_image = get_header_image();

		/*
		* If no custom options for text are set, let's bail.
		* get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		*/
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		/*
		* Setting default-image in havnehotellet_i_halden_custom_header_setup doesn't seem to work, but this does does the trick.
		* The default-image does make it show as a suggested image, so we'll keep it there.
		*/
		if ( $header_image === false ) {
			$header_image = get_stylesheet_directory_uri() . '/images/havnehotellet-i-halden.jpg';
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.page-title,
			.page-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.page-title,
			.page-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}

			.page-header {
				background-image: url(<?php echo esc_attr( $header_image ); ?>);
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
