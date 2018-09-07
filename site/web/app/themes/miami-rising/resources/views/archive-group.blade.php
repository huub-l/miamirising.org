@extends('layouts.group')

  @section('content')
    <div class="ui container">
      <div class="ui relaxed items">
          @while(have_posts()) @php the_post() @endphp
            @include('partials.content-'.get_post_type())
          @endwhile
          {!! get_the_posts_navigation() !!}
      </div>
    </div>
  @endsection
