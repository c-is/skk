<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

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

function calendar_wareki($ymd) {
    list($y,$m,$d) = explode("/",$ymd);
	$yyyymmdd =  str_replace( "/", "", $ymd );
	$flg = 0;

	// Calendar.txt から和暦年号・名称を取得
	// Calendar.txtは、テーマの中にある
	$fp = fopen(dirname(__FILE__).'/Calendar.txt', 'r');

	while (!feof($fp)) {
		$line = fgets($fp);
		$calender = explode(',',$line);

		// Calendar.txt中身
		// 暦開始日,暦終了日,和暦名
		$txt_calender = array("NewYear" => $calender[0],"LastYear" => $calender[1], "Name" => $calender[2]);

		if($txt_calender["LastYear"] != null && $flg == 0){
			if($yyyymmdd >= $txt_calender["NewYear"] && $yyyymmdd = $txt_calender["NewYear"] ){
				$yyyy = substr( $txt_calender["NewYear"], 0, 4 ) - 1;
				$yy = $y - $yyyy;
				$wareki = "{$txt_calender["Name"]}{$yy}.{$m}.{$d}";
				$flg = 1;

				echo $wareki;
			}
		}
	}
	fclose($fp);
}

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