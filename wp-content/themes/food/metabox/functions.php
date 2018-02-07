<?php


function cus_meta_box(array $new_meta_box) {

	$prefix = "new-meta";

	$new_meta_box[] = array(

		'id' => 'first-scetion',
		'title' => 'All information',
		'object_types' => array('special'),
		'fields' => array(

				array(
					'id'   => $prefix.'text-id', 
				    'name' => 'Simple text contain', 
				    'type' => 'text', 
				),

				array(
					'id'   => $prefix.'text-money', 
				    'name' => 'Write your amount', 
				    'type' => 'text_money', 
				),

				array( 
				    'id'   => $prefix.'image-file', 
				    'name' => 'Set your image', 
				    'type' => 'file', 
				    'allow' => array('url', 'attachment'),
				),

				array(
					'id'   => $prefix.'text-btn-name', 
				    'name' => 'Button name', 
				    'type' => 'text', 
				),

				array( 
				    'id'   => $prefix.'url-text', 
				    'name' => 'Button URL here', 
				    'type' => 'text_url', 
				),


		)

	);

	return $new_meta_box;

}

add_filter( 'cmb2_meta_boxes', 'cus_meta_box'  );


// => team meta boxs start


function team_meta_box_link(array $team_meta_link_box) {

	$prefix = "new-meta";

	$team_meta_link_box[] = array(

		'id' => 'team-meta-box-text',
		'title' => 'Social link',
		'object_types' => array('ourteam'),
		'fields' => array(

				array(
					'id'   => $prefix.'face-link', 
				    'name' => 'Facebook', 
				    'type' => 'text', 
				),

				array(
					'id'   => $prefix.'twitter-link', 
				    'name' => 'Twitter', 
				    'type' => 'text', 
				),

				array(
					'id'   => $prefix.'rss-link', 
				    'name' => 'Rss', 
				    'type' => 'text', 
				),

		)


	);

	return $team_meta_link_box;

} 


add_filter( 'cmb2_meta_boxes', 'team_meta_box_link' );



// => team meta boxs end  



