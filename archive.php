<?php get_header(); ?>
<div class="contents page-contents">
  <main>
      <div class="contents-title view view-fadeup"># <?php single_cat_title(); ?></div>
    <div class="article-list" id="article_item_list">
      <div class="article-item-list delayScroll">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part( 'list-item' ); ?>
      <?php endwhile; endif; ?>
      </div>
        <div class="contents-button view view-fadeup"><button class="load-more-button button" type="button">Load More</button></div>
    </div>
  </main>
  <div class="page-navi view view-fadeup">
    <div class="page-navi-item _home"><a href="<?php echo home_url() ?>">Top</a></div>
    <div class="page-navi-item _archives"><a href="<?php echo home_url() ?>/archives/">All View</a></div>
    <div class="page-navi-item _archives"><a href="javascript:history.back();">Page Back</a></div>
  </div>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
