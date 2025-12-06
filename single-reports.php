<?php get_header(); ?>
<div class="contents">
<main>
  <article class="article">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <section class="section-report">
    <div class="report-view view view-fadeup">
      <?php
        $image_url = get_field('r-img');
        if( !empty($image_url) ):
      ?>
      <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" />
      <?php endif; ?>
    </div>
    <div class="report-info view view-fadeup">
      <div class="report-date font-num"><time class="article-date"><?php the_time('Y.m.d'); ?></time></div>|
      <div class="report-tag">
      <?php
        $terms = get_the_terms($post->ID, 'area');
        if($terms):
          foreach($terms as $term):
            echo '<a href="' . get_term_link($term) . '">' . esc_html( $term->name ) . '</a>';
          endforeach;
        endif;
      ?>
    </div>
    </div>
    <div class="report-title view view-fadeup"><?php if(get_field('r-name')): ?><?php the_field('r-name'); ?><?php endif; ?> <?php the_title(); ?></div>
    
    <div class="report-contents view view-fadeup"><?php the_content(); ?></div>
    <div class="report-store view view-fadeup">
      <div class="report-store-title">Store Information</div>
      <div class="report-store-info">
        <?php if(get_field('r-name')): ?><div class="report-s-name"><?php the_field('r-name'); ?></div><?php endif; ?>
        <?php if(get_field('r-access')): ?><div class="report-s-access"><?php the_field('r-access'); ?></div><?php endif; ?>
        <?php if(get_field('r-tel')): ?><div class="report-s-tel">TEL：<?php the_field('r-tel'); ?></div><?php endif; ?>
        <?php if(get_field('r-time')): ?><div class="report-s-time">営業時間：<?php the_field('r-time'); ?></div><?php endif; ?>
        <?php if(get_field('r-holiday')): ?><div class="report-s-holiday">休：<?php the_field('r-holiday'); ?></div><?php endif; ?>
        <?php if(get_field('r-web')): ?><div class="report-s-web"><a href="<?php the_field('r-web'); ?>" target="_blank"><?php the_field('r-web'); ?></a></div><?php endif; ?>
      </div>
    </div>
  </section>
  <?php endwhile; else: ?>
  <div class="error view view-fadeup"><p>ページが見つかりませんでした。</p></div>
  <?php endif; ?>
  </article>
</main>
<div class="page-navi view view-fadeup">
    <div class="page-navi-item _home"><a href="<?php echo home_url() ?>">Top</a></div>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
