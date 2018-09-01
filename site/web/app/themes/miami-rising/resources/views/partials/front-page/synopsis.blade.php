<div class="block">
  <div class="page ui container">
    <div class="ui grid">
      <div class="row no gutter">
        <div class="sixteen wide mobile six wide computer column">
          <h2 class="block-header header">Join us in <span class="teal-highlight">Bayfront Park</span> on September 8th, 2018 for a special event that will <span class="teal-highlight">help define the future of our city</span></h2>
        </div>
        <div class="sixteen wide mobile ten wide computer column event">
          @php
            $eventpod = pods('event');
            $params = array(
              'limit' => 1
            );
            $eventpod->find($params);
            while( $eventpod->fetch() ) :
          @endphp
          <a class="ui violet label">
            Event
            <div class="detail">@php echo $eventpod->display( 'event_type' ); @endphp</div>
          </a>
          @php echo $eventpod->display( 'event_table.embed_full_layout_only_styles' ); @endphp
          @php endwhile; @endphp
      </div>
    </div>
  </div>
</div>
