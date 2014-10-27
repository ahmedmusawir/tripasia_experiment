<?php
/**
 * Plugin Name: Custom Post Types and Taxonomies
 * Plugin URI: http://yoursite.com
 * Description: A simple plugin that adds custom post types and taxonomies
 * Version: 0.1
 * Author: Your Name
 * Author URI: http://yoursite.com
 * License: GPL2
 */

/*  Copyright YEAR  YOUR_NAME  (email : your@email.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
function my_custom_posttypes() {
    
    $labels = array(
        'name'               => 'Countrys',
        'singular_name'      => 'Country',
        'menu_name'          => 'Countrys',
        'name_admin_bar'     => 'Country',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Country',
        'new_item'           => 'New Country',
        'edit_item'          => 'Edit Country',
        'view_item'          => 'View Country',
        'all_items'          => 'All Countrys',
        'search_items'       => 'Search Countrys',
        'parent_item_colon'  => 'Parent Countrys:',
        'not_found'          => 'No countrys found.',
        'not_found_in_trash' => 'No countrys found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-id-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'countrys' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'         => array( 'category' )
    );
    register_post_type( 'country', $args );
}
add_action( 'init', 'my_custom_posttypes' );

// Flush rewrite rules to add "review" as a permalink slug
function my_rewrite_flush() {
    my_custom_posttypes();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

/*==================================
=            Taxonomies            =
==================================*/

function my_custom_taxonomies() {
    
    // Type of Product taxonomy
    $labels = array(
        'name'              => 'Type of Products',
        'singular_name'     => 'Type of Product',
        'search_items'      => 'Search Types of Products',
        'all_items'         => 'All Types of Products',
        'parent_item'       => 'Parent Type of Product',
        'parent_item_colon' => 'Parent Type of Product:',
        'edit_item'         => 'Edit Type of Product',
        'update_item'       => 'Update Type of Product',
        'add_new_item'      => 'Add New Type of Product',
        'new_item_name'     => 'New Type of Product Name',
        'menu_name'         => 'Type of Product',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-types' ),
    );

    register_taxonomy( 'product-type', array( 'country', 'post' ), $args );

    // Mood taxonomy (non-hierarchical)
    $labels = array(
        'name'                       => 'Moods',
        'singular_name'              => 'Mood',
        'search_items'               => 'Search Moods',
        'popular_items'              => 'Popular Moods',
        'all_items'                  => 'All Moods',
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Edit Mood',
        'update_item'                => 'Update Mood',
        'add_new_item'               => 'Add New Mood',
        'new_item_name'              => 'New Mood Name',
        'separate_items_with_commas' => 'Separate moods with commas',
        'add_or_remove_items'        => 'Add or remove moods',
        'choose_from_most_used'      => 'Choose from the most used moods',
        'not_found'                  => 'No moods found.',
        'menu_name'                  => 'Moods',
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'moods' ),
    );

    register_taxonomy( 'mood', array( 'country', 'post' ), $args );
}

add_action( 'init', 'my_custom_taxonomies' );