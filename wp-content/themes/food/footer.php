<?php  

	$url = get_template_directory_uri();

	global $food_opt;
		
?>


	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="agile-footer-grids">

				<?php dynamic_sidebar( 'about-sidebar-id' ); ?>


				<?php dynamic_sidebar( 'twitter-sidebar-id' ); ?>

				<?php dynamic_sidebar( 'populer-sidebar-id' ); ?>


				<div class="col-md-3 agile-footer-grid">
					<h4>Newsletter</h4>
					<p>Sed pellentesque elit sit amet lorem fermentum, vitae maximus tortor accumsan.</p>
					<form action="#" method="post">
						<input type="email" name="Email" placeholder="Email" required="">
						<input type="submit" value="Subscribe">
					</form>
				</div>



				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //footer -->


	<!-- agileits-copyright -->
	<div class="agileits-copyright">
		<div class="container">
			<p><?php echo $food_opt['footer-editor']; ?></p>
		</div>
	</div>
	<!-- //agileits-copyright -->

	<?php wp_footer(); ?>
</body>	
</html>