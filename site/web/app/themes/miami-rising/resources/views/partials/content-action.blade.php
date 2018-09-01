<div class="action-list-entry">
  @php
    $actionpod = pods('action');
    $params = array(
      'limit' => -1,
    );
    $actionpod->find($params);
    while( $actionpod->fetch() ) :
  @endphp
    <a class="ui red label">
      Action
    </a>
    <h1 class="ui header">@php echo the_title(); @endphp
      <div class="sub header"><em>@php echo date( "F j, Y, g:i a", $actionpod->display( 'action_table.start_date' ) ); @endphp</em></div>
    </h1>
    @php echo $actionpod->display( 'action_table.description' ); @endphp
    <div class="listing-cta">
      <a href="@php echo the_permalink(); @endphp">
        <button class="ui large violet basic button">Take Action</button>
      </a>
    </div>
  @php endwhile; @endphp
</div>
