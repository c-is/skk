<?php
/*
Template Name: Archives
*/
get_header(); ?>
<main class="main main--archives" id="main" role="main">
  <article class="content content--archives">
    <header class="content-header">
      <div class="content-header__title-container">
        <h2 class="content-header__title">Archives</h2>
        <p class="content-header__desc">全般のアーカイブ情報です</p>
      </div>
    </header>
    <section class="section section--articles">
    <?php 
    $q = new WP_Query(
      array(
      	'post_type' => 'post',
        'posts_per_page' => -1
      )
    );
    ?>
      <div class="article-nav">
        <div class="article-nav__filter">
          <ul>
            <li><span class="active">2017</span></li>
            <li><span>2016</span></li>
            <li><span>2015</span></li>
          </ul>
        </div>
        <form class="article-nav__category">
          <select>
            <option>カテゴリーを選択</option>
          </select>
        </form>
      </div>
      <div class="article-list article-list--archives">
      <?php 
      if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); 

      $id = get_the_ID();
      $slug = $post->slug;

      $categories = get_the_category();
      ?>
        <article class="article article--item">
          <div class="article--item__image">
            <img src="">
            <span class="article--item__tag article-tag article-tag--<?php echo $categories[0]->slug ?>"><?php echo $categories[0]->name ?></span>
          </div>
          <div class="article--item__text">
            <p class="article--item__title"><?php the_title(); ?></p>
            <p class="article--item__desc"><?php the_content(); ?></p>
            <a href="<?php echo get_the_permalink(); ?>" class="article--item__link"></a>
          </div>
        </article>
      <?php endwhile; endif; ?>
      </div>
    </section>
  </article>
</main>

<?php
get_footer()
?>