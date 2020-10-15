<?php get_header(); ?>
<?php //var_dump($wp_query); ?>
<main class="main main--home" id="main" role="main">
  <article class="content content--home">
    <section class="section section--main js-get-height">
      <span class="circle circle--big js-circle"></span>
      <div class="main-title-container">
        <h1 class="main-title"><img src="/assets/images/common/logo_blue.svg" alt="経営青年会"></h1>
        <p class="main-subtitle">全国社会福祉法人経営青年会は、全国経営協の内部組織として、次代を担う50歳未満の若手法人経営者等の研鑽、リーダーとしての資質向上を目的に、平成7年12月11日に発足いたしました。</p>
      </div>
      <article class="main-article">
        <?php 
        $sticky = get_option( 'sticky_posts' );
        $query = new WP_Query( 'p=' . $sticky[0] );
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($query->ID), 'full' );
        $content = get_the_content( $query->ID );
        ?>
        <?php 
        if (isset($_GET['video'])) {
          echo '<div id="video-player" class="video-player"></div>';
        } else {
          echo '<div class="main-article__image">';
          echo '<img src="'. $thumb['0'] .'" alt="'. get_the_title($query->ID) .'">';
          echo '</div>';
        };
        ?>
        <?php wp_reset_postdata(); ?>
      </article>
      <i class="arrow arrow--down scroll-arrow"></i>
    </section>
    <?php 
    if (isset($_GET['video2'])) {
        echo '<section class="section section--player">';
        echo '<div id="video-player" class="video-player2"></div>';
        echo '</section>';
    }; 
    ?>
    <section class="section section--articles">
      <h4 class="section-title u-colour--news"><a href="/news">Latest update<span class="head-subtitle">最新情報</span></a></h4>
      <div class="article-list">
		<?php 
	      $args = array(
            'post_type' => 'post',
            'category_name' => 'news',
            'posts_per_page' => 6,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post__not_in' => get_option( 'sticky_posts'),
          );
          $news = get_posts($args);
      foreach((array)$news as $post): setup_postdata($post);
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    ?>
        <article class="article article--item">
          <div class="article--item__image">
            <?php if ($thumb) {
              # code...
              echo '<img src="'. $thumb['0'] .'" alt="'. get_the_title($post->ID) .'">';
            } else {
              echo '<span class="no-image"><img src="/assets/images/common/logo_blue.svg" alt="NO IMAGE"></span>';
            } ?>
            <a href="<?php the_permalink(); ?>" class="u-grid-link"></a>
          </div>
          <div class="article--item__text">
            <p class="article--item__title"><?php the_title(); ?></p>
            <p class="article--item__desc"><?php echo mb_substr(get_the_excerpt(), 0, 100); ?></p>
            <a href="<?php the_permalink(); ?>" class="article--item__link"></a>
          </div>
        </article>
		<?php endforeach; wp_reset_postdata(); ?>
      </div>
    </section>

<?php 
$term = get_term_by('slug', 'interview', 'category');
if($term != false ){
    if($term->count > 0 ){
?>
    <section class="section section--articles">
      <h4 class="section-title u-colour--interview"><a href="/interview">It starts from here!!!</a></h4>
      <div class="article-list">
    <?php
      $args = array(
            'post_type' => 'post',
            'category_name' => 'interview',
            'posts_per_page' => 6,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post__not_in' => get_option( 'sticky_posts'),
          );
          $reports = get_posts($args);
      foreach((array)$reports as $post): setup_postdata($post);
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    ?>
        <article class="article article--item">
          <div class="article--item__image">
            <?php if ($thumb) {
              # code...
              echo '<img src="'. $thumb['0'] .'" alt="'. get_the_title($post->ID) .'">';
            } else {
              echo '<span class="no-image"><img src="/assets/images/common/logo_blue.svg" alt="NO IMAGE"></span>';
            } ?>
            <a href="<?php the_permalink(); ?>" class="u-grid-link"></a>
          </div>
          <div class="article--item__text">
            <p class="article--item__title"><?php the_title(); ?></p>
            <p class="article--item__desc"><?php echo mb_substr(get_the_excerpt(), 0, 100); ?></p>
            <a href="<?php the_permalink(); ?>" class="article--item__link"></a>
          </div>
        </article>
    <?php endforeach; wp_reset_postdata(); ?>
      </div>
    </section>
<?php }}; ?>

    <section class="section section--articles">
      <h4 class="section-title u-colour--report"><a href="/report">Report<span class="head-subtitle">活動レポート</span></a></h4>
      <div class="article-list">
		<?php
		  $args = array(
            'post_type' => 'post',
			'category_name' => 'report',
            'posts_per_page' => 6,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post__not_in' => get_option( 'sticky_posts'),
          );
          $reports = get_posts($args);
		  foreach((array)$reports as $post): setup_postdata($post);
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		?>
        <article class="article article--item">
          <div class="article--item__image">
            <?php if ($thumb) {
              # code...
              echo '<img src="'. $thumb['0'] .'" alt="'. get_the_title($post->ID) .'">';
            } else {
              echo '<span class="no-image"><img src="/assets/images/common/logo_blue.svg" alt="NO IMAGE"></span>';
            } ?>
            <a href="<?php the_permalink(); ?>" class="u-grid-link"></a>
          </div>
          <div class="article--item__text">
            <p class="article--item__title"><?php the_title(); ?></p>
            <p class="article--item__desc"><?php echo mb_substr(get_the_excerpt(), 0, 100); ?></p>
            <a href="<?php the_permalink(); ?>" class="article--item__link"></a>
          </div>
        </article>
		<?php endforeach; wp_reset_postdata(); ?>
      </div>
    </section>

    <section class="section section--articles">
      <h4 class="section-title u-colour--workshop"><a href="/workshop">Workshop<span class="head-subtitle">研修会</span></a></h4>
      <div class="article-list">
		<?php
		  $args = array(
            'post_type' => 'post',
			'category_name' => 'workshop',
            'posts_per_page' => 6,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post__not_in' => get_option( 'sticky_posts'),
          );
          $workshop = get_posts($args);
		  foreach((array)$workshop as $post): setup_postdata($post);
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		?>
        <article class="article article--item">
          <div class="article--item__image">
            <?php if ($thumb) {
              # code...
              echo '<img src="'. $thumb['0'] .'" alt="'. get_the_title($post->ID) .'">';
            } else {
              echo '<span class="no-image"><img src="/assets/images/common/logo_blue.svg" alt="NO IMAGE"></span>';
            } ?>
            <a href="<?php the_permalink(); ?>" class="u-grid-link"></a>
          </div>
          <div class="article--item__text">
            <p class="article--item__title"><?php the_title(); ?></p>
            <p class="article--item__desc"><?php echo mb_substr(get_the_excerpt(), 0, 100); ?></p>
            <a href="<?php the_permalink(); ?>" class="article--item__link"></a>
          </div>
        </article>
		<?php endforeach; wp_reset_postdata(); ?>
      </div>
    </section>
    <section class="section section--articles">
      <h4 class="section-title u-colour--sks-news"><a href="/report">Seinenkai News<span class="head-subtitle">青年会ニュース</span></a></h4>
      <div class="article-list">
		<?php
		  $args = array(
            'post_type' => 'post',
			'category_name' => 'seinenkai-news',
            'posts_per_page' => 6,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post__not_in' => get_option( 'sticky_posts'),
          );
          $seinenkai = get_posts($args);
		  foreach((array)$seinenkai as $post): setup_postdata($post);
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		?>
        <article class="article article--item">
          <div class="article--item__image">
            <?php if ($thumb) {
              # code...
              echo '<img src="'. $thumb['0'] .'" alt="'. get_the_title($post->ID) .'">';
            } else {
              echo '<span class="no-image"><img src="/assets/images/common/logo_blue.svg" alt="NO IMAGE"></span>';
            } ?>
            <a href="<?php the_permalink(); ?>" class="u-grid-link"></a>
          </div>
          <div class="article--item__text">
            <p class="article--item__title"><?php the_title(); ?></p>
            <p class="article--item__desc"><?php echo mb_substr(get_the_excerpt(), 0, 100); ?></p>
            <a href="<?php the_permalink(); ?>" class="article--item__link"></a>
          </div>
        </article>
		<?php endforeach; wp_reset_postdata(); ?>
      </div>
    </section>
  </article>
  <section class="section section--membership-home">
    <div class="inner">
      <h2>Membership guide</h2>
      <p>入会案内について</p>
      <a class="button button--link" href="/membership">詳細はこちら</a>
    </div>
  </section>
  <section class="section section--anniversary js-get-height">
    <div class="anniversary-inner">      
      <p class="anniversary-title">20 years anniversary</p>
      <div class="anniversary-detail">
        <p class="anniversary-detail__title"><i class="icon icon--arrow"></i>20周年記念誌</p>
        <p>全国社会福祉法人経営青年会は、2015年に設立20周年を迎えました。</p>
      </div>
      <div class="anniversary-image">
        <img src="/assets/images/examples/example-anniversary.png" alt="20 years anniversary">
      </div>
      <a href="/assets/pdf/20th-anniversary.pdf" target="_blank" class="anniversary-link button button--download"><i class="icon icon--download"></i>Download</a>
    </div>
  </section>
</main>

<?php get_footer(); ?>