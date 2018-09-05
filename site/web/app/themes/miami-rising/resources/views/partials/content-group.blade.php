  <div class="ui item group">
    @php
      $group = pods('group',get_the_ID());
    @endphp
    <div class="ui single-group-content">
      <h2 class="ui header">
        @php echo the_title() @endphp
      </h2>
      <div class="meta">
          <p>@php echo $group->display( 'group_description' ); @endphp</p>
      </div>
          <div class="listing-cta">
            <a href="@php echo $group->display('group_website'); @endphp">
              <button class="ui huge basic flavor button">View Website</button>
            </a>
          </div>
          <div class="listing-cta">
            <a href="@php echo $group->display('group_donation_link'); @endphp">
              <button class="ui huge flavor button">Donate</button>
            </a>
          </div>
      </div>
</div>
