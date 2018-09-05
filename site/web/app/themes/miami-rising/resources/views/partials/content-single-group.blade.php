  <div class="group single-group-view">
    @php
      $group = pods('group',get_the_ID());
    @endphp
    <div class="ui container">
      <div class="ui grid">
        <div class="sixteen wide mobile column single-event-content">
            <p>@php echo $group->display('group_description'); @endphp</p>
        </div>
      </div>
    </div>
  </div>
