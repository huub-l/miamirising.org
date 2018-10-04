<?php

namespace App\Controllers;

use Sober\Controller\Controller;

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
    public static function get_associated_groups() 
    {
      $groups = array ( );
      $groups_data = carbon_get_post_meta ( get_the_id (), 'groups' );
      foreach ( $groups_data as $group_data ) :
        $groups[] = array ( 
          'name' => get_the_title ( $group_data['id'] ),
          'permalink' => get_permalink ( $group_data['id'] )
        );
      endforeach;
      return $groups;
    }
}
