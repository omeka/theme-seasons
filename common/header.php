<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ($description = settings('description')): ?>
    <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>

    <title><?php echo settings('site_title'); echo $title ? ' | ' . strip_formatting($title) : ''; ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php plugin_header(); ?>

    <!-- Stylesheets -->
    <?php 
    queue_css('style');
    display_css(); 
    ?>

    <!-- JavaScripts -->
    <?php display_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php plugin_body(); ?>
    <div id="wrap">
        <div id="header">
            <div class="center-div">
                <?php plugin_page_header(); ?>
                <div id="search-container">
                    <?php echo simple_search(); ?>
                    <?php echo link_to_advanced_search(); ?>
                </div>
                <div id="site-title">
                    <?php echo link_to_home_page(custom_display_logo()); ?>
                </div>
            </div><!--center-div-->
        </div>

        <div id="primary-nav">
            <ul class="navigation">
            <?php echo custom_public_nav_header(); ?>
            </ul>
        </div>

		<div id="content">
        <div id="content-container" class="center-div">
            <?php plugin_page_content(); ?>
