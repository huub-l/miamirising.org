
  <h3 class="ui header sponsor">Sponsored by</h3>
  <div class="ui relaxed divided items">
  @php
    $associated_groups = $event->field('associated_groups');
      foreach ($associated_groups as $current_group) :
        $group_params = array(
          'limit' => -1,
          'where' => "t.id = '". $current_group['ID'] ."'",
        );
        $group_display = pods('group', $group_params);
        while ( $group_display->fetch() ) :
  @endphp
  <div class="item">
    <div class="ui mini circular image">
      <img src="@php echo $grouppod->display('group_logo'); @endphp">
    </div>
    <div class="content">
      <div class="header">@php echo $group_display->display('post_title'); @endphp</div>
      <div class="meta">
        <a>@php echo $group_display->display('group_description'); @endphp</a>
      </div>
      <!-- <a href="/@php echo $grouppod->display('post_type'); @endphp/@php echo $grouppod->display('post_name'); @endphp">
        <div class="ui right floated teal button">
          Explore @php echo $grouppod->display('post_title'); @endphp's work
        </div>
        </a> -->
    </div>
  </div>

@php endwhile; @endphp
@php endforeach; @endphp
</div>
