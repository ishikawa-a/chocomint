<?php get_header(); ?>
<div class="contents page-contents">
  <main>
    <div class="delayScroll">
      <div class="contents-subtitle fadebox"><span class="ttl_wrap">チョコミント巡りの思い出</span></div>
      <div class="contents-title fadebox">REPORTS</div>
    </div>
    <div class="report-list">
      <div class="report-item">
        <?php
          $args = array(
            'post_type' => 'reports',
            'posts_per_page' => 5,
            'paged' => 1
          );
          $query = new WP_Query($args);
        ?>
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <div class="report-item-area view view-fadeup">
          <a href="<?php the_permalink(); ?>">
          <div class="report-view">
          <?php
            $image_url = get_field('r-img');
            if( !empty($image_url) ):
          ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" />
          <?php endif; ?>
          </div>
          <div class="report-info">
            <div class="report-date font-num"><time class="article-date"><?php the_time('Y.m.d'); ?></time></div>|
            <div class="report-title"><?php if(get_field('r-name')): ?><?php the_field('r-name'); ?><?php endif; ?> <?php the_title(); ?></div>
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
          </a>
        </div>
        <?php endwhile; ?>
 
 <?php
   set_query_var( 'paging_query', $wp_query );
   get_template_part( 'paging' );
  ?>

 <?php else : ?>
 何も投稿がありません。
 <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </main>

  <div class="page-navi view view-fadeup">
    <div class="page-navi-item _home"><a href="<?php echo home_url() ?>">Top</a></div>
  </div>
<?php get_footer(); ?>
