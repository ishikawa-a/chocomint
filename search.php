<?php get_header(); ?>
<div class="contents page-contents">
  <main>
    <?php if (have_posts()): ?>
    <div class="contents-title view view-fadeup">
    <?php
    if ( isset( $_GET[ 's' ] ) && empty( $_GET[ 's' ] ) ) {
      echo '検索キーワードが入力されていません'; // 検索キーワードが未入力の場合のテキストを指定
    } else {
      echo '“ ' . $_GET[ 's' ] . ' ”の検索結果：' . $wp_query->found_posts . '件'; // 検索キーワードと該当件数を表示
    }
    ?>
    </div>
    <div class="article-list" id="article_item_list">
      <div class="article-item-list delayScroll">
        <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part( 'list-item' ); ?>
        <?php endwhile; ?>
      </div>
    </div>
    <div class="contents-button"><button class="load-more-button button" type="button">Load More</button></div>
    <?php else: ?>
    <div class="error">
      <p>チョコミントが見つかりませんでした。</p>
    </div>
    <?php endif; ?>
    </div>
  </main>
  <div class="page-navi view view-fadeup">
    <div class="page-navi-item _home"><a href="<?php echo home_url() ?>">Top</a></div>
    <div class="page-navi-item _archives"><a href="<?php echo home_url() ?>/archives/">All View</a></div>
    <div class="page-navi-item _archives"><a href="javascript:history.back();">Page Back</a></div>
  </div>
</div>

<?php get_footer(); ?>