<?php  

	get_header();
	$url = get_template_directory_uri();
?>

		<div class="about-heading">
			<h2>Single Page</h2>
		</div>
	</div>
	<!-- //banner -->
	
	<div class="blog-new">
		<div class="container">
			<div class="agile-blog-grids">
				<div class="col-md-8 agile-blog-grid-left">
					<div class="agile-blog-grid">


						<?php while(have_posts()) : the_post(); ?>


						<div class="agile-blog-grid-left-img">
							<?php the_post_thumbnail( $size = 'full', $attr = '' ) ?>
							<hr style="border: none;">
						</div>
						<div class="blog-left-grids">
							<div class="blog-left-left">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</div>
							<div class="blog-left-right">
								<div class="blog-left-right-top">
									<h4><?php the_title( $before = '', $after = '', $echo = true ) ?></h4>
									<p>Posted By 

										<a href="#"><?php the_author(); ?></a> 
										&nbsp;&nbsp; on <?php the_time('M d, Y'); ?> &nbsp;&nbsp; 
										<?php comments_popup_link('No comments', 'One comment', '% More comments', '', 'Comments off' ); ?>

									</p>
								</div>
								<div class="blog-left-right-bottom">
									<p><?php the_content(); ?></p>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>

					



						<div class="response">
								<h3>Responses</h3>
								<!-- <div class="media response-info">
									<div class="media-left response-text-left">
										<a href="#">
											<img class="media-object" src="images/t1.jpg" alt="">
										</a>
										<h5><a href="#">Admin</a></h5>
									</div>
									<div class="media-body response-text-right">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
											sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										<ul>
											<li>June 21, 2016</li>
											<li><a href="single.html">Reply</a></li>
										</ul>
										<div class="media response-info">
											<div class="media-left response-text-left">
												<a href="#">
													<img class="media-object" src="images/t2.jpg" alt="">
												</a>
												<h5><a href="#">Admin</a></h5>
											</div>
											<div class="media-body response-text-right">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
													sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
												<ul>
													<li>June 21, 2016</li>
													<li><a href="single.html">Reply</a></li>
												</ul>		
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									<div class="clearfix"> </div>
								</div> -->
								<!-- <div class="media response-info">
									<div class="media-left response-text-left">
										<a href="#">
											<img class="media-object" src="images/t3.jpg" alt="">
										</a>
										<h5><a href="#">Admin</a></h5>
									</div>
									<div class="media-body response-text-right">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
											sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										<ul>
											<li>June 21, 2016</li>
											<li><a href="single.html">Reply</a></li>
										</ul>		
									</div>
									<div class="clearfix"> </div>
								</div> -->
						</div>


						<?php comments_template() ?>
						
						<!-- <div class="opinion">
							<h3>Leave Your Comment</h3>
							<form action="#" method="post">
								<input type="text" name="Name" placeholder="Name" required="">
								<input type="text" name="Email" placeholder="Email" required="">
								<textarea name="Message" placeholder="Message" required=""></textarea>
								<input type="submit" value="SEND">
							</form>
						</div> -->

						<?php endwhile; ?>
					</div>
				</div>


				<div class="col-md-4 agile-blog-grid-right">

					<?php get_sidebar( $name = null ); ?>
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	<?php get_footer(); ?>