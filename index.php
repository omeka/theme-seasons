<?php echo head(array('bodyid'=>'home')); ?>

<?php if (get_theme_option('Homepage Text')): ?>
<p><?php echo get_theme_option('Homepage Text'); ?></p>
<?php endif; ?>

<h1 class="sr-only"><?php echo __('Featured'); ?></h1>

<?php if (get_theme_option('Display Featured Item') !== '0'): ?>
<!-- Featured Item -->
<div id="featured-item">
    <h2><?php echo __('Featured Item'); ?></h2>
    <?php echo display_records('Item', 1); ?>
</div><!--end featured-item-->
<?php endif; ?>

<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>

<?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
<!-- Featured Collection -->
<div id="featured-collection">
    <h2><?php echo __('Featured Collection'); ?></h2>
    <?php echo display_records('Collection', 1); ?>
</div><!-- end featured collection -->
<?php endif; ?>

<?php if ((get_theme_option('Display Featured Exhibit') !== '0')
        && plugin_is_active('ExhibitBuilder')): ?>
<!-- Featured Exhibit -->
<div id="featured-exhibit">
    <h2><?php echo __('Featured Exhibit'); ?></h2>
    <?php echo display_records('Exhibit', 1, 'exhibits/single.php', ); ?>
</div>
<?php endif; ?>

<?php
$recentItems = get_theme_option('Homepage Recent Items');
if ($recentItems === null || $recentItems === ''):
    $recentItems = 3;
else:
    $recentItems = (int) $recentItems;
endif;
if ($recentItems):
?>
<div id="recent-items">
    <h2><?php echo __('Recently Added Items'); ?></h2>
    <?php echo recent_items($recentItems); ?>
    <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
</div><!--end recent-items -->
<?php endif; ?>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
