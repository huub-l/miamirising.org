@php dynamic_sidebar('front-featured-event-pre') @endphp
<div class="block">
  <div class="page ui container">
    <div class="ui two column grid">
      <div class="row no gutter">
        <div class="sixteen wide mobile six wide computer column">
          {!! $teaser !!}
        </div>
        <div class="sixteen wide mobile ten wide computer column event">
          <a class="ui violet label">
            Event <div class="detail">{!! $type !!}</div>
          </a>
          {!! $form !!}
        </div>
      </div>
    </div>
  </div>
</div>
@php dynamic_sidebar('front-featured-event-post') @endphp
