<?php
/**
 * Havnehotellet i Halden functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Havnehotellet_i_Halden
 */

if ( ! function_exists( 'havnehotellet_i_halden_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function havnehotellet_i_halden_setup() {
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'wlwmanifest_link');

		// Removes embed.min.js
		function hih_dequeue_scripts() {
			wp_deregister_script('wp-embed');
		}
		add_action('wp_enqueue_scripts', 'hih_dequeue_scripts');

		/**
		 * Disable the emoji's
		 */
		function disable_emojis() {
			remove_action('wp_head', 'print_emoji_detection_script', 7);
			remove_action('admin_print_scripts', 'print_emoji_detection_script');
			remove_action('wp_print_styles', 'print_emoji_styles');
			remove_action('admin_print_styles', 'print_emoji_styles');
			remove_filter('the_content_feed', 'wp_staticize_emoji');
			remove_filter('comment_text_rss', 'wp_staticize_emoji');
			remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
			add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
			add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
		}
		add_action('init', 'disable_emojis');

		/**
		 * Filter function used to remove the tinymce emoji plugin.
		 *
		 * @param array $plugins
		 * @return array Difference betwen the two arrays
		 */
		function disable_emojis_tinymce($plugins) {
			if (is_array($plugins)) {
				return array_diff($plugins, array('wpemoji'));
			} else {
				return array();
			}
		}

		/**
		 * Remove emoji CDN hostname from DNS prefetching hints.
		 *
		 * @param array $urls URLs to print for resource hints.
		 * @param string $relation_type The relation type the URLs are printed for.
		 * @return array Difference betwen the two arrays.
		 */
		function disable_emojis_remove_dns_prefetch($urls, $relation_type) {
			if ('dns-prefetch' == $relation_type) {
				/** This filter is documented in wp-includes/formatting.php */
				$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

				$urls = array_diff($urls, array($emoji_svg_url));
			}

			return $urls;
		}

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Havnehotellet i Halden, use a find and replace
		 * to change 'havnehotellet-i-halden' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'havnehotellet-i-halden', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-primary' => esc_html__( 'Hovedmeny', 'havnehotellet-i-halden' ),
			'menu-footer-primary' => esc_html__( 'Footer meny - hoved', 'havnehotellet-i-halden' ),
			'menu-footer-secondary' => esc_html__( 'Footer meny - sekundær', 'havnehotellet-i-halden' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'havnehotellet_i_halden_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Register Custom Post Type
		function custom_post_type()
		{
			$rooms_labels = array(
				'name'                  => _x('Rooms', 'Post Type General Name', 'havnehotellet_i_halden'),
				'singular_name'         => _x('Room', 'Post Type Singular Name', 'havnehotellet_i_halden'),
				'menu_name'             => __('Rooms', 'havnehotellet_i_halden'),
				'name_admin_bar'        => __('Room', 'havnehotellet_i_halden'),
				'archives'              => __('Room Archives', 'havnehotellet_i_halden'),
				'attributes'            => __('Room Attributes', 'havnehotellet_i_halden'),
				'parent_item_colon'     => __('Parent Room:', 'havnehotellet_i_halden'),
				'all_items'             => __('All Rooms', 'havnehotellet_i_halden'),
				'add_new_item'          => __('Add New Room', 'havnehotellet_i_halden'),
				'add_new'               => __('Add New', 'havnehotellet_i_halden'),
				'new_item'              => __('New Room', 'havnehotellet_i_halden'),
				'edit_item'             => __('Edit Room', 'havnehotellet_i_halden'),
				'update_item'           => __('Update Room', 'havnehotellet_i_halden'),
				'view_item'             => __('View Room', 'havnehotellet_i_halden'),
				'view_items'            => __('View Rooms', 'havnehotellet_i_halden'),
				'search_items'          => __('Search Room', 'havnehotellet_i_halden'),
				'not_found'             => __('Not found', 'havnehotellet_i_halden'),
				'not_found_in_trash'    => __('Not found in Trash', 'havnehotellet_i_halden'),
				'featured_image'        => __('Featured Image', 'havnehotellet_i_halden'),
				'set_featured_image'    => __('Set featured image', 'havnehotellet_i_halden'),
				'remove_featured_image' => __('Remove featured image', 'havnehotellet_i_halden'),
				'use_featured_image'    => __('Use as featured image', 'havnehotellet_i_halden'),
				'insert_into_item'      => __('Insert into room', 'havnehotellet_i_halden'),
				'uploaded_to_this_item' => __('Uploaded to this room', 'havnehotellet_i_halden'),
				'items_list'            => __('Rooms list', 'havnehotellet_i_halden'),
				'items_list_navigation' => __('Rooms list navigation', 'havnehotellet_i_halden'),
				'filter_items_list'     => __('Filter rooms list', 'havnehotellet_i_halden'),
			);
			$rooms_args = array(
				'label'                 => __('Room', 'havnehotellet_i_halden'),
				'description'           => __('The hotel rooms', 'havnehotellet_i_halden'),
				'labels'                => $rooms_labels,
				'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
				'taxonomies'            => array('post_tag'),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 5,
				'menu_icon'             => '/wp-content/themes/havnehotellet-i-halden/icons/room.svg',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => true,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			);
			register_post_type('room', $rooms_args);

			$facilities_labels = array(
				'name'                  => _x('Facilities', 'Post Type General Name', 'havnehotellet_i_halden'),
				'singular_name'         => _x('Facility', 'Post Type Singular Name', 'havnehotellet_i_halden'),
				'menu_name'             => __('Facilities', 'havnehotellet_i_halden'),
				'name_admin_bar'        => __('Facility', 'havnehotellet_i_halden'),
				'archives'              => __('Facility Archives', 'havnehotellet_i_halden'),
				'attributes'            => __('Facility Attributes', 'havnehotellet_i_halden'),
				'parent_item_colon'     => __('Parent Facility:', 'havnehotellet_i_halden'),
				'all_items'             => __('All Facilities', 'havnehotellet_i_halden'),
				'add_new_item'          => __('Add New Facility', 'havnehotellet_i_halden'),
				'add_new'               => __('Add New', 'havnehotellet_i_halden'),
				'new_item'              => __('New Facility', 'havnehotellet_i_halden'),
				'edit_item'             => __('Edit Facility', 'havnehotellet_i_halden'),
				'update_item'           => __('Update Facility', 'havnehotellet_i_halden'),
				'view_item'             => __('View Facility', 'havnehotellet_i_halden'),
				'view_items'            => __('View Facilities', 'havnehotellet_i_halden'),
				'search_items'          => __('Search Facility', 'havnehotellet_i_halden'),
				'not_found'             => __('Not found', 'havnehotellet_i_halden'),
				'not_found_in_trash'    => __('Not found in Trash', 'havnehotellet_i_halden'),
				'featured_image'        => __('Featured Image', 'havnehotellet_i_halden'),
				'set_featured_image'    => __('Set featured image', 'havnehotellet_i_halden'),
				'remove_featured_image' => __('Remove featured image', 'havnehotellet_i_halden'),
				'use_featured_image'    => __('Use as featured image', 'havnehotellet_i_halden'),
				'insert_into_item'      => __('Insert into facility', 'havnehotellet_i_halden'),
				'uploaded_to_this_item' => __('Uploaded to this facility', 'havnehotellet_i_halden'),
				'items_list'            => __('Facilities list', 'havnehotellet_i_halden'),
				'items_list_navigation' => __('Facilities list navigation', 'havnehotellet_i_halden'),
				'filter_items_list'     => __('Filter facilities list', 'havnehotellet_i_halden'),
			);
			$facilities_args = array(
				'label'                 => __('Facility', 'havnehotellet_i_halden'),
				'description'           => __('The hotel facilities', 'havnehotellet_i_halden'),
				'labels'                => $facilities_labels,
				'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
				'taxonomies'            => array('post_tag'),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 5,
				'menu_icon'             => '/wp-content/themes/havnehotellet-i-halden/icons/facility.svg',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => true,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			);
			register_post_type('facility', $facilities_args);
		}
		add_action('init', 'custom_post_type', 0);
	}
endif;
add_action( 'after_setup_theme', 'havnehotellet_i_halden_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function havnehotellet_i_halden_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'havnehotellet_i_halden_content_width', 640 );
}
add_action( 'after_setup_theme', 'havnehotellet_i_halden_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function havnehotellet_i_halden_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'havnehotellet-i-halden' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'havnehotellet-i-halden' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Remove the styling for ".recentcomments a" in head
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action( 'widgets_init', 'havnehotellet_i_halden_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function havnehotellet_i_halden_scripts() {
	wp_enqueue_style( 'havnehotellet-i-halden-style', get_stylesheet_uri() );

	wp_enqueue_script( 'havnehotellet-i-halden-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'havnehotellet-i-halden-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'havnehotellet_i_halden_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

