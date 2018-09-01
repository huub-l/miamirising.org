<div class="event-list-entry">
  @php
    $eventpod = pods('event');
    $params = array(
      'limit' => -1,
    );
    $eventpod->find($params);
    while( $eventpod->fetch() ) :
  @endphp
    <a class="ui violet label">
      Event
      <div class="detail">@php echo $eventpod->display( 'event_type' ); @endphp</div>
    </a>
    <h1 class="ui header">@php echo the_title(); @endphp
      <div class="sub header"><em>@php echo date( "F j, Y, g:i a", $eventpod->display( 'event_table.start_date' ) ); @endphp</em></div>
    </h1>
    @php echo $eventpod->display( 'event_table.description' ); @endphp
    <div class="listing-cta">
      <a href="@php echo the_permalink(); @endphp">
        <button class="ui large violet basic button">R.S.V.P.</button>
      </a>
    </div>
  @php endwhile; @endphp
</div>
