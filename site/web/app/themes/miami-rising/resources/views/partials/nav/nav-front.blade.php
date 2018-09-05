<div class="ui vertical inverted sidebar menu right">
  <a href="/" class="item">@svg('miami-rising-horizontal-white')</a>
  {!! App::semantic_navigation('branding_navigation') !!}
  {!! App::semantic_navigation('primary_navigation') !!}
</div>
<div class="ui inverted top fixed large menu hidden transition">
  <a href="/" class="item">@svg('miami-rising-horizontal-white')</a>
  {!! App::semantic_navigation('branding_navigation') !!}
  <div class="right menu">
    <div class="item">
      <div class="ui transparent icon input">
        {!! App::semantic_navigation('primary_navigation') !!}
        <a id="hamburger" class="toc item">
          Mobile
        </a>
      </div>
    </div>
  </div>
</div>
