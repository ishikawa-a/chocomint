<?php get_header(); ?>
<div class="top-reports">
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
      <div class="top-report-label view view-leftup">
        <div class="top-report-num font-num">
          REPORT
          <span>0<?php echo $c_num; ?></span>
        </div>
        <div class="top-report-info">
          <div class="top-report-date font-num"><time class="article-date"><?php the_time('Y.m.d'); ?></time></div>
          <div class="top-report-title"><?php if(get_field('r-label')): ?><?php the_field('r-label'); ?><?php endif; ?></div>
        </div>
      </div>
      <div class="top-report-slide view view-fadeup">
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
<div class="top-contents" id="topContents">
  <main>
      <div class="contents-subtitle view view-fadeup"><span class="ttl_wrap">今まで出会ったチョコミント</span></div>
      <div class="contents-title view view-fadeup">ARCHIVES</div>
    <div class="article-list" id="article_item_list">
      <div class="article-item-list delayScroll">
        <?php
          $args = array(
            'post_type' => 'post',
            'paged' => 1
          );
          $query = new WP_Query($args);
        ?>
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <?php get_template_part( 'list-item' ); ?>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
        <div class="contents-button view view-fadeup"><button class="load-more-button button" type="button">Load More</button></div>
    </div>
  </main>
</div>
<div class="top-tags">
  <div class="top-tags-title view view-fadeup">
    <div class="contents-title _line"><span>SEARCH</span></div>
  </div>
  <div class="searchbox view view-fadeup">
    <div class="search-form" role="search">
      <?php get_search_form(); ?>
    </div>
  </div>
  <ul class="top-tags-list view view-fadeup">
  <?php
    $args = array(
      'orderby' => 'count',
      'order'   => 'DESC',
      'number'  => 17
    );
  ?>
    <?php $tags = get_tags($args); if($tags):foreach($tags as $tag): ?>
      <li><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a></li>
    <?php endforeach; endif; ?>
  </ul>
</div>
<?php get_footer(); ?>