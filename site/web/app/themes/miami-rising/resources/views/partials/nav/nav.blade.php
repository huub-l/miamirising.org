<div class="ui vertical inverted sidebar menu right">
  <a href="/" class="item">@svg('miami-rising-horizontal-white')</a>
  {!! App::semantic_navigation('branding_navigation') !!}
  {!! App::semantic_navigation('primary_navigation') !!}
</div>
<div class="ui inverted top menu">
  <a href="/" class="item">@svg('miami-rising-horizontal-white')</a>
  {!! App::semantic_navigation('branding_navigation') !!}
  <div class="right menu">
    <div class="item">
      <div class="ui transparent icon input">
        {!! App::semantic_navigation('primary_navigation') !!}
        <a id="hamburger" class="toc item">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g class="nc-icon-wrapper" stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" fill="#111111" stroke="#111111"><circle fill="none" stroke="#111111" stroke-miterlimit="10" cx="4" cy="16" r="3"></circle> <circle data-color="color-2" fill="none" stroke-miterlimit="10" cx="16" cy="16" r="3"></circle> <circle fill="none" stroke="#111111" stroke-miterlimit="10" cx="28" cy="16" r="3"></circle></g></svg>
        </a>
      </div>
    </div>
  </div>
</div>
@include('partials.elementor.global.nav-post')
