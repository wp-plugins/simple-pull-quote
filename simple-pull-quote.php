<?php
/**
 * @package Simple Pull Quote
 * @author Toby Cryns
 * @version 0.2.1
 */
/*
Plugin Name: Simple Pull Quote
Plugin URI: http://www.themightymo.com/simple-pull-quote
Description: Easily add a pull quote to blog posts using a custom field and shortcode.
Author: Toby Cryns
Version: 0.2.1
Author URI: http://www.themightymo.com/updates
*/

/*  Copyright 2009  Toby Cryns  (email : toby at themightymo dot com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function my_css() {
	echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') .'/wp-content/plugins/simple-pull-quote/css/simple-pull-quote.css" />' . "\n";
}

function getQuote(){
	global $post;
	$my_custom_field = get_post_meta($post->ID, "quote", true);
	/* Add CSS classes to the pull quote (a.k.a. Style the thing!) */
	return '<div class="simplePullQuote" cite="<?php echo get_permalink() ?>">'.$my_custom_field.'</div>'; 
}
/* Allow us to add the pull quote using Wordpress shortcode, "[quote]" */
add_shortcode('quote', 'getQuote');

/* Add the CSS file to the header when the page loads */
add_action('wp_head', 'my_css');

/*add_filter('quote','getQuote');*/
?>