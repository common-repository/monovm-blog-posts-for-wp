<?php
/*
Plugin Name: MonoVM Blog Posts for WP
Plugin URI: https://monovm.com/blog/
Description: Show Last Blog Posts of <a target=_blank" href="https://monovm.com/">MonoVM</a> in your dashboard.
Author: MonoVM
Version: 1.0
Tags: Blog, MonoVM, MonoVM Blog, wordpress, rss
Author URI: https://monovm.com/
License: GPL
*/
// Add MonoVM Blog //
function mvm_dashboard_widgets() {  
     global $wp_meta_boxes;  
     unset(  
          $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],  
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],  
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']  
     );  
     // add a custom dashboard widget  
     wp_add_dashboard_widget( 'dashboard_custom_feed', 'MonoVM Blog Posts', 'mvm_dashboard_output' ); //add new RSS feed output  
}  
function mvm_dashboard_output() {  
     echo '<div class="rss-widget">';  
     wp_widget_rss_output(array(  
          'url' => 'https://monovm.com/feed/posts',  
          'title' => 'Whats up at MonoVM',  
          'items' => 4,  
          'show_summary' => 1,  
          'show_author' => 1,  
          'show_date' => 1   
     ));  
     echo "</div>";  
}  
add_action('wp_dashboard_setup', 'mvm_dashboard_widgets');  
// End //
?>