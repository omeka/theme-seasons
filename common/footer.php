</div><!-- end content -->

<footer role="contentinfo">

	<div id="ucsdlib-footer">
		<div id="custom-footer-text">
			<?php if ( $footerText = get_theme_option('Footer Text') ): ?>
				<?php echo $footerText; ?>
			<?php endif; ?>
		</div>
		<div id="library-logo">
			<a href='https://library.ucsd.edu'><img src="<?php echo img('library-logo-white.png'); ?>" alt="UC San Diego Library"></a>
		</div>
	</div>

	<?php fire_plugin_hook('public_footer', array('view' => $this)); ?>

</footer>

</div><!--end wrap-->

<script type="text/javascript">
jQuery(document).ready(function () {
    Omeka.showAdvancedForm();
    Omeka.skipNav();
    Omeka.megaMenu("#top-nav");
    Seasons.mobileSelectNav();
});
</script>

</body>

</html>
