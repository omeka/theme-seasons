</div><!-- end content -->

<footer>

        <div id="custom-footer-text">
            <?php if ( $footerText = get_theme_option('Footer Text') ): ?>
            <p><?php echo $footerText; ?></p>
            <?php endif; ?>
            <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
        </div>
        <nav>
            <?php echo public_nav_main(array(__('Home') => url(''), __('Browse Items') => url('items'), __('Browse Collections') => url('collections')));
            ?>
        </nav>

        <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>
        
    <?php fire_plugin_hook('public_theme_footer'); ?>
    
</footer>

</div><!--end wrap-->

<script type="text/javascript">
jQuery(document).ready(function () {
    Omeka.showAdvancedForm();
});
</script>

</body>

</html>
