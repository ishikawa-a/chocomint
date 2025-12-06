<?php get_header(); ?>
<div class="contents">
  <main>
    <article class="article">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
      $mintlv = get_post_meta( get_the_ID(), 'mint', true );
      $chocolv = get_post_meta( get_the_ID(), 'choco', true );
      $manufacturer = get_post_meta( get_the_ID(), 'manufacturer', true );
      $kcal = get_post_meta( get_the_ID(), 'kcal', true );
      $per = get_post_meta( get_the_ID(), 'per', true );
      $text = get_post_meta( get_the_ID(), 'text', true );
    ?>
    <section class="section-chocomint">
      <div class="flex-wrap">
        <div class="img-wrap">
          <div class="product-img slider">
          <?php
            $content = get_the_content();
            $content = preg_replace('/<figure(.*?)<\/figure>/s', '<div><figure$1</figure></div>', $content);
            $content = apply_filters('the_content',$content);
            $content = str_replace( ']]>', ']]&gt;', $content );
            echo $content;
          ?>
          </div>
        </div>
        <div class="detail-wrap">
          <?php if($manufacturer): ?>
          <div class="product-manu view view-fadeup"><?php echo $manufacturer; ?></div>
          <?php endif; ?>
          <div class="product-title view view-fadeup"><?php the_title(); ?></div>
          <div class="product-cat view view-fadeup">
            <?php echo get_the_category_list( '' ); ?>
            <?php if ($kcal) : ?>
            <div class="product-kcal">
              <?php echo $kcal; ?>kcal / <?php echo $per; ?>
            </div>
            <?php endif; ?>
          </div>
          <div class="product-evaluation view view-fadeup">
            <?php
              $minti = 0;
              $chocoi = 0;
            ?>
            <div class="product-item-mint"> <span class="star-name">ミント感</span>
              <?php if ($mintlv > 0 && $mintlv <= 5) : while ($minti < 5) : ?>
              <?php if ($minti < $mintlv) : ?>
              <i class="fas fa-star star-on-mint"></i>
              <?php  else : ?>
              <i class="fas fa-star star-off"></i>
              <?php  endif; $minti++; endwhile; else : ?>
              <span class="star-no">-</span>
              <?php endif; ?>
            </div>
            <div class="product-item-choco"> <span class="star-name">チョコ感</span>
              <?php if ($chocolv > 0 && $chocolv <= 5) : while ($chocoi < 5) : ?>
              <?php if ($chocoi < $chocolv) : ?>
              <i class="fas fa-star star-on-choco"></i>
              <?php  else : ?>
              <i class="fas fa-star star-off"></i>
              <?php  endif; $chocoi++; endwhile; else : ?>
              <span class="star-no">-</span>
              <?php endif; ?>
            </div>
          </div>
          <div class="product-textarea view view-fadeup"><?php echo $text; ?></div>
          <div class="product-date font-num view view-fadeup"><time class="article-date"><?php the_time('Y.m.d'); ?></time></div>
        </div>
      </div>
    </section>
    <?php endwhile; else: ?>
      <div class="error"><p>ページが見つかりませんでした。</p></div>
    <?php endif; ?>
    </article>
  </main>
  <div class="page-navi view view-fadeup">
    <div class="page-navi-item _home"><a href="<?php echo home_url() ?>">Top</a></div>
    <div class="page-navi-item _archives"><a href="<?php echo home_url() ?>/archives/">All View</a></div>
    <div class="page-navi-item _archives"><a href="javascript:history.back();">Page Back</a></div>
  </div>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
