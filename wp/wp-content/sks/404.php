<?php get_header(); ?>

<main class="main main--single" id="main" role="main">
	<article class="content content--not-found">
		<header class="content-header">
			<div class="content-header__title-container">
				<h2 class="content-header__title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ); ?></h2>
			</div>
		</header>
		<section class="section error-404 not-found">
			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentysixteen' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</article>
</main><!-- .site-main -->

<?php get_footer(); ?>