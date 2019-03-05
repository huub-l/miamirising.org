@php
    $actionpod = pods('action');
    $params = array(
      'limit' => -1,
      'where' => 't.post_status = "Publish"',
    );
    $actionpod->find($params);
    while( $actionpod->fetch() ) :
@endphp
  <div class="action-list-entry action">
    <a class="ui label">
      Action
      <div class="detail">@php $actionpod->display( 'action_type' ) @endphp</div>
    </a>
    <h2 class="ui header">@php the_title(); @endphp
      <div class="sub header">@php the_excerpt(); @endphp</div>
    </h2>
    @php $actionpod->display( 'action_id.description' ); @endphp
    <div class="listing-cta">
      <a href="@php echo the_permalink(); @endphp">
        <button class="ui large basic button">Take Action</button>
      </a>
    </div>
  </div>
@php endwhile; @endphp
