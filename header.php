<!DOCTYPE html>
<html lang="ja">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TM71JWX2DL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-TM71JWX2DL');
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title><?php bloginfo('name'); ?></title>
<meta name="description" content="my blog space.">
<meta name="author" content="tama">
<link rel="canonical" href="">
<link rel="shortcut icon" type="<?php echo get_template_directory_uri(); ?>/images/vnd.microsoft.icon" href="favicon.ico">
<link rel="icon" type="<?php echo get_template_directory_uri(); ?>/images/vnd.microsoft.icon" href="favicon.ico">
<meta property="og:url" content="">
<meta property="og:type" content="website">
<meta property="og:title" content="tamatuf">
<meta property="og:description" content="my blog space.">
<meta property="og:site_name" content="tamatuf">
<meta property="og:image" content="">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:url" content="">
<meta name="twitter:title" content="tamatuf">
<meta name="twitter:description" content="my blog space.">
<meta name="twitter:image" content="">
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css?<?php echo filemtime( get_stylesheet_directory() . '/css/style.css'); ?>">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/pbi1wvb.css">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body>
<div class="wrapper">
<?php if( is_home() || is_front_page() ): ?>
<header class="header">
  <div class="header-inner">
    <h1 class="logo"><a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg"></a></h1>
  </div>
</header>
<?php else: ?>
<header class="header global-header">
  <div class="header-inner">
    <h1 class="logo"><a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg"></a></h1>
  </div>
</header>
<?php endif; ?>
