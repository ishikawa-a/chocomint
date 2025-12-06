<div class="article-item-area fadebox">
  <article class="article-item">
    <a href="<?php the_permalink(); ?>">
      <div class="article-item-meta">
        <?php
        foreach ( ( get_the_category() ) as $cat ) {
          echo $cat->cat_name;
        }
        ?>
      </div>
      <div class="article-item-image">
        <figure><img src="<? echo catch_that_image(); ?>" alt="<?php the_title(); ?>" /></figure>
      </div>
      <?php
        $mintlv = get_post_meta( get_the_ID(), 'mint', true );
        $chocolv = get_post_meta( get_the_ID(), 'choco', true );
        $manufacturer = get_post_meta( get_the_ID(), 'manufacturer', true );
        $kcal = get_post_meta( get_the_ID(), 'kcal', true );
      ?>
      <div class="article-item-text">
        <?php if($manufacturer): ?>
          <span class="article-item-manu"><?php echo $manufacturer; ?></span>
        <?php endif; ?>
        <?php the_title(); ?>
      </div>
      <?php
        $minti = 0;
        $chocoi = 0;
      ?>
      <div class="article-item-mint"> <span class="star-name">ミント感</span>
        <?php if ($mintlv > 0 && $mintlv <= 5) : while ($minti < 5) : ?>
        <?php if ($minti < $mintlv) : ?>
        <i class="fas fa-star star-on-mint"></i>
        <?php  else : ?>
        <i class="fas fa-star star-off"></i>
        <?php  endif; $minti++; endwhile; else : ?>
        <span class="star-no">-</span>
        <?php endif; ?>
      </div>
      <div class="article-item-choco"> <span class="star-name">チョコ感</span>
        <?php if ($chocolv > 0 && $chocolv <= 5) : while ($chocoi < 5) : ?>
        <?php if ($chocoi < $chocolv) : ?>
        <i class="fas fa-star star-on-choco"></i>
        <?php  else : ?>
        <i class="fas fa-star star-off"></i>
        <?php  endif; $chocoi++; endwhile; else : ?>
        <span class="star-no">-</span>
        <?php endif; ?>
      </div>
    </a>
  </article>
</div>