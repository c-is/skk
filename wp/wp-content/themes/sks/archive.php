<?php
/*
Template Name: Archives
*/
get_header(); ?>
<main class="main main--archives" id="main" role="main">
  <header class="content-header">
    <div class="content-header__title-container">
      <h2 class="content-header__title">Archives</h2>
      <p class="content-header__desc">全般のアーカイブ情報です</p>
    </div>
  </header>
  <article class="content content--archives">
    <section class="section section--articles">
    <?php 
    $q = new WP_Query(
      array(
      	'post_type' => 'post',
        'posts_per_page' => -1,
        'post__not_in' => get_option( 'sticky_posts'),
      )
    );
    ?>
      <div class="article-nav">
        <div class="article-nav__filter js-filter u-pc" data-filter-group="year">
          <ul class="clear">
            <li><span class="js-filter-trigger active" data-filter="">ALL</span></li>
            <?php 
            $years = $wpdb->get_results( "SELECT YEAR(post_date) AS year FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' GROUP BY year DESC" );

            foreach ( $years as $year ) {
              $posts_this_year = $wpdb->get_results( "SELECT post_title FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' AND YEAR(post_date) = '" . $year->year . "'" );

              echo '<li><span class="js-filter-trigger" data-filter=".year-'. $year->year .'">'. $year->year .'</span></li>';
               
            };
            ?>
          </ul>
        </div>
        <form class="article-nav__filter js-filter u-sp u-mb8" data-filter-group="year">
          <select class="js-filter-select">
            <option value="">年を選択</option>
            <?php 
            $years = $wpdb->get_results( "SELECT YEAR(post_date) AS year FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' GROUP BY year DESC" );

            foreach ( $years as $year ) {
              $posts_this_year = $wpdb->get_results( "SELECT post_title FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' AND YEAR(post_date) = '" . $year->year . "'" );

              echo '<li><span class="js-filter-trigger" data-filter=".year-'. $year->year .'">'. $year->year .'</span></li>';
              echo '<option value="'. $year->year .'">'. $year->year .'</option>';
            };
            ?>
            </select>
        </form>
        <form class="article-nav__category js-filter" data-filter-group="category">
          <select class="js-filter-select">
            <option value="">カテゴリーを選択</option>
            <?php 
            $cate_args = array(
            'hide_empty'=> 1,
            'orderby' => 'name',
            'order' => 'ASC',
            'exclude' => 6
            );

            $categories = get_categories($cate_args);
            foreach($categories as $category) {
              echo '<option value=".category-'. $category->slug .'">'. $category->name .'</option>';
            };
            ?>
          </select>
        </form>
      </div>
      <div class="article-list article-list--archives">
      <?php 
      if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); 

      $id = get_the_ID();
      $slug = $post->slug;

      $post_categories = get_the_category();
      $post_date = get_the_date( 'Y' );
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
      $category_slug_array = wp_list_pluck($post_categories, 'slug');
      $category_slug = implode(' category-', $category_slug_array);
      ?>

        <article class="article article--item category-<?php echo $category_slug; ?> year-<?php echo $post_date; ?>">
          <div class="article--item__image">
            <?php if ($thumb) {
              # code...
              echo '<img src="'. $thumb['0'] .'" alt="'. get_the_title($post->ID) .'">';
            } else {
              echo '<span class="no-image"><img src="/assets/images/common/logo_blue.svg" alt="NO IMAGE"></span>';
            } ?>
            <a href="<?php echo get_the_permalink(); ?>" class="u-grid-link"></a>
            <span class="article--item__tag article-tag article-tag--<?php echo $post_categories[0]->slug ?>"><?php echo $post_categories[0]->name ?></span>
          </div>
          <div class="article--item__text">
            <p class="article--item__title"><?php the_title(); ?></p>
            <p class="article--item__desc"><?php echo mb_substr(get_the_excerpt(), 0, 100); ?></p>
            <a href="<?php echo get_the_permalink(); ?>" class="article--item__link"></a>
          </div>
        </article>
      <?php endwhile; wp_reset_postdata(); endif; ?>
      </div>
    </section>
  </article>
</main>

<?php
get_footer()
?>