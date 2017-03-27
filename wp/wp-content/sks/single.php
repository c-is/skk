<?php get_header(); ?>

<main class="main main--single" id="main" role="main">
  <article class="content content--single">
    <header class="content-header">
      <div class="content-header__title-container">
        <h2 class="content-header__title"><?php the_title(); ?></h2>
        <p class="content-header__desc"><?php the_date(); ?></p>
      </div>
    </header>
    <section class="section section--single">
      <?php 
        $layout = get_field('layout_type'); 
        if ($layout == 'vertical') {
          echo '<article class="article article--single is-row">';
        } else {
          echo '<article class="article article--single">';
        };
      ?>
        <?php 
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        ?>
        <?php if ($thumb) {
          # code...
          echo '<div class="article--single__image">';
          echo '<img src="'. $thumb['0'] .'" alt="'. get_the_title($post->ID) .'">';
          if( get_field('image_gallery') ){
            while( has_sub_field('image_gallery')){
              $image_item = get_sub_field('image_item');
              $image = wp_get_attachment_image_src( $image_item['id'], 'full');
              echo '<p><img src="'. $image[0] .'" alt="IMAGE"></p>';
            }
          }
          echo '</div>';
          echo '<div class="article--single__text">';
        } else {
          echo '<div class="article--single__text is-long">';
        }; ?>
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
    <?php 
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    ?>
    <?php 
      if(!$prev_post || !$next_post) {
        echo '<ul class="clear is-long">';
      } else {
        echo '<ul class="clear">';
      } 
    ?>
      <?php if (!empty( $prev_post )): ?>
      <li class="article--others__prev">
        <span class="article--others__text"><span class="rotated-text">Previous</span></span>
        <?php 
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($prev_post->ID), 'full' ); 
          if($thumb){
        ?>
          <div class="article--others__image" style="background-image: url(<?php echo $thumb['0']; ?>);"></div>
        <?php } else {; ?>
          <div class="article--others__image" style="background-image: url(/assets/images/common/no-image.jpg);"></div>
        <?php }; ?>
        <p class="article--others__title"><?php echo $prev_post->post_title ?></p>
        <a class="article--others__link" href="<?php echo $prev_post->guid ?>"></a>
      </li>
      <?php endif ?>
      <?php if (!empty( $next_post )): ?>
      <li class="article--others__next">
        <span class="article--others__text"><span class="rotated-text">Next</span></span>
        <?php 
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($next_post->ID), 'full' ); 
          if($thumb){
        ?>
          <div class="article--others__image" style="background-image: url(<?php echo $thumb['0']; ?>);"></div>
        <?php } else {; ?>
          <div class="article--others__image" style="background-image: url(/assets/images/common/no-image.jpg);"></div>
        <?php }; ?>
        <p class="article--others__title"><?php echo $next_post->post_title ?></p>
        <a class="article--others__link" href="<?php echo $next_post->guid ?>"></a>
      </li>
      <?php endif ?>
    </ul>
  </article>
</main>

<?php get_footer(); ?>