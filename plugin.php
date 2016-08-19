<?php
/*
Plugin Name: David's Plugin

Plugin URI: http://phoenix.sheridanc.on.ca/~ccit3668/wp-admin/edit.php?post_type=backpackerss

Description: 460 Plug-in

Author: Janssen David Sanchez

Author URI: http://phoenix.sheridanc.on.ca/~ccit3668/

*/
/*
* This code was taken from "http://www.wpbeginner.com/wp-tutorials/how-to-create-custom-post-types-in-wordpress/""
*/
// Adds custom post type function

function backpacker_cpt() {
    register_post_type( 'Countries',
                       
    // CPT Option
        array(
            'labels' => array(
                'name' => __( 'Countries' ),
                'singular_name' => __( 'Country' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Countries'),
        )
    );
}
// This will hook up the function to theme setup
add_action( 'init', 'backpacker_cpt' );


/*
* This creates the function to create the custom post type
*/
function backpacker_custom() {
    
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Countries', 'Post Type General Name', 'travellersblog_ds' ),
        'singular_name'       => _x( 'Country', 'Post Type Singular Name', 'travellersblog_ds' ),
        'menu_name'           => __( 'Countries menu', 'travellersblog_ds' ),
        'parent_item_colon'   => __( 'Parent  backpacker', 'travellersblog_ds' ),
        'all_items'           => __( 'All countries', 'travellersblog_ds' ),
        'view_item'           => __( 'View country', 'travellersblog_ds' ),
        'add_new_item'        => __( 'Add new country', 'travellersblog_ds' ),
        'add_new'             => __( 'Add New', 'travellersblog_ds' ),
        'edit_item'           => __( 'Edit country', 'travellersblog_ds' ),
        'update_item'         => __( 'Update country', 'travellersblog_ds' ),
        'search_items'        => __( 'Search country', 'travellersblog_ds' ),
        'not_found'           => __( 'Not Found', 'travellersblog_ds' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'travellersblog_ds' ),
    );
    
// Set other options for Custom Post Type
    $args = array(
        'label'               => __( 'backpackers', 'travellersblog_ds' ),
        'description'         => __( ' backpacker news and media', 'travellersblog_ds' ),
        'labels'              => $labels,
        
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( ' backpacker', $args );
}
add_action( 'init', 'backpacker_custom', 0 );
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', ' backpacker' ) );
    return $query;
}
?>