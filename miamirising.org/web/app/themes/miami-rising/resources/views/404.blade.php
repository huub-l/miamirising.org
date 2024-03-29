@extends('layouts.post')

  @section('content')
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
      </div>
      {!! get_search_form() !!}
    @endif
  @endsection
