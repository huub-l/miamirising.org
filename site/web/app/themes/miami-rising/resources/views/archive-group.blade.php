@extends('layouts.app')
  @section('content')
    <div class="ui container">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no groups could be found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif
    <div class="ui relaxed divided items">
      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type())
      @endwhile
    </div>
    {!! get_the_posts_navigation() !!}
  </div>
  @endsection
