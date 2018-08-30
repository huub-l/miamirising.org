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
        $output .= sprintf( "\n<a class='item%s' href='%s'>%s</a>\n",
            ( $item->object_id == get_the_ID() ) ? ' active' : '',
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

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
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

    public static function semantic_navigation()
    {
        return wp_nav_menu([
            'theme_location'  => 'primary_navigation',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'depth'           => 0,
            'menu_id'         => '',
            'menu_class'      => '',
            'items_wrap'      => '<div class="ui container">%3$s</div>',
            'echo'            => false,
            'walker'          => new Semantic_Walker()
          ]);
    }

}
