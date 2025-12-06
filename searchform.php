<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <input type="text" name="s" id="s" class="search-input" placeholder="Search text .."/>
  <button type="submit" class="search-btn"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-search.svg"></button>
</form>