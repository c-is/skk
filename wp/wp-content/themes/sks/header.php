<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="ja-JP"> <!--<![endif]-->
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta property="og:title" content="<?php wp_title(); ?>" />
		<meta property="og:type" content="website"/>
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
		<meta property="og:url" content="" />
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-facebook.png" />
		<meta property="og:description" content="" />
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<link rel="stylesheet" href="/style.css">
		<link rel="stylesheet" href="/additional.css">
		<!-- <script src="https://use.fontawesome.com/12a27d5405.js"></script> -->

		<script src="/assets/js/vendor/modernizr.js"></script>

		<script src="https://use.typekit.net/jul0flp.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>

		<?php wp_head(); ?> 
	</head>
	<body <?php body_class(); ?>>
		<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<div class="bg bg--main"></div>
		<header class="header clear" id="header">
			<div class="header-inner">
				<p class="header-logo"><a href="/">社会福祉法人　全国社会福祉協議会　全国社会福祉法人経営者協議会　全国社会福祉法人経営青年会</a></p>
				<ul class="header-menu u-pc">
					<li><a href="mailto:<?php echo get_bloginfo('admin_email'); ?>"><i class="icon icon--email"></i>お問い合わせ</a></li>
					<li><a href="/membership"><i class="icon icon--guide"></i>入会案内</a></li>
				</ul>
				<a class="navigation-trigger js-navigation-trigger" id="navigation-trigger" href=""><i></i></a>
			</div>
		</header>
		<nav class="navigation" id="navigation" role="navigation">
			<ul>
				<li>
					<a href="/archives">
						<strong>Archives</strong><br>
						<span>アーカイブス</span>
					</a>
				</li>
				<li>
					<a href="/about">
						<strong>About</strong><br>
						<span>青年会とは</span>
					</a>
				</li>
				<li>
					<a href="/study_report">
						<strong>Study Reports</strong><br>
						<span>報告書・研究成果</span>
					</a>
				</li>
				<li class="sub-list u-sp"><a href="mailto:zenkoku-seinen@shakyo.or.jp"><i class="icon icon--email"></i>お問い合わせ</a></li>
				<li class="sub-list u-sp"><a href="/membership"><i class="icon icon--guide"></i>入会案内</a></li>
			</ul>
		</nav>

		<div class="container" id="container">