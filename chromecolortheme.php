<?php
/**

    Plugin Name: Status Bar Color Changer For Android
    Plugin URI: http://jyothisjoy.com/
    Description: This plugin is meant to change the color of header bar and address bar in Android.
    Version: 0.1.6
    Author: Jyothis Joy
    Author URI: http://jyothisjoy.com
    License: GPL2
    Text Domain:    status-bar-color-changer-for-android
    Domain Path:    /languages

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
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
/*Include Files */
include 'includes/navigation.php';
include 'includes/colorsettings.php';
include 'includes/frontend.php';
include 'includes/metaboxfunc.php';
/*Actions & Hooks*/
add_action( 'admin_menu', 'chromecolortheme_register_navigtation' );
add_action( 'wp_head', 'chromecolortheme_inserthead' );
add_action( 'admin_enqueue_scripts', 'chromecolortheme_wp_admin_style' );
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'chromecolortheme_action_links' );
add_action( 'add_meta_boxes', 'chromecolortheme_custom_meta_box' );
add_action( 'save_post', 'save_chromecolor_meta_box', 10, 3);
add_action( 'plugins_loaded', 'chromecolortheme_translateinitfunction');

function chromecolortheme_action_links($links){
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=chrome-color-themes') ) .'">Settings</a>';
   return $links;
}

function chromecolortheme_wp_admin_style(){
        wp_enqueue_script( 'jscolor', plugins_url('/script/jscolor.min.js', __FILE__, false, '2.0.4'));
}
function chromecolortheme_translateinitfunction(){
    load_plugin_textdomain( 'status-bar-color-changer-for-android', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
?>