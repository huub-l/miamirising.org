
<div class="banner-header actions-banner">
  <div class="ui container">
    <div class="ui grid">
      <div class="ui column">
        <h2 class="ui header">Actions</h2>
      </div>
    </div>
  </div>
</div>

<div class="block">
  <div class="ui container">
    <div class="ui sixteen wide column">
        <div class="ui three stackable link cards">
        @php
          $action = pods('action');
          $params = array(
            'limit' => 1
          );
          $action->find($params);
          while( $action->fetch() ) : @endphp
          <a class="ui card" href="@php echo get_the_permalink($action->field( 'id ')) @endphp">
            <div class="image">
              <img src="@php echo get_the_post_thumbnail_url($action->field('id'), 'thumb'); @endphp" />
            </div>
            <div class="content">
              <div class="header">@php echo $action->field( 'title' ) @endphp</div>
              <div class="description">@php echo $action->field( 'excerpt' ); @endphp</div>
            </div>
          </a>
        @php endwhile; @endphp
      </div>
    </div>
  </div>
        </div>
