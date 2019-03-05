@foreach($groups as $card)
  <a class="ui card" href="{!! $card['permalink'] !!}">
    @if($card['group_logo'])
      <div class="image">
        <img src="{!! $card['group_logo'] !!}" />
      </div>
    @elseif($card['thumbnail'])
      <div class="image">
        <img src="{!! $card['thumbnail'] !!}" />
      </div>
    @endif
    <div class="content">
      <div class="header">{{ $card['title'] }}</div>
      <div class="description">
        {{ $card['description'] }}
      </div>
    </div>
  </a>
@endforeach
