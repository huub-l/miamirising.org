@include('partials.global.banner',['title' => 'groups'])
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
@endif
