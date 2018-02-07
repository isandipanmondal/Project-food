<?php  

	get_header();

	$url = get_template_directory_uri();
		
?>

<div class="about-heading">
		<h2>Our Blog</h2>
	</div>
</div>
<!-- //banner -->
	
	<div class="blog-new">
		<div class="container">
			<div class="agile-blog-grids">
				<div class="col-md-8 agile-blog-grid-left">

					<?php  

						$postitem = new WP_Query(

							array(

								'post_type' => 'post',
								'order' => 'ASC'
							)

						)


					?>



					<?php while( $postitem -> have_posts()) : $postitem -> the_post(); ?>

					<div class="agile-blog-grid">
						<div class="agile-blog-grid-left-img">

							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( $size = 'full', $attr = '' ) ?>
							</a>
						</div>
						<div class="blog-left-grids">
							<div class="blog-left-left">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</div>
							<div class="blog-left-right">
								<div class="blog-left-right-top">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title( $before = '', $after = '', $echo = true ) ?></a></h4>

									<p>Posted By <a href="#"><?php the_author(); ?></a> 

										&nbsp;&nbsp; on <?php the_time('M d, Y'); ?>&nbsp;&nbsp; 

									   <?php comments_popup_link('No comment', 'one comment', '% More comments', '', 'Comment off'); ?>
									</p>
								</div>
								<div class="blog-left-right-bottom">
									<p><?php read_more(50); ?></p>
									
									<a href="<?php the_permalink(); ?>">More</a>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					<?php endwhile; ?>


	


					<nav>

						<ul class="pagination">

						<?php  


							$args = array(

								'prav_text' => '«',
								'next_text' => '»',
								'screen_reader_text' => ' '

							);

							the_posts_pagination( $args );

						?>
							
						</ul>


					</nav>


				</div>


				<div class="col-md-4 agile-blog-grid-right">
					<?php get_sidebar( $name = null ); ?>
				</div>



				<div class="clearfix"> </div>
			</div>
		</div>
	</div>



<?php get_footer(); ?>