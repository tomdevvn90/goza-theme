<?php

/**
 * Use this file to register any custom post types you wish to create.
 */
if ( ! function_exists( 'goza_create_custom_post_type' ) ) {
	// Register Custom Post Type
	function goza_create_custom_post_type() {
		register_post_type( 'events', array(
			'label'               => __( 'Events', 'goza' ),
			'description'         => __( 'Events', 'goza' ),
			//'labels'                => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
			'taxonomies'          => array( '' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'		  => 'dashicons-calendar',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
		) );

	}

	//add_action( 'init', 'goza_create_custom_post_type', 0 ); // Register Custom Taxonomy
}

if ( ! function_exists( 'goza_create_custom_taxonomy' ) ) {
	function goza_create_custom_taxonomy() {
		register_taxonomy('taxonomy', array('events'), array(
			'labels'            => array(
				'name'          => _x('Taxonomy', 'Taxonomy General Name', 'goza'),
				'singular_name' => _x('Taxonomy', 'Taxonomy Singular Name', 'goza'),
				'menu_name'     => __('Taxonomy', 'goza'),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		));
	}

	//add_action( 'init', 'goza_create_custom_taxonomy', 0 );
}
