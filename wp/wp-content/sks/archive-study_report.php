<?php get_header(); ?>

<main class="main main--reports" id="main" role="main">
  <article class="content content--reports">
    <header class="content-header">
      <div class="content-header__title-container">
        <h2 class="content-header__title">Study Reports</h2>
        <p class="content-header__desc">報告書 研究結果</p>
      </div>
    </header>
    <section class="section section--reports">

    <?php 
    $years = array();
    $q = new WP_Query(
      array(
      	'post_type' => 'study_report',
        'posts_per_page' => -1
      )
    );
    if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); 

    $year = get_the_date( 'Y' );
    if ( ! isset( $years[ $year ] ) ) $years[ $year ] = array();
    $years[ $year ][] = array( 
    	'id' => get_the_ID(),
    	'slug' => $post->slug,
    	'title' => get_the_title(), 
    );

    endwhile; wp_reset_postdata(); endif;
    ?>
	<?php foreach($years as $key => $year): ?>
      <article class="article article--report">
        <h5 class="article--report__head"><?php echo $key; ?>年</h5>
        <ul>
		<?php 
		foreach($year as $report_post):

		$pdf = get_field('pdf', $report_post['id']);
		$f = filesize( get_attached_file( $pdf ));
		$filesize = size_format( $f, 2 );
		$url = wp_get_attachment_url( $pdf );
		?>
	      	<li><a href="<?php echo $url; ?>" target="_blank"><?php echo $report_post['title']; ?><i class="icon icon--pdf"></i><span class="article--report__size"><?php echo $filesize; ?></span></a></li>
	    <?php endforeach; ?>
        </ul>
      </article>
   	<?php endforeach; ?>

    </section>
  </article>
</main>

<?php
get_footer()
?>