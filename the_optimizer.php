<?php
/**
 * Custom Optimizer for Wordpress
 *
 * @package   the_optimizer_plugin
 * @author    Alessandro Trasmondi
 * @license   GPL-2.0+
 * @link      https://github.com/atrasmo/the_optimizer_plugin
 * @copyright 2019 Alessandro Trasmondi
 *
 * @wordpress-plugin
 * Plugin Name:       The Optimizer
 * Plugin URI:        https://github.com/atrasmo/the_optimizer_plugin
 * Description:       Ottimizzare il proprio sito secondo regole e canoni comuni.
 * Version:           1.0.0
 * Author:            Alessandro Trasmondi
 * Author URI:        https://github.com/atrasmo/
 * Text Domain:       the-optimizer-plugin
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/atrasmo/the_optimizer_plugin
 * GitHub Branch:     master
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( is_admin() ) {
    // we are in admin mode
    require_once( dirname( __FILE__ ) . '/admin/plugin-name-admin.php' );
}


// Register Custom Taxonomy
function twr_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'componenti', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'componente', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Componenti', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'twr_tax', array( 'post', 'page' ), $args );

}
add_action( 'init', 'twr_custom_taxonomy', 0 );


function twr_generate_dest_terms() {
    $destinatari = array('Docenti', 'Alunni', 'Genitori', 'Personale ATA');
    for ($i=0; $i<4; $i++) {
         if (!term_exists( $destinatari[$i], 'twr_tax')) {
            wp_insert_term( $destinatari[$i], 'twr_tax');
        }
    }
}
add_action( 'admin_init', 'twr_generate_dest_terms');

?>
