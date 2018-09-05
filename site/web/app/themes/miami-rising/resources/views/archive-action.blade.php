@extends('layouts.app')

  @section('content')
    <div class="ui container">
      <div class="block">
        @if (!have_posts())
          <div class="alert alert-warning">
            {{ __('Sorry, no events could be found.', 'sage') }}
          </div>
        @endif

        @while (have_posts()) @php the_post() @endphp
          @include('partials.content-'.get_post_type())
        @endwhile

        {!! get_the_posts_navigation() !!}
      </div>
    </div>
  @endsection
