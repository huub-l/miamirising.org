<div class="sixteen wide mobile ten wide computer column single-event-content">
  <div class="action">
    @php
      $action = pods('action',get_the_ID());
    @endphp
        <a class="ui label">
          Take Action
          <div class="detail">@php echo $action->display('action_type'); @endphp</div>
        </a>
        @php the_content() @endphp
        @php echo $action->display( 'an_action.embed_full_layout_only_styles' ); @endphp
  </div>
</div>
