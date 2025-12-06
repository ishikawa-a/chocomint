<?php

add_theme_support( 'menus' );

//jsファイル読み込み
function add_enqueue_scripts() {
  wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'add_enqueue_scripts');


//記事内の一番最初の画像を取得
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = get_template_directory_uri() ."/images/hello.png";
  }
return $first_img;
}

// Infinite Scroll
function load_more_posts() {
  // nonce認証
  check_ajax_referer('my-ajax-nonce');
  $paged = $_POST['page'];
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'paged' => $paged
  );
 
  $query = new WP_Query($args);
 
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      // テンプレートパーツでループ部分を表示
      get_template_part('list-item', get_post_type());
    }
  }
 
  wp_reset_postdata();
  wp_die();
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_custom_scripts() {
  wp_enqueue_script(
    'infinite-scroll',
    get_template_directory_uri() .
    '/js/infinite-scroll.js',
    array('jquery'),
    filemtime(get_theme_file_path('/js/infinite-scroll.js')),
    true
  );
  wp_localize_script(
    'infinite-scroll',
    'infiniteScroll',
    array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'my_ajax_nonce' => wp_create_nonce('my-ajax-nonce'),
    )
  );
}
add_action('wp_enqueue_scripts', 'load_custom_scripts');


// Slick Slide
function add_slick_files() {
  //CSSの読み込み
  wp_enqueue_style('slick-style', get_template_directory_uri() . '/assets/slick/slick.css', array(), '1.0.0');
  wp_enqueue_style('slick-theme-style', get_template_directory_uri() . '/assets/slick/slick-theme.css', array('slick-style'), '1.0.0');

  //jsの読み込み
  wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/assets/slick/slick.min.js', array('jquery'), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'add_slick_files' );

// 検索対象を投稿ページに限定
function search_exclude_custom_post_type( $query ) {
  if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
      $query->set( 'post_type', 'post' );
  }
}
add_filter( 'pre_get_posts', 'search_exclude_custom_post_type' );

// レポートURL
add_filter('post_type_link', 'custom_post_link', 1, 2);
function custom_post_link($link, $post) {
  if($post -> post_type === 'reports') {
    // カスタム投稿名が"reports"の投稿のパーマリンクを「/reports/投稿ID/」の形に書き換え
    return home_url('/reports/'.$post->ID);
  } else {
    return $link;
  }
}

//書き換えたパーマリンクに対応したリライトルールを追加
add_filter('rewrite_rules_array', 'custom_post_link_rewrite');
function custom_post_link_rewrite($rules) {
  $rewrite_rules = array(
    'reports/([0-9]+)/?$' => 'index.php?post_type=reports&p=$matches[1]',
  );
  return $rewrite_rules + $rules;
}

?>