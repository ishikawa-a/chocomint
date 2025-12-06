 
 
<?php
 
 global $wp_rewrite;
 $paginate_base = get_pagenum_link( 1 );
 if ( strpos( $paginate_base, '?' ) || !$wp_rewrite->using_permalinks() ) {
   $paginate_format = '';
   $paginate_base = add_query_arg( 'paged', '%#%' );
 } else {
   $paginate_format = ( substr( $paginate_base, -1, 1 ) == '/' ? '' : '/' ) . user_trailingslashit( 'page/%#%/', 'paged' );
   $paginate_base .= '%_%';
 }
 $page_links = paginate_links( array(
   'base' => $paginate_base, //ページネーションのベースのURLを指定。初期値: '%_%'
   'format' => $paginate_format, // ページネーションの構造の指定。初期値: '?page=%#%'
   'total' => $paging_query->max_num_pages, // 全体のページ数。初期値: 1
   'end_size' => 1, // ページ番号の両端にいくつの数字を表示するか。初期値: 1
   'mid_size' => 2, // 現在のページの両端にいくつ数字を表示するか。（現在のページは含まない）初期値: 2
   'current' => ( $paged ? $paged : 1 ), // 現在のページ番号。初期値: 0
   'prev_text' => '前へ', // 前のページへのリンクに表示するテキスト。初期値: '&laquo; Previous'
   'next_text' => '次へ', // 次のページへのリンクに表示するテキスト。初期値: 'Next &raquo;'
 ) );
  
 if ( strcmp( $page_links, "" ) != 0 ) : ?>
  
   <div class="paging-area">
     <?php print $page_links; ?>
   </div><!-- /paging-area -->
  
   <?php endif; ?>
 