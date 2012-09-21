</div><!-- end content-container -->

</div><!-- end content -->

<div id="footer">

	<div id="footer-content" class="center-div">
	    <div id="custom-footer-text">
	        <p><?php echo get_theme_option('Footer Text'); ?></p>
            <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
	    </div>
		<ul class="navigation">
			<?php echo public_nav_main(array(__('Home') => url(''), __('Browse Items') => url('items'), __('Browse Collections') => url('collections')));
        	?>
		</ul>

        <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>
		
	</div><!-- end footer-content -->
	
	<?php echo plugin_footer(); ?>
	
</div><!-- end footer -->

</div><!--end wrap-->

</body>

</html>
