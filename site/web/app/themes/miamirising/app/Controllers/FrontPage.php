<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class FrontPage extends Controller
{
  
  public function get_recent_posts ( ) 
  {
    $args = array (
	    	'post_type' => 'post',
	    	'orderby'	=> 'date',
	    	'posts_per_page' => 3,
	  );
    return new WP_Query ( $args ) ; 
  }

  public function get_recent_actions ( )
  {
    $args = array (
      'post_type' => 'action',
      'orderby' => 'date',
      'posts_per_page' => 4,
    );
    return new WP_Query ( $args );
  }

  public function get_recent_events ( )
  {
    $args = array (
      'post_type' => 'event',
      'orderby' => 'date',
      'posts_per_page' => 4,
    );
    return new WP_Query ( $args );
  }

  public function get_groups ( )
  {
    $args = array (
      'post_type' => 'group',
      'orderby' => 'date',
      'post_per_page' => -1,
      'limit' => -1,
    );
    return new WP_Query ( $args );
  }

}
