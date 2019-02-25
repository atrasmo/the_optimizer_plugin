/**
 * Custom Optimizer for Wordpress - admin zone 
 *
 * @package   the_optimizer_plugin
 * @author    Alessandro Trasmondi
 * @license   GPL-2.0+
 * @link      https://github.com/atrasmo/the_optimizer_plugin
 * @copyright 2019 Alessandro Trasmondi
 *
function twr_generate_dest_terms() {
    $destinatari = array('Docenti', 'Alunni', 'Genitori', 'Personale ATA');
    for ($i=0; $i<4; $i++) {
         if (!term_exists( $destinatari[$i], 'twr_tax')) {
            wp_insert_term( $destinatari[$i], 'twr_tax');
        }
    }
}
add_action( 'admin_init', 'twr_generate_dest_terms');
