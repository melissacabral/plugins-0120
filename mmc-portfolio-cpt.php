<?php
/*
Plugin Name: MMC Portfolio CPT
Description: Adds a custom post type for portfolio pieces
Author: Melissa Cabral
Version: 0.1
License: GPLv3
*/

add_action( 'init', 'mmc_register_cpt' );
function mmc_register_cpt(){
	register_post_type( 'portfolio_piece', array(
		'public' 			=> true,
		'label' 			=> 'Portfolio',
		'menu_position'		=> 5,
		'menu_icon'			=> 'dashicons-format-gallery',
		'has_archive'		=> true,
		'show_in_rest'		=> true, //use new editor
		'supports'			=> array( 'title', 'editor', 'thumbnail', 'excerpt', 
									'revisions', 'custom-fields' ),
		'rewrite'			=> array( 'slug' => 'portfolio' ), //custom URL
		'labels'			=> array(
									'name' 			=> 'Portfolio',
									'singular_name' => 'Portfolio Piece',
									'add_new_item'	=> 'Add New Portfolio Piece',
									'not_found'		=> 'No Pieces Found',
								),
	) );
}
