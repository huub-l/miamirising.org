<article @php post_class() @endphp>
  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column">
          <div class="entry-content content">
            @php the_content() @endphp
          </div>
          <footer>
            {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
          </footer>
        </div>
      </div>
    </div>
  </section>
</article>
