<?php

/*Template Name: Home*/  

	get_header();
	$url = get_template_directory_uri();
	global $food_opt;

	$prefix = "new-meta";

?>

<script>
jQuery(document).ready(function() { 
	jQuery("#owl-demo").owlCarousel({
 
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		autoPlay:true,
		items : 4,
		itemsDesktop : [640,5],
		itemsDesktopSmall : [414,4]
 
	});
	
}); 
</script>

		<div class="banner-slider">
			<div class="container">
				<div class="slider">
					<div class="callbacks_container">
						<ul class="rslides" id="slider4">

							<?php  

								$slideritem = new WP_Query(

									array(

										'post_type' => 'slider',
										'posts_per_page' => -1,
										'order' => 'ASC',

									)

								)

							?>



							<?php while( $slideritem-> have_posts()) : $slideritem -> the_post(); ?>
							<li>
								<div class="banner-info">
									<h3><?php the_title(); ?></h3>
									<p><?php read_more(33); ?> </p>
									<a href="<?php echo get_post_meta( get_the_ID(), $key = 'menu-url', $single = true ); ?>">
										<?php echo get_post_meta( get_the_ID(), $key = 'cur-btn-name', $single = true ); ?>		
									</a>
								</div>
							</li>
							<?php endwhile; ?>


						</ul>
					</div>
					<script>
						// You can also use "$(window).load(function() {"
						jQuery(function () {
						  // Slideshow 4
						  jQuery("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  jQuery('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  jQuery('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
					 </script>
					<!--banner Slider starts Here-->
				</div>
			</div>
		</div>
	</div>
	<!-- //banner -->
	
	<!-- history -->
	<div class="history">
		<div class="container">
			<div class="w3l-history-grids">
				<div class="col-md-5 w3l-history-left">
					<img src="<?php echo $food_opt [ 'pro-image' ][ 'url' ] ?>" alt="" /> 

					
				</div>
				<div class="col-md-7 w3l-history-right">
					<h2><?php echo $food_opt ['pro-text'] ?></h2>
					<p><?php echo $food_opt ['pro-details'] ?> </p>
					<a href="<?php echo $food_opt ['pro-link'] ?>"><?php echo $food_opt ['pro-btn'] ?></a> 
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- history -->
	
	<!-- services -->
	<div class="services">
		<div class="container">
			<div class="services-info">
				<h3>Our Services</h3>
				<p>Pellentesque ultrices tincidunt risus in pellentesque. Morbi facilisis consectetur nunc in luctus.</p>
			</div>
		</div>
		<div class="services-grids">
			<div id="owl-demo" class="owl-carousel owl-theme">

					<?php  

						$serviceitem = new WP_Query(

							array(

								'post_type' => 'service',
								'posts_per_page' => -1,
								'order' => 'ASC',
							)

						);

					?>
					

					<?php while( $serviceitem -> have_posts()) : $serviceitem -> the_post(); ?>

					<div class="item">
						<div class="services-grid-info">
							<!-- <img src="<//?php echo $url; ?>/images/s1.jpg" alt="" /> -->
							<?php the_post_thumbnail(); ?>
							<div class="services-grid-caption"> 
								<i class="fa <?php echo get_post_meta( get_the_ID(), $key = 'service-icon', $single = true ); ?>" aria-hidden="true"></i>
								<h4><?php the_title(); ?></h4>
								<p><?php the_content(); ?></p>
							</div>
						</div>	
					</div>

					<?php endwhile ?>
			</div>
		</div>
	</div>
	<!-- //services -->
	
	<!-- special -->
	<div class="special">
		<div class="container">
			<div class="services-info">
				<h3>Today Specials</h3>
				<p>Pellentesque ultrices tincidunt risus in pellentesque. Morbi facilisis consectetur nunc in luctus.</p>
			</div>

			<div class="special-grids">


				<?php  

					$specialitem = new WP_Query(

						array(

							'post_type' => 'special',
							'posts_per_page' => 4,
							'order' => 'ASC',

						)

					);


				?>



				<?php $i=0; while( $specialitem -> have_posts()) : $specialitem -> the_post(); $i++;?>

				<div class="col-md-6 w3l-special-grid <?php echo $i; ?>">
				<?php if($i == 3 || $i == 4 ): ?>
					<div class="col-md-6 agileits-special-info">
						<h4><?php the_title(); ?></h4>
						<p><?php the_content(); ?></p>
					</div>
				<?php endif; ?>	
					<div class="col-md-6 w3ls-special-img" style="background: url(<?php echo get_post_meta( get_the_ID(), $key = $prefix.'image-file', $single = true ) ?>) no-repeat 0px 0px; background-size: cover;">

						<div class="wpf-demo-6">
							<div class="w3ls-special-text">
								<p><sub>$</sub><?php echo get_post_meta( get_the_ID(), $key = $prefix.'text-money', $single = true ) ?></p>
							</div>
							<figcaption class="view-caption">
								<h4><?php echo get_post_meta( get_the_ID(), $key = $prefix.'text-id', $single = true ) ?></h4> 
								<a href="<?php echo get_post_meta( get_the_ID(), $key = $prefix.'url-text', $single = true ) ?>"><?php echo get_post_meta( get_the_ID(), $key = $prefix.'text-btn-name', $single = true ) ?></a>
							</figcaption>
						</div>
					</div>
					<?php if($i == 1 || $i == 2 ): ?>
					<div class="col-md-6 agileits-special-info">
						<h4><?php the_title(); ?></h4>
						<p><?php the_content(); ?></p>
					</div>
				<?php endif; ?>
					<div class="clearfix"> </div>
				</div>

				<?php endwhile; ?>

				<!-- <div class="col-md-6 w3l-special-grid">
					<div class="col-md-6 w3ls-special-img wthree-img">
						<div class="wpf-demo-6">
							<div class="w3ls-special-text">
								<p><sub>$</sub>130</p>
							</div>
							<figcaption class="view-caption">
								<h4>Lorem ipsum dolor sit amet</h4> 
								<a href="menu.html">Menu</a>
							</figcaption>
						</div>
					</div>
					<div class="col-md-6 agileits-special-info">
						<h4>Nullam</h4>
						<p>Maecenas ac hendrerit purus. Lorem ipsum dolor sit amet</p>
					</div>
					<div class="clearfix"> </div>
				</div> -->


				<!-- <div class="col-md-6 w3l-special-grid">
					<div class="col-md-6 agileits-special-info">
						<h4>Aliquam</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
					</div>
					<div class="col-md-6 w3ls-special-img wthree-img2">
						<div class="wpf-demo-6">
							<div class="w3ls-special-text">
								<p><sub>$</sub>190</p>
							</div>
							<figcaption class="view-caption">
								<h4>Lorem ipsum dolor sit amet</h4> 
								<a href="menu.html">Menu</a>
							</figcaption>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div> -->


				<!-- <div class="col-md-6 w3l-special-grid">
					<div class="col-md-6 agileits-special-info">
						<h4>Nullam</h4>
						<p>Maecenas ac hendrerit purus. Lorem ipsum dolor sit amet</p>
					</div>
					<div class="col-md-6 w3ls-special-img wthree-img3">
						<div class="wpf-demo-6">
							<div class="w3ls-special-text">
								<p><sub>$</sub>105</p>
							</div>
							<figcaption class="view-caption">
								<h4>Lorem ipsum dolor sit amet</h4> 
								<a href="menu.html">Menu</a>
							</figcaption>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div> -->



				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //special -->



<?php get_footer(); ?>