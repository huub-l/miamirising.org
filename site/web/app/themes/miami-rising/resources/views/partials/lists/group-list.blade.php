@if($groups)
<div class="ui very relaxed items">
  @include('partials.lists.group-list-item',['groups' => $groups])
</div>
@endif
