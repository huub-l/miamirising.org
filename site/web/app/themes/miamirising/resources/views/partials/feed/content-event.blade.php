<article @php post_class() @endphp>
  <header class="content is-medium">
    <h1 class="entry-title title is-2">
      <a href="{{ get_the_permalink ( ) }}">{{ get_the_title ( ) }}</a>
    </h1>
    @isset ( $groups )
      <h2 class="entry-title title is-4">Sponsored by:</h2>
      @php foreach ( $groups as $group ) : @endphp
        @include ( 'partials.meta.entry-associated-group' )
      @php endforeach; @endphp
    @endisset
  </header>
</article>
