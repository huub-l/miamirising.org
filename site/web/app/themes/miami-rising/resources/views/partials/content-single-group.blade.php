  <div class="group single-group-view">
    @php
      $group = pods('group',get_the_ID());
    @endphp
    <div class="ui single-group-heading container">
      <div class="ui center aligned grid">
        <div class="sixteen wide mobile centered column single-event-content">
            @php $logo = pods_image_url($group->field('group_logo'),null); @endphp
            @if(isset($logo))
              <p class="group logo"><img src="@php echo $logo; @endphp" /></p>
            @endif
            <h1 class="ui highlight centered">@php echo $group->display('title'); @endphp</h1>
            <p>@php echo $group->display('group_description'); @endphp</p>
            <a href="@php echo $group->display(the_permalink()); @endphp" class="website-button">
              <div class='ui large button'>Website</div>
            </a>
        </div>
      </div>
    </div>
    @php
      $associated_posts = $group->field('group_posts');
      if($associated_posts) :
        foreach ($associated_posts as $single_post) : @endphp

    <div class="ui container">
      <div class="ui grid">
        <div class="sixteen wide mobile centered column single-event-content">
          <div class="entry-content">
            <h2 class='teal-highlight--wrapping'>@php echo get_the_title($single_post['ID']) @endphp</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="ui container">
      <div class="entry-content">
        @php
        echo get_post_field('post_content', $single_post['ID'])
        @endphp
      </div>
    </div>
    @endforeach
    @endif
  </div>
