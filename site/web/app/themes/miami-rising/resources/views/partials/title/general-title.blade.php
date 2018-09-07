<div id='view-title'
     style='
          @php if(isset($background_image)) : @endphp
            background:url("{!! $background_image !!}") no-repeat;
          @php endif; @endphp
          @php if(isset($background_color)) : @endphp
            background-color:{!! $background_color !!}
          @php endif; @endphp
    ' class='has-background-dim wp-block-cover-image alignwide'>
  <h1 class='ui inverted header wp-block-cover-image-text'>
    {{ $title }}
  </h1>
</div>
