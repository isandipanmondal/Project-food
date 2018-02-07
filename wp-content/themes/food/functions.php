<?php


// => support file

	require_once('lib/ReduxCore/framework.php');
	require_once('lib/sample/config.php');

// => metabox

	require_once('metabox/functions.php');
	require_once('metabox/init.php');




function all_link_function() {

	$pathlink = get_template_directory_uri();

	// css link
	wp_register_style( 'bootstrap', $pathlink.'/css/bootstrap.css' );
	wp_register_style( 'style', $pathlink.'/css/style.css' );
	wp_register_style( 'owl', $pathlink.'/css/owl.carousel.css' );
	wp_register_style( 'owltheme', $pathlink.'/owl.theme.css' );
	wp_register_style( 'awesome', $pathlink.'/css/font-awesome.css' );


	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'style' );
	wp_enqueue_style( 'owl' );
	wp_enqueue_style( 'owltheme' );
	wp_enqueue_style( 'awesome' );


	// js link

	wp_register_script( 'bootstrap', $pathlink.'/js/bootstrap.js', array('jquery') );
	wp_register_script( 'SmoothScroll', $pathlink.'/js/SmoothScroll.min.js', array('jquery') );
	wp_register_script( 'responsiveslides', $pathlink.'/js/responsiveslides.min.js', array('jquery') );
	wp_register_script( 'carousel', $pathlink.'/js/owl.carousel.js', array('jquery') );
	wp_register_script( 'myjs', $pathlink.'/myjs.js', array('jquery') );


	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'SmoothScroll' );
	wp_enqueue_script( 'responsiveslides' );
	wp_enqueue_script( 'carousel' );
	wp_enqueue_script( 'myjs' );

}


add_action( 'wp_enqueue_scripts', 'all_link_function' );


// default function

function essential_func() {

	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-thumbnails' );

	// for translate

	$domain = 'food-center';
	$path = get_template_directory_uri().'/languages';

	load_theme_textdomain( $domain, $path = false );

}

add_action( 'after_setup_theme', 'essential_func' );



// for navigation

function default_nav_func() {

	if (function_exists('register_nav_menu')) {
		
		$location = "main-menu";
		$description = __( 'Main menu', 'food-center' );

		register_nav_menu( $location, $description );

	}

}

add_action( 'after_setup_theme', 'default_nav_func' );


// my function here

function read_more($wordcount) {

	$cont = get_the_content();

	$convarr = explode(' ', $cont);

	$lessword = array_slice($convarr, 0, $wordcount);

	$maincont = implode(' ', $lessword);

	echo $maincont;

}


// for curousel setting

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function slider_register_name() {

	$labels = array(
		'name'               => __( 'Slider Name', 'text-domain' ),
		'singular_name'      => __( 'Slider Name', 'text-domain' ),
		'add_new'            => _x( 'Add New Slider', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Slider', 'text-domain' ),
		'edit_item'          => __( 'Edit Slider Name', 'text-domain' ),
		'new_item'           => __( 'New Slider Name', 'text-domain' ),
		'view_item'          => __( 'View Slider Name', 'text-domain' ),
		'search_items'       => __( 'Search Slider Name', 'text-domain' ),
		'not_found'          => __( 'No Slider Name found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Slider Name found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Singular Name:', 'text-domain' ),
		'menu_name'          => __( 'Slider', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-slides',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'trackbacks',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats',
		),
	);

	register_post_type( 'slider', $args );
}

add_action( 'after_setup_theme' , 'slider_register_name' );




// => curousel meta box start



function curousel_meta_box() {

	add_meta_box( 

		$id = 'curo-meta-box', 
		$title = 'Button name', 
		$callback = 'cur_button_name', 
		$screen = array('slider'), 
		$context = 'normal', 
		$priority = 'default', 
		$callback_args = null 

	);

}


function cur_button_name() {
	?>

	<label>Button name</label>
	<p>
		<input type="text" class="regular-text" name="cur-btn-name" value="<?php echo get_post_meta( get_the_ID(), $key = 'cur-btn-name', $single = true ); ?>">	
	</p>

	<label>URL</label>
	<p>
		<input type="text" class="regular-text" name="menu-url" value="<?php echo get_post_meta( get_the_ID(), $key = 'menu-url', $single = true ); ?>">

	</p>

	<?php
}

function cur_button_name_save($post_id) {

	$meta_key = 'cur-btn-name';
	$meta_value = $_POST['cur-btn-name'];

	update_post_meta( $post_id, $meta_key, $meta_value );
}

add_action( 'save_post', 'cur_button_name_save' );



function menu_url_name_save($post_id) {

	$meta_key = 'menu-url'; 
	$meta_value = $_POST['menu-url'];

	update_post_meta( $post_id, $meta_key, $meta_value );

}

add_action( 'save_post', 'menu_url_name_save' );



add_action( 'add_meta_boxes', 'curousel_meta_box' );


// => curousel meta box end

// for curousel setting end 


// => our service panel start 


/**
 * Registers a new post type for service 
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function service_register_name() {

	$labels = array(
		'name'               => __( 'Service', 'text-domain' ),
		'singular_name'      => __( 'Service', 'text-domain' ),
		'add_new'            => _x( 'Add New Service', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Service', 'text-domain' ),
		'edit_item'          => __( 'Edit Service Name', 'text-domain' ),
		'new_item'           => __( 'New Service Name', 'text-domain' ),
		'view_item'          => __( 'View Service Name', 'text-domain' ),
		'search_items'       => __( 'Search Service Name', 'text-domain' ),
		'not_found'          => __( 'No Service Name found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Service Name found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Service Name:', 'text-domain' ),
		'menu_name'          => __( 'Service Name', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-images-alt2',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'trackbacks',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats',
		),
	);

	register_post_type( 'service', $args );
}

add_action( 'after_setup_theme', 'service_register_name' );


// => metabox for servide icon


function service_meta_box() {


	add_meta_box( 

		$id = 'service-meta', 
		$title = 'Service Icon', 
		$callback = 'service_callback', 
		$screen = array('service'), 
		$context = 'normal', 
		$priority = 'default', 
		$callback_args = null 

	);

}


function service_callback() {

	?>

		<label>Icon name</label>
		<p>
			<input type="text" size="20" name="service-icon" value="<?php echo get_post_meta( get_the_ID(), $key = 'service-icon', $single = true ); ?>">
		</p>

	<?php
}

function service_save_data($post_id) {

	$meta_key = 'service-icon'; 
	$meta_value = $_POST['service-icon'];

	update_post_meta( $post_id, $meta_key, $meta_value );

}

add_action( 'save_post', 'service_save_data' );



add_action( 'add_meta_boxes', 'service_meta_box' );



// => our service panel end  



// => to day special section start


/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function special_register_name() {

	$labels = array(
		'name'               => __( 'Special', 'text-domain' ),
		'singular_name'      => __( 'Special', 'text-domain' ),
		'add_new'            => _x( 'Add New Special', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Special', 'text-domain' ),
		'edit_item'          => __( 'Edit Singular Name', 'text-domain' ),
		'new_item'           => __( 'New Singular Name', 'text-domain' ),
		'view_item'          => __( 'View Singular Name', 'text-domain' ),
		'search_items'       => __( 'Search Plural Name', 'text-domain' ),
		'not_found'          => __( 'No Plural Name found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Plural Name found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Singular Name:', 'text-domain' ),
		'menu_name'          => __( 'Special dish', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-images-alt',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'trackbacks',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats',
		),
	);

	register_post_type( 'special', $args );
}

add_action( 'after_setup_theme', 'special_register_name' );


// => to day special section end



// => footer section start


function footer_widgets() {

	/**
	 * Creates a sidebar
	 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	 */
	$args = array(
		'name'          => __( 'About food center', 'text-domain' ),
		'id'            => 'about-sidebar-id',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="col-md-3 agile-footer-grid">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	);
	
	register_sidebar( $args );


	/**
	 * Creates a sidebar
	 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	 */
	$args = array(
		'name'          => __( 'Twitter post', 'text-domain' ),
		'id'            => 'twitter-sidebar-id',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="col-md-3 agile-footer-grid">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	);
	
	register_sidebar( $args );


	/**
	 * Creates a sidebar
	 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	 */
	$args = array(
		'name'          => __( 'Popular Items', 'text-domain' ),
		'id'            => 'populer-sidebar-id',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="col-md-3 agile-footer-grid">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	);
	
	register_sidebar( $args );
	
}


add_action( 'widgets_init', 'footer_widgets' );



// => footer secton end



// => blog categories start



function blog_category() {

	/**
	 * Creates a sidebar
	 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	 */
	$args = array(
		'name'          => __( 'Categories', 'text-domain' ),
		'id'            => 'category-sidebar-id',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="categories">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	);
	
	register_sidebar( $args );



	/**
	 * Creates a sidebar
	 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	 */
	$args = array(
		'name'          => __( 'Archive', 'text-domain' ),
		'id'            => 'archive-sidebar-id',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="categories">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	);
	
	register_sidebar( $args );
	
	

}


add_action( 'widgets_init', 'blog_category' );


// => blog categories end


// => our team start


/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function ourteam_register_name() {

	$labels = array(
		'name'               => __( 'Our team', 'text-domain' ),
		'singular_name'      => __( 'Our team', 'text-domain' ),
		'add_new'            => _x( 'Add New Our team', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Our team', 'text-domain' ),
		'edit_item'          => __( 'Edit Singular Name', 'text-domain' ),
		'new_item'           => __( 'New Singular Name', 'text-domain' ),
		'view_item'          => __( 'View Singular Name', 'text-domain' ),
		'search_items'       => __( 'Search Plural Name', 'text-domain' ),
		'not_found'          => __( 'No Plural Name found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Plural Name found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Singular Name:', 'text-domain' ),
		'menu_name'          => __( 'Our team', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-groups',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'trackbacks',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats',
		),
	);

	register_post_type( 'ourteam', $args );
}

add_action( 'after_setup_theme' , 'ourteam_register_name' );


/*team metabox start*/



function team_meta_box() {

	add_meta_box( 

		$id = 'team-meta-id', 
		$title = 'Font awesome icon', 
		$callback = 'team_callback', 
		$screen = array('ourteam'), 
		$context = 'normal', 
		$priority = 'default', 
		$callback_args = null

	);

}


function team_callback() {
	?>

	<label for="text">Facebook icon</label>
	<p><input type="text" id="text" class="regular-text" size="20" name="team-facebook" value="<?php echo get_post_meta( get_the_ID(), $key = 'team-facebook', $single = true ); ?>"></p>

	<label for="text">Twitter icon</label>
	<p><input type="text" id="text" class="regular-text" size="20" name="team-twitter" value="<?php echo get_post_meta( get_the_ID(), $key = 'team-twitter', $single = true ); ?>"></p>
	
	<label for="text">Rss icon</label>
	<p><input type="text" id="text" class="regular-text" size="20" name="team-rss" value="<?php echo get_post_meta( get_the_ID(), $key = 'team-rss', $single = true ); ?>"></p>

	<?php
}


function team_meta_save_1($post_id) {

	$meta_key = 'team-facebook';
	$meta_value = $_POST['team-facebook'];
	update_post_meta( $post_id, $meta_key, $meta_value );

}

add_action( 'save_post', 'team_meta_save_1' );



function team_meta_save_2($post_id) {

	$meta_key = 'team-twitter';
	$meta_value = $_POST['team-twitter'];

	update_post_meta( $post_id, $meta_key, $meta_value );
}

add_action( 'save_post', 'team_meta_save_2' );


function team_meta_save_3($post_id) {

	$meta_key = 'team-rss'; 
	$meta_value = $_POST['team-rss'];

	update_post_meta( $post_id, $meta_key, $meta_value );

}

add_action( 'save_post', 'team_meta_save_3' );


add_action( 'add_meta_boxes', 'team_meta_box' );



/*team metabox end*/




// => our team end  