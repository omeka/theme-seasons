</div><!-- end content-container -->

</div><!-- end content -->

<div id="footer">

	<div id="footer-content" class="center-div">
		<ul class="navigation">
			<?php echo public_nav_main(array('Home' => uri(''), 'Browse Items' => uri('items'), 'Browse Collections'=>uri('collections')));
        	?>
		</ul>

		<p>Proudly powered by <a href="http://omeka.org">Omeka</a></p>
		
	</div><!-- end footer-content -->
	
	<?php echo plugin_footer(); ?>
	
</div><!-- end footer -->

</div><!--end wrap-->

</body>

</html>