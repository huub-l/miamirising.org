
<div class="banner-header groups-banner">
  <div class="ui container">
    <div class="ui grid">
      <div class="ui column">
        <h2 class="ui header">Groups</h2>
      </div>
    </div>
  </div>
</div>

<div class="block">
  <div class="ui container">
    <div class="ui sixteen wide column">
        <div class="ui three stackable link cards">
        @php
          $group = pods('group');
          $params = array(
            'limit' => 6
          );
          $group->find($params);
          while( $group->fetch() ) : @endphp
          <a class="ui card" href="@php echo get_the_permalink($group->field('id')); @endphp">
            <div class="image">
               <img src="@php echo get_the_post_thumbnail_url($group->field('id'), 'thumb'); @endphp" />
            </div>
            <div class="content">
              <div class="header">@php echo $group->field( 'title' ) @endphp</div>
              <div class="description">
                @php echo $group->field( 'group_description' ); @endphp
              </div>
            </div>
        </a>
        @php endwhile; @endphp
      </div>
    </div>
  </div>
</div>
