<?php

namespace App;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', function() {

    // Default options page
    $basic_options_container = Container::make( 'theme_options', 'Theme Settings' )
        ->add_fields( array (
            Field::make( 'header_scripts', 'crb_header_script' ),
            Field::make( 'footer_scripts', 'crb_footer_script' ),
        ));

    // Add second options page under 'Basic Options'
    Container::make( 'theme_options', 'Social Links' )
        ->set_page_parent( $basic_options_container ) // reference to a top level container
        ->add_fields( array (
            Field::make( 'text', 'crb_facebook_link' ),
            Field::make( 'text', 'crb_twitter_link' ),
        ));

    // Add third options page under "Appearance"
    Container::make( 'theme_options', 'Customize Background' )
        ->set_page_parent( 'themes.php' ) // identificator of the "Appearance" admin section
        ->add_fields( array (
            Field::make( 'color', 'crb_background_color' ),
            Field::make( 'image', 'crb_background_image' ),
        ));
      
      // Post associations
      Container::make( 'post_meta', 'Associated Groups' )
        ->where('post_type', '=', 'action')
        ->add_fields( array ( 
          Field::make( 'association', 'groups' )
            ->set_types( array (
              array (
                'type' => 'post',
                'post_type' => 'group'
              )
            ))
      ));
      Container::make( 'post_meta', 'Associated Groups' )
        ->where('post_type', '=', 'event')
        ->add_fields( array ( 
          Field::make( 'association', 'groups' )
            ->set_types( array (
              array (
                'type' => 'post',
                'post_type' => 'group'
              )
            ))
      ));
});

/**
 * Boot Carbon Fields
 */
add_action( 'after_setup_theme', function ( ) {
    \Carbon_Fields\Carbon_Fields::boot ( );
});