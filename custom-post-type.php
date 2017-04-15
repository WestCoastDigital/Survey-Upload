<?php 

defined( 'ABSPATH' ) || die;

if ( ! function_exists('wcd_land_survey') ) {

// Register Custom Post Type
function wcd_land_survey() {

	$labels = array(
		'name'                  => _x( 'Surveys', 'Post Type General Name', 'wcd-survey' ),
		'singular_name'         => _x( 'Survey', 'Post Type Singular Name', 'wcd-survey' ),
		'menu_name'             => __( 'Surveys', 'wcd-survey' ),
		'name_admin_bar'        => __( 'Survey', 'wcd-survey' ),
		'archives'              => __( 'Survey Archives', 'wcd-survey' ),
		'attributes'            => __( 'Survey Attributes', 'wcd-survey' ),
		'parent_item_colon'     => __( 'Parent Survey:', 'wcd-survey' ),
		'all_items'             => __( 'All Surveys', 'wcd-survey' ),
		'add_new_item'          => __( 'Add New Survey', 'wcd-survey' ),
		'add_new'               => __( 'Add Survey', 'wcd-survey' ),
		'new_item'              => __( 'New Survey', 'wcd-survey' ),
		'edit_item'             => __( 'Edit Survey', 'wcd-survey' ),
		'update_item'           => __( 'Update Survey', 'wcd-survey' ),
		'view_item'             => __( 'View Survey', 'wcd-survey' ),
		'view_items'            => __( 'View Surveys', 'wcd-survey' ),
		'search_items'          => __( 'Search Survey', 'wcd-survey' ),
		'not_found'             => __( 'Survey Not found', 'wcd-survey' ),
		'not_found_in_trash'    => __( 'Survey Not found in Trash', 'wcd-survey' ),
		'featured_image'        => __( 'Survey Image', 'wcd-survey' ),
		'set_featured_image'    => __( 'Set survey image', 'wcd-survey' ),
		'remove_featured_image' => __( 'Remove survey image', 'wcd-survey' ),
		'use_featured_image'    => __( 'Use as survey image', 'wcd-survey' ),
		'insert_into_item'      => __( 'Insert into survey', 'wcd-survey' ),
		'uploaded_to_this_item' => __( 'Uploaded to this survey', 'wcd-survey' ),
		'items_list'            => __( 'Surveys list', 'wcd-survey' ),
		'items_list_navigation' => __( 'Surveys list navigation', 'wcd-survey' ),
		'filter_items_list'     => __( 'Filter surveys list', 'wcd-survey' ),
	);
	$args = array(
		'label'                 => __( 'Survey', 'wcd-survey' ),
		'description'           => __( 'Upload customer surveys', 'wcd-survey' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 25,
		'menu_icon'             => 'dashicons-admin-multisite',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'survey', $args );

}
add_action( 'init', 'wcd_land_survey', 0 );

}