@include('partials.global.banner',['title' => 'Sponsored By'])
@php dynamic_sidebar('front-groups-banner-post') @endphp
@if($groups)
<div class="block">
  <div class="ui container">
    <div class="ui sixteen wide column">
      <div class="ui three stackable link cards">
        @include('partials.front-page.group-card',['groups' => $groups])
      </div>
    </div>
  </div>
</div>
@php dynamic_sidebar('front-groups-post') @endphp
@endif
