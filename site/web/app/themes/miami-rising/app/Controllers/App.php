<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Semantic_Walker extends \Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n<div class=\"ui container\">\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "</div>\n";
    }
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $post;
        $active = ( $item->object_id == get_the_ID() ||
                    ( is_post_type_archive('group') && $item->url == get_post_type_archive_link('group') ) ||
                    ( is_post_type_archive('action') && $item->url == get_post_type_archive_link('action') ) ||
                    ( is_post_type_archive('event') && $item->url == get_post_type_archive_link('event') ) ||
                    $item->url == get_post_type_archive_link($post->post_type) ) ? ' active' : '';
        $output .= sprintf( "\n<a class='item%s' href='%s'>%s</a>\n",
            $active,
            $item->url,
            $item->title
        );
    }
}

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function post_title_block()
    {
        $featured_image_url = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
        $title = get_the_title();
        echo "<div id='view-title' style='background-image: url(". $featured_image_url .");'
                 class='wp-block-cover-image has-background-dim alignwide'>
                    <h1 class='ui inverted header wp-block-cover-image-text'>
                        $title
                    </h1>
                </div>";
    }

    public static function page_title_block()
    {
        $featured_image_url = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
        $title = get_the_title();
        echo "  <div id='view-title' style='background-image: url(". $featured_image_url .");'
                 class='wp-block-cover-image has-background-dim alignwide'>
                    <h1 class='ui inverted header wp-block-cover-image-text'>
                        $title
                    </h1>
                </div>";
    }


    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_post_type_archive('event')) {
            return "Miami Area Events";
        }
        if (is_post_type_archive('group')) {
            return "The Coalition";
        }
        if (is_post_type_archive('action')) {
            return "Take Action";
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function subtitle()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_post_type_archive('event')) {
            return "Show solidarity, make a ruckus, and have a good time.";
        }
        if (is_post_type_archive('group')) {
            return "It's going to take all of us";
        }
        if (is_post_type_archive('action')) {
            return "It's time we demanded a better way";
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        return '';
    }

    public static function all_events()
    {
        $eventpod = pods('an_event');
        $params = array(
            'limit' => -1,
        );
        return $eventpod->find($params);
    }

    public static function semantic_navigation($navigation = 'primary_navigation')
    {
        if($navigation=='branding_navigation') {
            return wp_nav_menu([
                'theme_location'  => 'branding_navigation',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'depth'           => 0,
                'menu_id'         => '',
                'menu_class'      => '',
                'items_wrap'      => '%3$s',
                'echo'            => false,
                'walker'          => new Semantic_Walker()
              ]);
        }
        if($navigation=='primary_navigation') {
            return wp_nav_menu([
                'theme_location'  => 'primary_navigation',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'depth'           => 0,
                'menu_id'         => '',
                'menu_class'      => '',
                'items_wrap'      => '%3$s',
                'echo'            => false,
                'walker'          => new Semantic_Walker()
            ]);
        }
    }

}
