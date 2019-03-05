
  <h2 class="ui header">Events</h2>
  <div class="ui relaxed divided items">
  @php
    $events = $group->field('group_events');
      foreach ($events as $event) :
        $event_params = array(
          'limit' => -1,
          'where' => "t.id = '". $event['ID'] ."'",
        );
        $eventpod = pods('an_event', $event_params);
        while ( $eventpod->fetch() ) :
      @endphp
        <a href="/events/@php echo $event['ID']; @endphp">
          <p>@php echo $eventpod->display('an_form.title'); @endphp</p>
        </a>
        @php endwhile; @endphp
      @php endforeach; @endphp
</div>
