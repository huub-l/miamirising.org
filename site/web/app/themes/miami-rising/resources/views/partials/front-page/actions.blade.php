@include('partials.global.banner',['title' => 'Take Action with Miami Rising'])
@php dynamic_sidebar('front-actions-banner-post') @endphp
@if($actions)
<div class="block">
  <div class="ui container">
    <div class="ui sixteen wide column">
      <div class="ui three stackable link cards">
        @foreach($actions as $card)
          @include('partials.front-page.action-card',['card' => $card])
        @endforeach
      </div>
    </div>
  </div>
</div>
@php dynamic_sidebar('front-actions-post') @endphp
@endif
