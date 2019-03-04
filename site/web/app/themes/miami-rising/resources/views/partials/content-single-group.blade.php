  <div class="group single-group-view">
    @php
      $group = pods('group',get_the_ID());
    @endphp
    <div class="ui single-group-heading container">
      <div class="ui center aligned grid">
        <div class="sixteen wide mobile centered column">
            @php $logo = pods_image_url($group->field('group_logo'),null); @endphp
            @if(isset($logo))
              <span class="group logo"><img src="@php echo $logo; @endphp" /></span>
            @endif
            <h1 class="ui highlight centered">@php echo $group->display('title'); @endphp</h1>
            <p><span class="highlight">@php echo strip_tags($group->display('group_description')); @endphp</span></p>
        </div>
      </div>
    </div>
    @php
    $associated_posts = $group->field('group_posts');
    if($associated_posts) :
      foreach ($associated_posts as $single_post) : @endphp
        <div class="ui single-group-feed container">
          <div class="ui grid">
            <div class="entry-content">
              <h2 class='the-title'>@php echo get_the_title($single_post['ID']) @endphp</h2>
              @php
                echo apply_filters('the_content',get_post_field('post_content', $single_post['ID']))
              @endphp
          </div>
        </div>
      @endforeach
    @endif
  </div>
