<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

use Carbon_Fields;
use Carbon_Fields\Container as Carbon;
use Carbon_Fields\Field;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_style('sage/swiper.css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css', false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Register custom post types
 */
add_action( 'after_setup_theme', function() {

	$labels = array(
		'name' => __( 'Actions', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Action', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Actions', 'textdomain' ),
		'name_admin_bar' => __( 'Action', 'textdomain' ),
		'archives' => __( 'Action Archives', 'textdomain' ),
		'attributes' => __( 'Action Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Action:', 'textdomain' ),
		'all_items' => __( 'All Actions', 'textdomain' ),
		'add_new_item' => __( 'Add New Action', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Action', 'textdomain' ),
		'edit_item' => __( 'Edit Action', 'textdomain' ),
		'update_item' => __( 'Update Action', 'textdomain' ),
		'view_item' => __( 'View Action', 'textdomain' ),
		'view_items' => __( 'View Actions', 'textdomain' ),
		'search_items' => __( 'Search Action', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Action', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Action', 'textdomain' ),
		'items_list' => __( 'Actions list', 'textdomain' ),
		'items_list_navigation' => __( 'Actions list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Actions list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Action', 'textdomain' ),
		'description' => __( 'Advocacy opportunities', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-megaphone',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies' => array('group', ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'action', $args );

}, 0 );

add_action( 'after_setup_theme', function() {

	$labels = array(
		'name' => __( 'Events', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Event', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Events', 'textdomain' ),
		'name_admin_bar' => __( 'Event', 'textdomain' ),
		'archives' => __( 'Event Archives', 'textdomain' ),
		'attributes' => __( 'Event Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Event:', 'textdomain' ),
		'all_items' => __( 'All Events', 'textdomain' ),
		'add_new_item' => __( 'Add New Event', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Event', 'textdomain' ),
		'edit_item' => __( 'Edit Event', 'textdomain' ),
		'update_item' => __( 'Update Event', 'textdomain' ),
		'view_item' => __( 'View Event', 'textdomain' ),
		'view_items' => __( 'View Events', 'textdomain' ),
		'search_items' => __( 'Search Event', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Event', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Event', 'textdomain' ),
		'items_list' => __( 'Events list', 'textdomain' ),
		'items_list_navigation' => __( 'Events list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Events list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Event', 'textdomain' ),
		'description' => __( 'Advocacy opportunities', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-tickets-alt',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies' => array('group', ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'event', $args );

}, 0 );

add_action( 'after_setup_theme', function() {

	$labels = array(
		'name' => __( 'Groups', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Group', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Groups', 'textdomain' ),
		'name_admin_bar' => __( 'Group', 'textdomain' ),
		'archives' => __( 'Group Archives', 'textdomain' ),
		'attributes' => __( 'Group Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Group:', 'textdomain' ),
		'all_items' => __( 'All Groups', 'textdomain' ),
		'add_new_item' => __( 'Add New Group', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Group', 'textdomain' ),
		'edit_item' => __( 'Edit Group', 'textdomain' ),
		'update_item' => __( 'Update Group', 'textdomain' ),
		'view_item' => __( 'View Group', 'textdomain' ),
		'view_items' => __( 'View Groups', 'textdomain' ),
		'search_items' => __( 'Search Group', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Group', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Group', 'textdomain' ),
		'items_list' => __( 'Groups list', 'textdomain' ),
		'items_list_navigation' => __( 'Groups list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Groups list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Group', 'textdomain' ),
		'description' => __( 'Advocacy opportunities', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-groups',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies' => array('group', ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'group', $args );

}, 0 );

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});
