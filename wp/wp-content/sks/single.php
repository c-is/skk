<?php get_header(); ?>

<main class="main main--single" id="main" role="main">
  <article class="content content--single">
    <section class="section section--single">
      <article class="article article--single">
        <div class="article--single__image">
          <img src="/assets/images/articles/image1.jpg" alt="IMAGE">
        </div>
        <div class="article--single__text">
          <h6 class="article--single__title"><?php the_title(); ?></h6>
          <p class="article--single__date"><?php the_date(); ?></p>
          <div class="article--single__desc">
            <p><?php the_content(); ?></p>
          </div>
          <div class="article--single__share">
            <p class="share-title"><i class="icon icon--share"></i>Share<span class="share-subtitle">SNSでシェアする</span></p>
            <ul>
              <li><a class="button button--facebook" href=""></a></li>
              <li><a class="button button--twitter" href=""></a></li>
            </ul>
          </div>
        </div>
      </article>
    </section>
  </article>
  <article class="article article--others">
    <ul class="clear">
      <li class="article--others__prev">
        <span class="article--others__text"><span class="rotated-text">Previous</span></span>
        <div class="article--others__image">
          <img src="/assets/images/articles/image2.jpg" alt="IMAGE">
        </div>
        <p class="article--others__title">記事タイトル</p>
        <a class="article--others__link" href=""></a>
      </li>
      <li class="article--others__next">
        <span class="article--others__text"><span class="rotated-text">Next</span></span>
        <div class="article--others__image">
          <img src="/assets/images/articles/image3.jpg" alt="IMAGE">
        </div>
        <p class="article--others__title">記事タイトル</p>
        <a class="article--others__link" href=""></a>
      </li>
    </ul>
  </article>
</main>

<?php get_footer(); ?>