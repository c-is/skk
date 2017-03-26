<?php

function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	}
	else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

function get_relative_permalink( $url ) {
	return str_replace( home_url(), "", $url );
}

function the_slug($echo=true){
	$slug = basename(get_permalink());
	do_action('before_slug', $slug);
	$slug = apply_filters('slug_filter', $slug);
	if( $echo ) echo $slug;
	do_action('after_slug', $slug);
	//return $slug;
}

add_action('json_api_post_constructor', 'strip_json_post_html');

function strip_json_post_html($post) {
	//$post->content = strip_tags($post->content);
	$post->excerpt = strip_tags($post->excerpt);
}
/*
* Add thumbnails in a post
*/
add_theme_support( 'post-thumbnails' );

function my_rest_prepare_post( $data, $post, $request ) {
	$_data = $data->data;
	$thumbnail_id = get_post_thumbnail_id( $post->ID );
	$thumbnail = wp_get_attachment_image_src( $thumbnail_id, 'large' );
	$_data['featured_media'] = $thumbnail[0];
	unset($_data['guid'], $_data['comment_status'], $_data['ping_status'], $_data['date_gmt'], $_data['modified_gmt'], $_data['_links']);

	$data->data = $_data;
	return $data;
}
add_filter( 'rest_prepare_post', 'my_rest_prepare_post', 10, 3 );

/**
 * add custom post[study_report]
 *
 *
 */
function custom_post_type() {
	$main_label = '報告書・研究結果';
	$labels = array (
		'name' => _x($main_label, '報告書・研究結果'),
		'singular_name' => _x($main_label, '報告書・研究結果')
	);
	$supports = array (
		'title',
		'editor',
		'thumbnail',
		'page-attributes',
		'post-formats'
	);
	$args = array (
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' =>  array('slug' => 'study_report', 'with_front' => false),
		'hierarchical' => true,
		'menu_position' => 5,
		'supports' => $supports,
		'has_archive' => true,
		'paged' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		//'taxonomies' => array('study_report_type')
	);
	register_post_type('study_report', $args);
}
add_action('init', 'custom_post_type');