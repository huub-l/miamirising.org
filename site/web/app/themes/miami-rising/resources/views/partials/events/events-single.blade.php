<div class="sixteen wide mobile ten wide computer column">
  <div class="event">
    <a class="ui violet label">
      Event
      <div class="detail">Concert and rally</div>
    </a>
    @php
      $eventpod = pods('event');
      $params = array(
        'limit' => 1,
      );
      $eventpod->find($params);
      while( $eventpod->fetch() ) :
        $title = $eventpod->display('title');
        $event_uri = $eventpod->field('event_uri')
    @endphp
        <link href='https://actionnetwork.org/css/style-embed-whitelabel-v3.css' rel='stylesheet' type='text/css' />
        <script src='https://actionnetwork.org/widgets/v3/event/@php echo $event_uri @endphp?format=js&source=widget&style=full'></script>
        <div id='can-event-area-@php echo $event_uri @endphp' style='width: 100%'></div>
    @php endwhile; @endphp
  </div>
</div>
