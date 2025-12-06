<?php get_header(); ?>
<div class="contents page-contents">
  <main>
      <div class="contents-subtitle view view-fadeup"><span class="ttl_wrap">チョコミントが大好き</span></div>
      <div class="contents-title view view-fadeup"><?php the_title(); ?></div>
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
      <div class="contents-button"><button class="load-more-button button" type="button">Load More</button></div>
    </div>
  </main>
  <div class="page-navi view view-fadeup">
    <div class="page-navi-item _home"><a href="<?php echo home_url() ?>">Top</a></div>
  </div>
</div>
<?php get_footer(); ?>
