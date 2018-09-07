<a class="ui card" href="{!! $card['permalink'] !!}">
  <div class="image">
    <img src="{!! $card['thumbnail'] !!}" />
  </div>
  <div class="content">
    <div class="header">{{ $card['title'] }}</div>
    <div class="description">{{ $card['description'] }}</div>
  </div>
</a>

