<?php  

	global $food_opt;

?>

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( $show = 'charset' ); ?>" />
<meta name="keywords" content="<?php bloginfo( $show = 'description' ); ?>" /> 
<script type="application/x-javascript">
	 addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
</script>


<!-- font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>"> 


<?php wp_head(); ?>


</head>
<body <?php body_class(); ?>>
	<!-- banner -->
	<div class="banner about-bg">
		<!--header-->
		<div class="header">
			<div class="logo">
				<h1><a href="<?php bloginfo( $show = 'home' ); ?>">Food Corner</a></h1> 
			</div>
			<div class="top-nav"> 
				<span class="menu"><img src="<?php echo $url; ?>/images/menu.png" alt=""/></span>


				<?php  

					if (function_exists('wp_nav_menu')) {
						
						wp_nav_menu( array(
						'theme_location'  => 'main-menu',
						'menu'            => '',
						'container'       => 'div',
						'container_class' => 'menu-{menu-slug}-container',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
					) );

					}

					

				?>


				<!-- script-for-menu -->
				<script>					
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle("slow" , function(){
						});
					});
				</script>
				<!-- script-for-menu -->
			</div>
				<div class="clearfix"> </div>
		</div>	

		<!--//header-->