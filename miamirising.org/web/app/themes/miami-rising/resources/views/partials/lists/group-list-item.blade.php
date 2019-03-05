@foreach($groups as $list_item)
  <div class="ui item middle aligned">
    @if($list_item['group_logo'])
      <a class="ui middle aligned small  image" href="{!! $list_item['permalink'] !!}">
        <img src="{!! $list_item['group_logo'] !!}">
      </a>
    @elseif($list_item['thumbnail'])
    <a class="ui middle aligned small image" href="{!! $list_item['permalink'] !!}">
        <img src="{!! $list_item['thumbnail'] !!}">
      </a>
    @endif
    <div class="ui middle aligned content">
      <a class="header" href="{!! $list_item['permalink'] !!}">{{ $list_item['title'] }}</a>
      <div class="description">
        {{ $list_item['description'] }}
      </div>
    </div>
  </div>
@endforeach
