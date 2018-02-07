<?php  

	/*Template Name: about us*/
	get_header( $name = null );
	$url = get_template_directory_uri();
	global $food_opt;

	$prefix = "new-meta";
	
?>
	<!--//header-->
		<div class="about-heading">
			<h2>About US</h2>
		</div>
	</div>
	<!--//header end-->

	<!-- about-top -->
	<div class="agile-about-top">
		<div class="container">
			<div class="about-section">
				<div class="col-md-7 ab-left">
				  <div class="grid">

			        <div class="h-f">
						<figure class="effect-jazz">
						<img src="<?php echo $food_opt['text-image-one']['url']?>" alt="img25"> 
							<figcaption>
								<h4><?php echo $food_opt['honest-text']; ?> <span><?php echo $food_opt['food-text'] ?></span></h4>
								<p><?php echo $food_opt['honest-editor']; ?></p>
							</figcaption>			
						</figure>
				 	</div>

					 <div class="h-f">
						<figure class="effect-jazz">
							<img src="<?php echo $food_opt['text-image-one-2']['url']; ?>" alt="img25">
							<figcaption>
								<h4> <?php echo $food_opt['honest-text-2'] ?> <span><?php echo $food_opt['food-text-2'] ?></span></h4>
								<p><?php echo $food_opt['honest-editor-2'] ?></p>
							</figcaption>			
						</figure>
					 </div>

				 <div class="clearfix"> </div>
				 </div>
			   </div>
			   <div class="col-md-5 ab-text">
			         <h3><?php echo $food_opt['title-text']; ?></h3>
					 <p><?php echo $food_opt['about-editor']; ?></p>
				</div>
				<div class="clearfix"> </div>
			 </div>
		</div>
	</div>
	<!-- //about-top -->
	
	<!-- team -->
	<div class="jarallax team">
		<div class="container">
			<div class="team-heading">
				<h3>Our Team</h3>
				<p>Pellentesque ultrices tincidunt risus in pellentesque. Morbi facilisis consectetur nunc in luctus.</p>
			</div>
			<div class="agileits-team-grids">


				<?php  

					$teamitem = new WP_Query(

						array(

							'post_type' => 'ourteam',
							'posts_per_page' => 4,
							'order' => 'ASC',
						)

					)

				?>

				
				<?php while( $teamitem ->  have_posts()) : $teamitem -> the_post(); ?>

					<div class="col-md-3 agileits-team-grid">
						<div class="team-info">
							<?php the_post_thumbnail( $size = 'medium_large', $attr = '' ) ?>
							<div class="team-caption"> 
								<h4><?php the_title( $before = '', $after = '', $echo = true ); ?></h4>
								<p><?php the_content( $more_link_text = null, $strip_teaser = false ); ?></p>
								<ul>

									<li>
										<a href="<?php echo get_post_meta( get_the_ID(), $key = $prefix.'face-link', $single = true ); ?>">
											<i class="fa <?php echo get_post_meta( get_the_ID(), $key = 'team-facebook', $single = true ); ?>"></i>
										</a>
									</li>
									<li>

										<a href="<?php echo get_post_meta( get_the_ID(), $key = $prefix.'twitter-link', $single = true ); ?>">
											<i class="fa <?php echo get_post_meta( get_the_ID(), $key = 'team-twitter', $single = true ); ?>"></i>
										</a>
									</li>
									<li>

										<a href="<?php echo get_post_meta( get_the_ID(), $key = $prefix.'rss-link', $single = true ) ?>">
											<i class="fa <?php echo get_post_meta( get_the_ID(), $key = 'team-rss', $single = true ); ?>"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

				<?php endwhile; ?>


				<!-- <div class="col-md-3 agileits-team-grid">
					<div class="team-info">
						<img src="<?php echo $url;?>/images/t2.jpg" alt="" />
						<div class="team-caption"> 
							<h4>Justo congue</h4>
							<p>Fusce laoreet</p>
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				</div> -->


				<!-- <div class="col-md-3 agileits-team-grid">
					<div class="team-info">
						<img src="<?php echo $url;?>/images/t3.jpg" alt="" />
						<div class="team-caption"> 
							<h4>Justo congue</h4>
							<p>Fusce laoreet</p>
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				</div> -->


				<!-- <div class="col-md-3 agileits-team-grid">
					<div class="team-info">
						<img src="<?php echo $url;?>/images/t4.jpg" alt="" />
						<div class="team-caption"> 
							<h4>Justo congue</h4>
							<p>Fusce laoreet</p>
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				</div> -->


				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //team -->
	
	<!-- events -->
	<div class="events">
		<div class="container">
			<div class="team-heading">
				<h3>News & Events</h3>
				<p>Pellentesque ultrices tincidunt risus in pellentesque. Morbi facilisis consectetur nunc in luctus.</p>
			</div>


			<div class="w3l-event-grids">

				<?php  

					$postItems = new WP_Query(

						array(

							'post_type' => 'post',
							'posts_per_page' => 2,
							'order' => 'ASC',
						)

					);

				?>


				<?php while( $postItems -> have_posts()) : $postItems -> the_post(); ?>

				<div class="col-md-6 w3l-event-grid">
					<div class="w3l-event-img">
						<a href="single.html">
							<?php the_post_thumbnail( $size = 'post-thumbnail', $attr = '' ) ?>
						</a>
					</div>
					<div class="news-grid-info"> 

						

						<a href="single.html"><?php the_title( $before = '', $after = '', $echo = true ) ?></a>
						<h5><?php the_date('d M') ?> | <?php the_time('i:m:s a') ?></h5>
						<p><?php the_content( $more_link_text = null, $strip_teaser = false ) ?></p>
					</div>
				</div>

				<?php endwhile; ?>

				<!-- <div class="col-md-6 w3l-event-grid">
					<div class="w3l-event-img">
						<a href="single.html"><img src="<?php echo $url;?>/images/e2.jpg" alt="" /></a>
					</div>
					<div class="news-grid-info">
						<a href="single.html">Donec cursus felis a enim egestas</a>
						<h5>12th August | 04:00 - 08:00</h5>
						<p>Etiam ex lorem cursus vitae placerat suscipit dapibus tortor sed nec augue vitae placerat suscipit dapibus tortor sed nec augue enim rhoncus ultricies eros interdum aliquam eros iaculis id.</p>
					</div>
				</div> -->


				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //events -->

	<?php get_footer( $name = null ); ?>