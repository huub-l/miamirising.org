@extends('layouts.app')

@section ( 'intro' )
  @while( have_posts ( ) ) @php the_post() @endphp
    <div class="section intro">
      <div class="container">
        <div class="columns">
          <div class="column is-two-fifths">
            <h2 class="title is-2 highlight-simple">@php the_title ( ) @endphp</h2>
          </div>
          <div class="column">
            <div class="content is-medium">
              @php the_excerpt ( ) @endphp
            </div>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            @php the_content ( ) @endphp
          </div>
        </div>
      </div>
    </div>
  @endwhile
  @php wp_reset_postdata() @endphp
  <div class="columns">
    <div class="column">
      <div class="swiper-container">
        <div class="swiper-wrapper is-block">
          @while ( $get_groups->have_posts () ) @php $get_groups->the_post() @endphp
            @unless ( ! get_the_post_thumbnail_url() )
              @include ( 'partials.components.slide', array ( 'image' => get_the_post_thumbnail_url() ) )
            @endunless
          @endwhile
          @php wp_reset_postdata() @endphp
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </div>
@endsection

@section( 'events' )
  <div class="section-backplate section-backplate-events">
    <div class="section events">
      <div class="container">
        <div class="columns">
          <div class="column is-two-fifths"><h2 class="title is-2 highlight-primary">Upcoming Area Events</h2></div>
          <div class="column">
            <div class="content is-medium">
              @while ( $get_recent_events->have_posts () ) @php $get_recent_events->the_post () @endphp
                @include ( 'partials.feed.content-event', array ( 'groups' => App::get_associated_groups () ) )
              @endwhile
              {!! get_the_posts_navigation () !!}
              @if ( $get_recent_actions->have_posts () == null )
                <div class="alert alert-warning">
                  {{ __( 'Sorry, no results were found.', 'sage' ) }}
                </div>
                {!! get_search_form ( false ) !!}
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section ( 'posts' )
  <div class="section news">
    <div class="container">
      <div class="columns">
        <div class="column is-two-fifths"><h2 class="title is-2 highlight-black">News</h2></div>
        <div class="column">
          @while ( $get_recent_posts->have_posts () ) @php $get_recent_posts->the_post ( ) @endphp
            @include( 'partials.feed.content' )
          @endwhile
          {!! get_the_posts_navigation() !!}
          @if ( $get_recent_actions->have_posts() == null )
            <div class="alert alert-warning">
              {{ __( 'Sorry, no results were found.', 'sage' ) }}
            </div>
            {!! get_search_form ( false ) !!}
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection

@section( 'actions' )
  <div class="section actions">
    <div class="container">
      <div class="columns">
        <div class="column is-two-fifths"><h2 class="title is-2 highlight-tertiary">Actions @php echo $get_recent_actions->get_post_type () @endphp</h2></div>
        <div class="column">
          @while ( $get_recent_actions->have_posts () ) @php $get_recent_actions->the_post ( ) @endphp
            @include( 'partials.feed.content-action', array ( 'groups' => App::get_associated_groups () ) )
          @endwhile
          {!! get_the_posts_navigation() !!}
          @if ( $get_recent_actions->have_posts() == null )
            <div class="alert alert-warning">
              {{ __( 'Sorry, no results were found.', 'sage' ) }}
            </div>
            {!! get_search_form(false) !!}
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection