@php if(isset($background_image)) $background = 'url("$background_image"' @endphp
@php else $background = 'rgb(82, 93, 220' @endphp

<div id='view-title' style='background:@php echo $background @endphp );' class='wp-block-cover-image has-background-dim alignwide'>
  <h1 class='ui inverted header wp-block-cover-image-text'>
    {{ $title }}
  </h1>

</div>
