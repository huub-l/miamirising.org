@php elementor_theme_do_location( 'sidebar-a' );
@include('partials.front-page.featured-event', [
              'teaser'  => $featured_event['teaser'],
              'form'    => $featured_event['form'],
              'type'    => $featured_event['type']
          ])
