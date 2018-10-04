<article @php post_class() @endphp>
  <header>
    <h1 class="entry-title title is-3">
      <a href="{{ get_the_permalink ( ) }}">{{ get_the_title() }}</a>
    </h1>
    @unless ( !$groups )
      <h2 class="entry-title title is-4">Sponsored by:</h2>
      @php foreach ( $groups as $group ) : @endphp
        @include ( 'partials.meta.entry-associated-group' )
      @php endforeach; @endphp
    @endunless
  </header>
</article>
