<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
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
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'branding_navigation' => __('Branding Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable Gutenberg wide-align
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'align-wide' );

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
        'name'          => __('[Front Page] After Actions Banner', 'sage'),
        'id'            => 'front-actions-banner-post'
    ] + $config);
    register_sidebar([
        'name'          => __('[Front Page] After Actions', 'sage'),
        'id'            => 'front-actions-post'
    ] + $config);
    register_sidebar([
        'name'          => __('[Front Page] After Groups Banner', 'sage'),
        'id'            => 'front-groups-banner-post'
    ] + $config);
    register_sidebar([
        'name'          => __('[Front Page] After Groups', 'sage'),
        'id'            => 'front-groups-post'
    ] + $config);
    register_sidebar([
        'name'          => __('[Front Page] Before Featured Event', 'sage'),
        'id'            => 'front-featured-event-pre'
    ] + $config);
    register_sidebar([
        'name'          => __('[Front Page] After Featured Event', 'sage'),
        'id'            => 'front-featured-event-post'
    ] + $config);
    register_sidebar([
        'name'          => __('[Front Page] Before Footer', 'sage'),
        'id'            => 'global-footer-pre'
    ] + $config);
    register_sidebar([
        'name'          => __('[Front Page] After Header', 'sage'),
        'id'            => 'global-header-post'
    ] + $config);
    register_sidebar([
        'name'          => __('[Global] After Navigation', 'sage'),
        'id'            => 'global-nav-post'
    ] + $config);
    register_sidebar([
        'name'          => __('[Global] Sidebar', 'sage'),
        'id'            => 'global-sidebar'
    ] + $config);
});

/**
 * Elementor
 * Theme Locations
 */
add_action( 'elementor/theme/register_locations',function($elementor_theme_manager) {
	$elementor_theme_manager->register_all_core_location();
	$elementor_theme_manager->register_location(
		'main-sidebar',
		[
			'label' => __( 'Primary Sidebar', 'sage' ),
			'multiple' => false,
			'edit_in_content' => true,
		]
	);
    $elementor_theme_manager->register_location(
		'front-featured-event-pre',
		[
			'label' => __( '[Front Page] Before Featured Event', 'sage' ),
			'multiple' => false,
			'edit_in_content' => false,
		]
    );
    $elementor_theme_manager->register_location(
		'front-featured-event-post',
		[
			'label' => __( '[Front Page] After Featured Event', 'sage' ),
			'multiple' => false,
			'edit_in_content' => false,
		]
    );
    $elementor_theme_manager->register_location(
		'front-actions-banner-post',
		[
			'label' => __( '[Front Page] After Actions Title', 'sage' ),
			'multiple' => false,
			'edit_in_content' => false,
		]
    );
    $elementor_theme_manager->register_location(
		'front-actions-post',
		[
			'label' => __( '[Front Page] After Actions', 'sage' ),
			'multiple' => false,
			'edit_in_content' => false,
		]
    );
    $elementor_theme_manager->register_location(
		'front-groups-banner-post',
		[
			'label' => __( '[Front Page] After Groups Title', 'sage' ),
			'multiple' => false,
			'edit_in_content' => false,
		]
    );
    $elementor_theme_manager->register_location(
		'front-groups-post',
		[
			'label' => __( '[Front Page] After Groups', 'sage' ),
			'multiple' => false,
			'edit_in_content' => false,
		]
    );
    $elementor_theme_manager->register_location(
		'global-nav-post',
		[
			'label' => __( '[Global] After Navigation', 'sage' ),
			'multiple' => false,
			'edit_in_content' => false,
		]
    );
    $elementor_theme_manager->register_location(
		'global-header-post',
		[
			'label' => __( '[Global] After Header', 'sage' ),
			'multiple' => false,
			'edit_in_content' => false,
		]
    );
    $elementor_theme_manager->register_location(
		'global-footer-pre',
		[
			'label' => __( '[Global] Before Footer', 'sage' ),
			'multiple' => false,
			'edit_in_content' => false,
		]
	);
});

/**
* Allow Pods Templates to use shortcodes
*
* NOTE: Will only work if the constant PODS_SHORTCODE_ALLOW_SUB_SHORTCODES is
* defined and set to true, which by default it IS NOT.
*/
add_filter( 'pods_shortcode', function( $tags )  {
    $tags[ 'shortcodes' ] = true;
    return $tags;
});

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

    // Add @ifempty for Loops
    sage('blade')->compiler()->directive('ifempty', function($expression)
    {
        return "<?php if(count$expression == 0): ?>";
    });

    // Add @endifempty for Loops
    sage('blade')->compiler()->directive('endifempty', function($expression)
    {
        return '<?php endif; ?>';
    });
});
