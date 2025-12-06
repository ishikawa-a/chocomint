<?php get_header(); ?>
<div class="contents page-contents">
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

  <div class="page-navi view view-fadeup">
    <div class="page-navi-item _home"><a href="<?php echo home_url() ?>">Top</a></div>
  </div>

<?php get_footer(); ?>
