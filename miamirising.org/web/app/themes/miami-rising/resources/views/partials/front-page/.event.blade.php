
<div class="banner-header events">
  <div class="ui container">
    <div class="ui grid">
      <div class="ui column">
        <h2 class="ui header">Events</h2>
      </div>
    </div>
  </div>
</div>

<div class="block card-listing">
  <div class="ui container">
    <div class="ui sixteen wide column">
      <div class="ui cards">
        <div class="ui stackable raised card">
          <div class="image">
              <img src="@php echo get_the_post_thumbnail_url($action->field('id'), 'thumb'); @endphp" />
          </div>
          <div class="content">
            <a class="header">@php echo $actions->field( 'title' ) @endphp</a>
            <div class="description">@php echo $actions->field( 'excerpt' ); @endphp</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
