<div class="action-list-entry action">
  @php
    $actionpod = pods('action');
    $params = array(
      'limit' => -1,
    );
    $actionpod->find($params);
    while( $actionpod->fetch() ) :
  @endphp
    <a class="ui label">
      Action
      <div class="detail">@php echo $actionpod->display( 'action_type' ) @endphp</div>
    </a>
    <h2 class="ui header">@php echo the_title(); @endphp
      <div class="sub header">@php echo the_excerpt(); @endphp</div>
    </h2>
    @php echo $actionpod->display( 'action_id.description' ); @endphp
    <div class="listing-cta">
      <a href="@php echo the_permalink(); @endphp">
        <button class="ui large basic button">Take Action</button>
      </a>
    </div>
  @php endwhile; @endphp
</div>
