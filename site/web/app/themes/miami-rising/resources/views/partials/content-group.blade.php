@php
  $groups = pods(null,array('limit' => -1));
  $groups->fetch(get_the_ID());
  $group = (object) array(
    'name'        => $groups->field('title'),
    'description' => $groups->field('group_description'),
    'logo'        => pods_image_url($groups->field('group_logo'),null),
  );
@endphp

<div class="ui item middle aligned">
  @if($group->logo)
    <a class="ui middle aligned small image" href="@php echo get_the_permalink(); @endphp">
      <img src="@php echo $group->logo; @endphp">
    </a>
  @endif
  @if($group->name && $group->description)
    <div class="ui middle aligned content">
      <div class="description">
        @php echo $group->description; @endphp
      </div>
    </div>
  @endif
</div>
