@extends('layouts.template')

  @section('content')
    <div class="ui container">
      @while(have_posts()) @php the_post() @endphp
        @php the_content() @endphp
      @endwhile
    </div>
  @endsection
