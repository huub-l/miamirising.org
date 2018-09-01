<h3 class="ui header sponsor">Sponsored by</h3>

@php
  $sponsor_ID = $eventpod->display('event_sponsors');
  $sponsor_params = array(
    'limit' => -1,
    'where' => "t.post_title = '$sponsor_ID'",
  );
  $sponsorpod = pods('groups',$sponsor_params);
  while ( $sponsorpod->fetch() ) :
@endphp

  <div class="ui segment">
    <img src="@php echo $sponsorpod->field('group_logo.guid'); @endphp" />
    <h4 class="ui header">
      @php echo $sponsorpod->display('post_title'); @endphp
      <div class="ui subheader">
        @php echo $sponsorpod->display('group_description'); @endphp
      </div>
    </h4>
    <a href="/@php echo $sponsorpod->display('post_type'); @endphp/@php echo $sponsorpod->display('post_name'); @endphp">
      <button class="ui teal button">
        Find out more about @php echo $sponsorpod->display('post_title'); @endphp
      </button>
    </a>
  </div>

@php endwhile; @endphp
