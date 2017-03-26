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

      <article class="article article--report">
        <h5 class="article--report__head">平成25・26年度</h5>
        <ul>
	    <?php 
	    $q = new WP_Query(
	      array(
	      	'post_type' => 'study_report',
	        'posts_per_page' => -1
	      )
	    );
	    if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); 
	    ?>

	    <?php 
	    $id = get_the_ID();
	    $slug = $post->slug;
	    $pdf = get_field('pdf');
	    $f = filesize( get_attached_file( $pdf ));
	    $filesize = size_format( $f, 2 );
	    $url = wp_get_attachment_url( $pdf );
	    ?>
          <li><a href="<?php echo $url; ?>" target="_blank"><?php the_title(); ?><i class="icon icon--pdf"></i><span class="article--report__size"><?php echo $filesize; ?></span></a></li>
    	<?php endwhile; endif; ?>
        </ul>
      </article>

    </section>
  </article>
</main>

<?php
get_footer()
?>