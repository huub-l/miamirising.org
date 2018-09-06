@extends('layouts.group')
@section('content')
  <div class="ui container">
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-single-'.get_post_type())
    @endwhile
  </div>
@endsection
