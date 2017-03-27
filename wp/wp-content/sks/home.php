<?php get_header(); ?>
<?php //var_dump($wp_query); ?>
<main class="main main--home" id="main" role="main">
  <article class="content content--home">
    <section class="section section--main js-get-height">
      <span class="circle circle--big js-circle"></span>
      <div class="main-title-container">
        <h1 class="main-title">経営青年会</h1>
        <p class="main-subtitle">社会福祉法人経営青年会は、全国経営協の内部組織として、次代を担う50歳未満の若手法人経営者等の研鑽、リーダーとしての資質向上を目的に、平成7年12月11日に発足いたしました。</p>
      </div>
      <article class="main-article">
        <?php 
        $sticky = get_option( 'sticky_posts' );
        $query = new WP_Query( 'p=' . $sticky[0] );
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($query->ID), 'full' );
        $content = get_the_content( $query->ID );
        ?>
        <?php if($content){ ?>
        <div class="main-article__image">
          <img src="<?php echo $thumb['0'];?>" alt="<?php echo get_the_title($query->ID); ?>">
          <a href="<?php echo get_the_permalink($query->ID); ?>" class="main-article__link"></a>
        </div>
        <p class="main-article__title"><?php echo get_the_title($query->ID); ?></p>
        <p class="main-article__desc"><?php echo $query->post_excerpt; ?></p>
        <?php } else { ?>
        <div class="main-article__image">
          <img src="<?php echo $thumb['0'];?>" alt="<?php echo get_the_title($query->ID); ?>">
        </div>
        <?php }; ?>
        <?php wp_reset_postdata(); ?>
      </article>
    </section>
    <section class="section section--articles">
      <h4 class="section-title u-colour--news">News<span class="head-subtitle">最新情報</span></h4>
      <div class="article-list">
		<?php 
	      $args = array(
            'post_type' => 'post',
      'category_name' => 'news',
            'posts_per_page' => 6,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post__not_in' => get_option( 'sticky_posts'),
          );
          $news = get_posts($args);
      foreach((array)$news as $post): setup_postdata($post);
    ?>
        <article class="article article--item">
          <div class="article--item__image">
			<?php if(has_post_thumbnail()): the_post_thumbnail(); ?>
			<?php else: ?>
	            <img src="">
			<?php endif; ?>
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
      <h4 class="section-title u-colour--report">Report<span class="head-subtitle">活動レポート</span></h4>
      <div class="article-list">
		<?php
		  $args = array(
            'post_type' => 'post',
			'category_name' => 'report',
            'posts_per_page' => 6,
            'orderby' => 'menu_order',
            'order' => 'ASC',
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
              echo '<img src="" alt="NO IMAGE">';
            } ?>
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
      <h4 class="section-title u-colour--workshop">Workshop<span class="head-subtitle">研修会</span></h4>
      <div class="article-list">
		<?php
		  $args = array(
            'post_type' => 'post',
			'category_name' => 'workshop',
            'posts_per_page' => 6,
            'orderby' => 'menu_order',
            'order' => 'ASC',
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
              echo '<img src="" alt="NO IMAGE">';
            } ?>
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
      <h4 class="section-title u-colour--sks-news">SKS News<span class="head-subtitle">青年会ニュース</span></h4>
      <div class="article-list">
		<?php
		  $args = array(
            'post_type' => 'post',
			'category_name' => 'seinenkai-news',
            'posts_per_page' => 6,
            'orderby' => 'menu_order',
            'order' => 'ASC',
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
              echo '<img src="" alt="NO IMAGE">';
            } ?>
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
  <section class="section section--anniversary js-get-height">
    <div class="anniversary-inner">      
      <p class="anniversary-title">20 years anniversary</p>
      <div class="anniversary-detail">
        <p class="anniversary-detail__title"><i class="icon icon--arrow"></i>20周年記念誌</p>
        <p>テキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが入りますテキストが</p>
      </div>
      <div class="anniversary-image">
        <img src="/assets/images/examples/example-anniversary.jpg" alt="EXAMPLE">
      </div>
      <a href="http://www.zenkoku-skk.ne.jp/contents/index.html" target="_blank" class="anniversary-link button button--download"><i class="icon icon--download"></i>Download</a>
    </div>
  </section>
</main>

<?php get_footer(); ?>