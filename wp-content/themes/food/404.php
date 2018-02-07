<?php  

	get_header();

	$url = get_template_directory_uri();
		
?>

<div class="about-heading">
		<h2>404 page</h2>
	</div>
</div>
<!-- //banner -->
	
	<div class="blog-new">
		<div class="container">
			<div class="agile-blog-grids">
				<div class="col-md-12 agile-blog-grid-left">
				<center>
					<img src="https://internetdevels.com/sites/default/files/public/styles/937s/public/blog_preview/404_page_cover.jpg?itok=p0sVCJva">
					<hr>
					<p>This is 404 page, are you looking for anything else. Please go <a href="<?php bloginfo( $show = 'home' ); ?>">Home</a> page </p> 

				</center>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>



<?php get_footer(); ?>