<?php
/**
	Plugin Name: Image Links
	Plugin URI: https://www.mha.systems
	Description: Outputs a linked image with a title. Optionally in a group.
	Version: 1.4
	Author: Mill Hill Automation
	Author URI: http://www.mha.systems
	Copyright: Sami Greenbury
	Text Domain: mha

	@package mha
 */
class MhaShortcodeImageLink {
	/**
	 * Register the shortcode with the output
	 */
	public function __construct() {
		add_image_size( 'mha_image_link', 700, 700, true );
		$this->register_shortcodes();
		$this->add_styles();
		$this->add_scripts();
	}

	/**
	 * Register the shortcode with WordPress
	 */
	private function register_shortcodes() {
		add_shortcode( 'mha_image_link', array( $this, 'output_shortcode' ) );
		add_shortcode( 'mha_image_link_grid', array( $this, 'output_grid_shortcode' ) );
	}

	/**
	 * Add the styles needed to display iamge_links - unless overridden.
	 */
	private function add_styles() {
		if ( apply_filters( 'mha_image_link_include_styles', true ) ) {
			add_action(
				'wp_enqueue_scripts',
				array( get_class( $this ), 'do_add_styles' )
			);
		}
	}

	/**
	 * Callback function for add_action() in $this->add_styles();
	 *
	 * To maintain PHP <7 compatibility this needs to be a separate method,
	 * rather than a closure - and it has to be a public static method
	 * so that the WordPress hooks internals can call it.
	 *
	 * @return void
	 */
	public static function do_add_styles() {
		wp_enqueue_style(
			'mha-image-links',
			plugins_url( '/image-links.css', __FILE__ ),
			[],
			1
		);
	}

	/**
	 * Add the javascript needed to enhance iamge_links - unless overridden.
	 */
	private function add_scripts() {
		if ( apply_filters( 'mha_image_link_include_scripts', true ) ) {
			add_action(
				'wp_enqueue_scripts',
				array( get_class( $this ), 'do_add_scripts' )
			);
		}
	}

	/**
	 * Callback function for add_action() in $this->add_styles();
	 *
	 * To maintain PHP <7 compatibility this needs to be a separate method,
	 * rather than a closure - and it has to be a public static method
	 * so that the WordPress hooks internals can call it.
	 *
	 * @return void
	 */
	public static function do_add_scripts() {
		wp_enqueue_script(
			'mha-image-links',
			plugins_url( '/image-links.js', __FILE__ ),
			[],
			1,
			true
		);
	}

	/**
	 * Wrapps the given image_link code in the code required to make it into a
	 * grid display.
	 *
	 * Example: [mha_image_link_grid][mha_image_link][mha_image_link][/mha_image_link_grid]
	 *
	 * @param array  $atts Shortcode settings.
	 * @param string $contents HTML code of the image links and nothing else.
	 *
	 * @return string The input HTML wrapped in the grid HTML.
	 */
	public static function output_grid_shortcode( $atts, $contents ) {

		$atts = shortcode_atts( array(
			'columns_xs' => 2,
			'columns_sm' => false,
			'columns_md' => false,
			'columns_lg' => false,
		), $atts, 'mha_image_link' );

		$classes = array( 'mha-image-link-grid' );

		// Add the class for the column count if set. To make the
		// CSS much shorter (since the aspect ratio changes at different
		// resolutions in the current design), we include all the sizes for
		// the specified and above.
		if ( $atts['columns_xs'] ) {
			$classes['xs'] = 'mha-image-link-grid-columns-xs-' . esc_attr( $atts['columns_xs'] );
			$classes['sm'] = 'mha-image-link-grid-columns-sm-' . esc_attr( $atts['columns_xs'] );
			$classes['md'] = 'mha-image-link-grid-columns-md-' . esc_attr( $atts['columns_xs'] );
			$classes['lg'] = 'mha-image-link-grid-columns-lg-' . esc_attr( $atts['columns_xs'] );
		}
		if ( $atts['columns_sm'] ) {
			$classes['sm'] = 'mha-image-link-grid-columns-sm-' . esc_attr( $atts['columns_sm'] );
			$classes['md'] = 'mha-image-link-grid-columns-md-' . esc_attr( $atts['columns_sm'] );
			$classes['lg'] = 'mha-image-link-grid-columns-lg-' . esc_attr( $atts['columns_sm'] );

		}
		if ( $atts['columns_md'] ) {
			$classes['md'] = 'mha-image-link-grid-columns-md-' . esc_attr( $atts['columns_md'] );
			$classes['lg'] = 'mha-image-link-grid-columns-lg-' . esc_attr( $atts['columns_md'] );

		}
		if ( $atts['columns_lg'] ) {
			$classes['lg'] = 'mha-image-link-grid-columns-lg-' . esc_attr( $atts['columns_lg'] );
		}

		$html = array();

		$html[] = '<div class="' . implode( ' ', $classes ) . '">';
		// Don't let us have any <brs> as they mess with the layout.
		$contents = do_shortcode( $contents );
		$contents = str_replace( [ '<br>', '<br />' ], '', $contents );

		$html[] = $contents;
		$html[] = '</div>';

		return implode( "\n", $html );
	}

	/**
	 * Do the shortcode outputting
	 *
	 * @param array $atts Attributes.
	 */
	public static function output_shortcode( $atts ) {
		$atts = shortcode_atts( array(
			'image'      => '',
			'text'       => '',
			'subtext'    => false,
			'link'       => '',
			'attachment' => false,
			'style'      => 'half',
		), $atts, 'mha_image_link' );

		$imgs = array();
		// If we didn't specify an attachment, and we did specify an image then use the image.
		if ( false === $atts['attachment'] && ! empty( $atts['image'] ) ) {
			$imgs[] = $atts['image'];
		} else {
			// Otherwise loads the attachments.
			$attachments = explode( ',', $atts['attachment'] );
			foreach ( $attachments as $attachment ) {
				$this_image = wp_get_attachment_image_src( $attachment, 'mha_image_link' );
				if ( $this_image && ! empty( $this_image[0] ) ) {
					$imgs[] = $this_image[0];
				}
			}
		}

		// If we didn't have an image, we can't have an image link. Report the error.
		if ( empty( $imgs ) ) {
			return WP_DEBUG ? 'Error: Invalid Image or Attachment for Image Link.' : '';
		}

		// Get together the classes we require.
		$classes = [
			'mha-image-link',
			esc_attr( $atts['style'] ),
		];

		$link = esc_attr( $atts['link'] );
		$text = wp_kses( $atts['text'], wp_kses_allowed_html( 'post' ) );
		$subtext = wp_kses( $atts['subtext'], wp_kses_allowed_html( 'post' ) );

		if ( ! empty( $link ) ) {
			$a       = '<a href="' . $link . '">';
			$close_a = '</a>';
		} else {
			$a       = '';
			$close_a = '';
		}

		$is_slideshow = (bool) ( count( $imgs ) > 1 );

		$html = array();

		$html[] = '<div class="mha-image-link-wrapper">';
		$html[] = $a;
		$html[] = '<span class="' . implode( ' ', $classes ) . '">';
		$html[] = '<span ';
		// Set the first image as the starting background.
		$html[] = ' style="background-image: url(' . esc_attr( $imgs[0] ) . ');"';

		// If we have more than one background image, output them all for the
		// slidehow data (including the main one).
		if ( $is_slideshow ) {
			// Output any other images as data attributes so the JS can cycle through them.
			$background_index = 0;
			foreach ( $imgs as $img ) {
				$html[] = ' data-background' . ( $background_index++ ) . '="' . esc_attr( $img ) . '"';
			}
		}
		$html[] = ' class="';
		// Inject an extra class if we have a slideshow background.
		if ( $is_slideshow ) {
			$html[] = ' mha-image-link-slideshow';
		}
		$html[] = ' image-link-image';
		$html[] = '"'; // close class=.
		$html[] = '></span>';
		$html[] = '	<span class="caption">';
		$html[] = '		<span class="text">';
		$html[] = $text;
		$html[] = '		</span>';
		$html[] = '		<span class="subtext">';
		$html[] = $subtext;
		$html[] = '		</span>';
		$html[] = '	</span>';
		$html[] = '</span>';
		$html[] = $close_a;
		$html[] = '</div>'; // .wrapper
		return implode( $html );
	}

}

new MhaShortcodeImageLink();
