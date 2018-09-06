@extends('layouts.group')
@section('content')
  <div class="ui container">
  <div class="middle aligned grid ui">
    <div class="sixteen column">
      @include('partials.lists.group-list',
              ['groups' => $groups])
    </div>
  </div>
@endsection
