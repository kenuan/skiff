<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />

	<title><?php echo $options['list']; ?> :: Skiff</title>

	<link rel="stylesheet" href="<?php echo $options['app_url']; ?>/css/default.css" type="text/css" media="screen" charset="utf-8">
<?php if (file_exists("themes/$list.css")): ?>
	<link rel="stylesheet" href="<?php echo $options['app_url']; ?>/themes/<?php echo $options['list']; ?>.css" type="text/css" media="screen" charset="utf-8">
<?php endif; ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $options['app_url']; ?>/lib/jquery.hotkeys.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $options['app_url']; ?>/lib/jquery.isotope.min.js" type="text/javascript" charset="utf-8"></script>

	<script src="<?php echo $options['app_url']; ?>/js/skiff.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>

<header id="search">
	<div id="filter_container">
		<div id="filter"><span class="clear">×</span><input type="text" autocapitalize="off" autocorrect="off" /></div>
	</div>
	<h1><?php echo $options['list']; ?></h1>
</header>

<section id="page">
