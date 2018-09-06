@include('partials.global.banner',['title' => 'Take Action with Miami Rising'])
@if($actions)
<div class="block">
  <div class="ui container">
    <div class="ui sixteen wide column">
      <div class="ui three stackable link cards">
        @include('partials.front-page.action-card',['actions' => $actions])
      </div>
    </div>
  </div>
</div>
@endif
