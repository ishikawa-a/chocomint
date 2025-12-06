<?php get_header(); ?>
<div class="contents">
<main>
	<article class="article">
		<h1 class="article-title">404 Error...</h1>
		<div class="article-main">
			<p>[ http://<?php echo esc_html($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); ?> ]</p>
			<p>お探しのページは存在しないURL または 削除されたページの為見つかりませんでした。<br />
			<a href="<?php echo home_url(); ?>">Home</a></p>
		</div>
	</article>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
