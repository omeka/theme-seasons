<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo settings('site_title'); echo $title ? ' | ' . $title : ''; ?></title>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo settings('description'); ?>" />

<?php echo auto_discovery_link_tag(); ?>

<!-- Stylesheets -->
<?php 
$stylesheet = (get_theme_option('Style Sheet') ? get_theme_option('Style Sheet') : 'spring'); 
?>
<link rel="stylesheet" media="screen" href="<?php echo html_escape(css($stylesheet)); ?>" />
<link rel="stylesheet" media="print" href="<?php echo html_escape(css('print')); ?>" />

<style type="text/css" media="screen">

    body {
        <?php if($background = get_theme_option('Background')): ?>
        background-image: url(<?php echo WEB_THEME_UPLOADS.'/'.$background; ?>);
        <?php endif; ?>
    }
    
    #header {
        <?php if($headerColor = get_theme_option('headerColor')): ?>
        background-color: <?php echo $headerColor; ?>;
        <?php endif; ?>
    }
</style>

<!-- Only IE6 and below see the following link -->
<!--[if IE ]>
    <link rel="stylesheet" media="screen" href="<?php echo html_escape(css('ie')); ?>" />
<![endif]-->

<!-- JavaScripts -->
<?php echo js('default'); ?>

<!-- Plugin Stuff -->
<?php echo plugin_header(); ?>

</head>
<body<?php echo $bodyid ? ' id="'.$bodyid.'"' : ''; ?><?php echo $bodyclass ? ' class="'.$bodyclass.'"' : ''; ?>>
	<div id="wrap">
		<div id="header">
			<div class="center-div">
				<img src="<?php echo WEB_THEME_UPLOADS.'/'.get_theme_option('Logo'); ?>" />
			<div id="search-wrap">
				<?php echo simple_search(); ?>
				<?php echo link_to_advanced_search(); ?>
			</div>
			
			<div id="site-title"><?php echo link_to_home_page(); ?></div>
				</div><!--center-div-->
		</div>

			<div id="primary-nav">
			<ul class="navigation">
			<?php echo public_nav_main(array('Browse Items' => uri('items'), 'Browse Collections'=>uri('collections'))); ?>
			</ul>
		
			</div>
			
		<div id="content">
			
		<div id="content-container" class="center-div">