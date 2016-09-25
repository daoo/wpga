<?php
/*
Plugin Name: WPGA
Plugin URI: github.com/daoo/wpga
Description: Basic google analytics plugin.
Version: 1.0
Author: Daniel Oom
License: GPLv2

Copyright (C) 2016  Daniel Oom

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

defined('ABSPATH') or die();

function wpga_should_track() {
  return !is_user_logged_in() && !is_admin();
}

function wpga_enque_script($tracking_id) {
  wp_register_script('wpga-script', plugins_url('wpga/script.js', __FILE__), array(), null, true);
  wp_localize_script('wpga-script', 'wpga', array('tracking_id' => $tracking_id));
  wp_enqueue_script('wpga-script');
}

function wpga_get_footer() {
  if (wpga_should_track()) {
    $tracking_id = get_option('wpga_tracking_id');
    if (!empty($tracking_id)) {
      wpga_enque_script($tracking_id);
    }
  }
}

function wpga_admin_menu() {
  add_options_page('WPGA Options', 'WPGA', 'manage_options', 'wpga', 'wpga_options_page' );
}

function wpga_options_updated() {
  echo '<div class="updated"><p><strong>Settings saved.</strong></p></div>';
}

function wpga_options_form($tracking_id) {
  require(plugin_dir_path(__FILE__) . 'wpga/options.php');
}

function wpga_options_page() {
  if (!current_user_can('manage_options'))  {
    wp_die('You do not have sufficient permissions to access this page.');
  }

  if (isset($_POST['wpga-submit'])) {
    update_option('wpga_tracking_id', $_POST['wpga-tracking-id']);
    wpga_options_updated();
  }

  wpga_options_form(get_option('wpga_tracking_id'));
}

add_action('get_footer', 'wpga_get_footer');
add_action('admin_menu', 'wpga_admin_menu');

?>
