<?php
/**
 * Plugin Name: Typing Text Animation
 * Plugin URI: http://aasthasolutions.com/about-us/
 * Description: Typing Text Animation plugin use to simulates the typewriter effect that animate the typing and deleting of text.
 * Version: 1.0.0
 * Author: Aastha Solutions
 * Author URI: http://aasthasolutions.com/
 * Requires at least: 4.4
 * Tested up to: 5.3.2
 * License: GPL2 or later
 * Text Domain: typing-text
 *
 * @package Typing Text Animation
 * @category Core
 * @author Aasthasolutions
 */
/*This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TTA_Shortcoder{

  // Constructor
    function __construct() {
		add_action('wp_enqueue_scripts',array( $this, 'tta_scripts' ) );
		add_shortcode( 'typingtext', array($this, 'tta_name_display' ) );
	}


	/**
	 * Shortcode for add text for typing animation.
	 *
	 * Shortcode atts
	 * Name   : display Typing Text
	 * Height : height of canvas image
	 * Width  : width of canvas image
	 * Name Full attribute  : width of canvas image
	 */

	function tta_name_display( $atts ) {
	    $atts = shortcode_atts( array(
	        'text' => 'Typing Text Animation',
	        'type_speed' => 200,
	        'type_delay' => 200,
	        'remove_speed' => 50,
	        'remove_delay' => 500,
	        'cursor_speed' => 200,
	        'loop' => true,
	    ), $atts );
	    
		return '<div
        class="animate-typing typing_custom"
        data-animate-loop="'.$atts['loop'].'"
        data-type-speed="'.$atts['type_speed'].'"
        data-type-delay="'.$atts['type_delay'].'"
        data-remove-speed="'.$atts['remove_speed'].'"
        data-remove-delay="'.$atts['remove_delay'].'"
        data-cursor-speed="'.$atts['cursor_speed'].'">
            '.$atts['text'].'
    	</div>';
	}
	
	/**
	 * Insert js for typing animation.
	 */
	function tta_scripts() {
		wp_enqueue_script('bn-bubbles', plugins_url( 'assets/js/jquery.animateTyping.js', __FILE__ ), array( 'jquery' ),'',true);
	    
	}
}

new TTA_Shortcoder();
?>