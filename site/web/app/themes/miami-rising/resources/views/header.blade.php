<div class="ui full width vertical inverted sidebar menu right">
  {!! App::semantic_navigation('branding_navigation') !!}
  {!! App::semantic_navigation('primary_navigation') !!}
</div>
<div class="ui inverted top large menu">
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
