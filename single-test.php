<?php
/*
Template Name: テストテンプレート
Template Post Type: post
*/
?>
<?php get_header(); ?>

<div class="top-reports">
  <div class="delayScroll">
  <?php
    $c_num = 1;
    $args = array(
      'post_type' => array('reports'),
      'post_status' => 'publish',
      'posts_per_page' => 5,
    );
    $the_query = new WP_Query($args);
  ?>
    <?php if($the_query->have_posts()): ?>
    <div class="top-sliders">
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
      <div class="top-slid-item">
      <div class="top-report">
        <div class="top-report-label">
          <div class="top-report-num font-num">
            REORT
            <span>0<?php echo $c_num; ?></span>
          </div>
          <div class="top-report-info">
            <div class="top-report-date font-num"><time class="article-date"><?php the_time('Y.m.d'); ?></time></div>
            <div class="top-report-title"><?php if(get_field('r-label')): ?><?php the_field('r-label'); ?><?php endif; ?></div>
          </div>
        </div>
        <div class="top-report-slide">
          <div class="top-report-view">
            <?php
              $image_url = get_field('r-img');
              if( !empty($image_url) ):
            ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" />
            <?php endif; ?>
          </div>
          <div class="top-report-more">
            <a href="<?php the_permalink(); ?>" class="button-line">view more</a>
          </div>
        </div>
      </div>
      </div>
      <?php $c_num++; endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
  </div>
</div>
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
          <div class="product-date font-num"><time class="article-date"><?php the_time('Y.m.d'); ?></time></div>
        </div>
        <div class="detail-wrap">
          <?php if($manufacturer): ?>
          <div class="product-manu"><?php echo $manufacturer; ?></div>
          <?php endif; ?>
          <div class="product-title"><?php the_title(); ?></div>
          <div class="product-cat">
            <?php echo get_the_category_list( ' ,' ); ?>
            <?php if ($kcal) : ?>
            <div class="product-kcal">
              <?php echo $kcal; ?>kcal / <?php echo $per; ?>
            </div>
            <?php endif; ?>
          </div>
          <div class="product-evaluation">
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
          <div class="product-textarea"><?php echo $text; ?></div>
        </div>
      </div>
    </section>
  <?php endwhile; else: ?>
    <div class="error"><p>ページが見つかりませんでした。</p></div>
  <?php endif; ?>
  </article>
</main>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
