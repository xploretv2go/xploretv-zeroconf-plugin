<?php
/**
 * Plugin Name:         xploretv.zeroconf.plugin
 * Plugin URI:          https://github.com/xploretv2go/xploretv.zeroconf.plugin
 * Description:         Device detection of NUKI bridge for xploretv.template theme.
 * Version:             0.1
 * Requires at least:   5.6
 * Requires PHP:        7.2
 * Author:              seso media group gmbh
 * Author URI:          https://www.seso.at/
 * License:             GPL v2 or later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         xploretv-zeroconf-plugin
 */

function seso_zeroconf_settings_page() {
    $page_title = 'Zeroconf Settings';
    $menu_title = 'Zeroconf';
    $capability = 'manage_options';
    $menu_slug = 'seso-zeroconf.php';
    $function = 'seso_zeroconf_options';
    $position = null;
    add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function, $position );
}
add_action( 'admin_menu', 'seso_zeroconf_settings_page' );


function seso_zeroconf_init() {
    $GLOBALS['devices']  = array();

    $detection_url_nuki = 'https://api.nuki.io/discover/bridges';
    $detection_url_zeroconf_api = 'http://localzeroconf:15051/a1/xploretv/v1/zeroconf';

    $nuki_result = file_get_contents($detection_url);
    if ($nuki_result) {
        $nuki_result = json_decode($nuki_result);
        if (count($nuki_result->bridges) !== 0) {
            $GLOBALS['devices'][]  = array('name' => 'Nuki', 'href' => '/devices/nuki/');
        }
    }

    $zeroconf_api_result = file_get_contents($detection_url);
    if ($zeroconf_api_result) {
        $zeroconf_api_result_data = json_decode($zeroconf_api_result);
        if (count($zeroconf_api_result->services) != 0) {
            $GLOBALS['devices'][] = array('name' => 'zeroconf_api', 'href' => '/devices/zeroconf');
        }
    }

}
add_action( 'init', 'seso_zeroconf_init' );

function seso_zeroconf_options() {
?>
    <div class="wrap">
        <h2>Zeroconf Settings</h2>
        <h3>Available Zerconf data</h3>
        <?php
            if (count($GLOBALS['devices']) == 0) {
                ?>
                <p>Es stehen keine Zeroconf-Daten zur Verfügung</p>
        <?php
            } else {
        ?>
                <table class="wp-list-table widefat fixed striped table-view-list posts">
                    <thead>
                        <tr>
                            <th scope="col" id="name" class="manage-column column-name">Name</th>
                            <th scope="col" id="link" class="manage-column column-key">HREF</th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                            foreach ($GLOBALS['devices'] as $device) {
                        ?>
                        <tr>
                            <td><strong><?= $device['name'] ?></strong></td>
                            <td><?= $device['href'] ?></td>
                        <tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
        <?php
            }
        ?>
    </div>

    <?php
}
