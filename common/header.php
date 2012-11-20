<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>

    <title><?php echo option('site_title'); echo isset($title) ? ' | ' . strip_formatting($title) : ''; ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_file('style');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">
        <div id="header">
            <div class="center-div">
                <?php fire_plugin_hook('public_header'); ?>
                <div id="search-container">
                    <?php echo search_form(array('show_advanced' => true)); ?>
                </div>
                <div id="site-title">
                    <?php echo link_to_home_page(theme_logo()); ?>
                </div>
            </div><!--center-div-->
        </div>

        <div id="primary-nav">
            <ul class="navigation">
            <?php echo public_nav_main(); ?>
            </ul>
        </div>

        <div id="content">
        <div id="content-container" class="center-div">
            <?php fire_plugin_hook('public_content_top'); ?>
