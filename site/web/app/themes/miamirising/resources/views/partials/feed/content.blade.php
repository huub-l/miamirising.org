<article @php post_class() @endphp>
  <header>
    <h1 class="entry-title title is-3">
      <a href="{{ get_the_permalink ( ) }}">{{ get_the_title() }}</a>
    </h1>
    <h2 class="entry-title subtitle is-5">@include ( 'partials.meta.entry-author' )</h2>
  </header>
</article>
