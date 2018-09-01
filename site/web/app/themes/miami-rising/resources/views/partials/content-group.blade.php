<div class="group-list-entry">
  @php
    $grouppod = pods('groups');
    $params = array(
      'limit' => -1,
    );
    $grouppod->find($params);
    while( $grouppod->fetch() ) :
  @endphp
    <a class="ui teal label">
      Group
    </a>
    <h1 class="ui header">
      @php echo the_title(); @endphp
    </h1>
    @php echo $grouppod->display( 'description' ); @endphp
  @php endwhile; @endphp
</div>
