
  @php
    $eventpod = pods('event');
    $params = array(
      'limit' => -1,
    );
    $eventpod->find($params);
    while( $eventpod->fetch() ) :
  @endphp
    <div class="single-event-content">
      <a class="ui violet label">
        Event
        <div class="detail">@php echo $eventpod->display( 'event_type' ); @endphp</div>
      </a>
      <h2 class="ui header">@php echo the_title(); @endphp
        <div class="sub header"><em>@php echo date( "F j, Y, g:i a", $eventpod->display( 'an_form.start_date' ) ); @endphp</em></div>
      </h2>
      @php echo $eventpod->display( 'an_form.description' ); @endphp
      <div class="listing-cta">
        <a href="@php echo the_permalink(); @endphp">
          <button class="ui large basic flavor button">R.S.V.P.</button>
        </a>
      </div>
    </div>
  @php endwhile; @endphp
