<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    if (is_front_page()) {
        $classes[] = basename('front-page');
    }

    if (is_post_type_archive('events')) {
        $classes[] = basename('all-events');
    }

    if (is_post_type_archive('groups')) {
        $classes[] = basename('all-groups');
    }

    /** Add a global class to everything.
     *  We want it to come first, so stuff its filter does can be overridden.
     */
    array_unshift($classes, 'app');

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});


/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

/**
 * Render WordPress searchform using Blade
 */
add_filter('get_search_form', function () {
    return template('partials.searchform');
});

/**
 * Collect data for searchform.
 */
add_filter('sage/template/app/data', function ($data) {
    return $data + [
        'sf_action' => esc_url(home_url('/')),
        'sf_screen_reader_text' => _x('Search for:', 'label', 'sage'),
        'sf_placeholder' => esc_attr_x('Search &hellip;', 'placeholder', 'sage'),
        'sf_current_query' => get_search_query(),
        'sf_submit_text' => esc_attr_x('Search', 'submit button', 'sage'),
    ];
});

add_filter('sage/template/app/data', function (array $data) {
    $params = array(
        'limit' => 1,
        'where' => 't.post_status = "Publish"',
    );
    $event_data = pods('event', $params);
    while( $event_data->fetch() ) {
        $data['featured_event']['teaser'] = $event_data->field('event_teaser');
        $data['featured_event']['type']   = $event_data->field('type');
        $data['featured_event']['form']   = $event_data->field('an_form.embed_full_layout_only_styles');
    }
    return $data;
});

add_filter('sage/template/app/data', function (array $data) {

    $params = array(
        'limit' => -1,
        'where' => 't.post_status = "Publish"',
    );
    $group_data = pods('group', $params);

    while( $group_data->fetch() ) {
        $logo = $group_data->field('group_logo');
        $data['groups'][] = array(
                'title'       => $group_data->field('title'),
                'description' => $group_data->field('group_description'),
                'group_logo'  => pods_image_url($group_data->field('group_logo'),null),
                'thumbnail'   => get_the_post_thumbnail_url($group_data->field('id'),'thumb'),
                'permalink'   => get_the_permalink($group_data->field('id')),
        );
    }
    return $data;
});

add_filter('sage/template/app/data', function (array $data) {

    $params = array(
        'limit' => -1,
        'where' => 't.post_status = "Publish"',
    );
    $action_data = pods('action', $params);

    while( $action_data->fetch() ) {
        $data['actions'][] = array(
                'title'       => $action_data->field('title'),
                'description' => $action_data->field('action_description'),
                'type'        => $action_data->field('action_type'),
                'thumbnail'   => get_the_post_thumbnail_url($action_data->field('id'),'thumb'),
                'permalink'   => get_the_permalink($action_data->field('id')),
        );
    }
    return $data;
});

/**
 * Blade SVG for Sage
 * https://github.com/Log1x/blade-svg-sage
 */
add_filter('bladesvg_spritesheet_path', function () {
    return \BladeSvgSage\get_dist_path('images/svg');
});
add_filter('bladesvg_image_path', function () {
    return \BladeSvgSage\get_dist_path('images/svg');
});
add_filter('bladesvg_inline', function () {
    return true;
});
add_filter('bladesvg_class', function () {
    return 'svg';
});
add_filter('bladesvg_sprite_prefix', function () {
    return '';
});
