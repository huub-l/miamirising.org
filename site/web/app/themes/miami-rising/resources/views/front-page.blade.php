@extends('layouts.front')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-front')
  @endwhile
@endsection
