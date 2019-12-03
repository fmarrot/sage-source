<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Custom print function
 */
function pr($data){
  $return = print_r('<pre>');
  $return.= print_r($data);
  $return.= print_r('</pre>');
  return $return;
}

//Dashboard customisation
function remove_dashboard_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['mb_dashboard_widget']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['wpseo-dashboard-overview']);
}

add_action('wp_dashboard_setup', __NAMESPACE__ . '\\remove_dashboard_widgets',20);

/*
 * Widget
 */
function widget_display(){
 echo '<p class="align:right"><img src="https://pixelus.fr/signature-mail.png" alt=""></p><p>Vous détectez une anomalie ou un problème technique sur le site, pour créer votre demande merci d\'utiliser le <strong>bugtracker de notre agence</strong>, disponible à l\'adresse suivante : <a href="https://bugtracker.pixelus.fr/" target="_blank">bugtracker.pixelus.fr</a>.</p><p>Si vous ne possédez pas de compte envoyez une demande <a href="mailto:fmarrot@pixelus.fr" target="_blank">ici</a></p><p>Une question sur l\'utilisation du back office ?<br><a href="mailto:fmarrot@pixelus.fr" target="_blank">fmarrot@pixelus.fr</a> ou 05 57 80 04 28</p>';
}
function bugtracker_widget(){
  wp_add_dashboard_widget('bugtracker', 'Un problème sur le site ?',  __NAMESPACE__ . '\\widget_display');
}
add_action('wp_dashboard_setup',  __NAMESPACE__ . '\\bugtracker_widget');



/**
 * ACF Options()
 */
// function my_acf_init() {
//     acf_update_setting('google_api_key', get_field('gmap_key','option'));
// }
//
// add_action('acf/init', __NAMESPACE__ . '\\my_acf_init');

/**
 * Add new image sizes to post or page editor
 */
// function image_sizes( $sizes ) {
//     $sizes = array_merge( $sizes, array(
//       'post-image' => __( 'Image de contenu' )
//     ));
//     return $sizes;
// }
// add_filter( 'image_size_names_choose', __NAMESPACE__ . '\\image_sizes' );

/**
 * Remove menu items for other admins (SEO/WPML/ACF/Tools/Users/Options/Plugins)
 */
// add_action('admin_menu', __NAMESPACE__ . '\\remove_admin_menu_links');
// function remove_admin_menu_links(){
//   $user = wp_get_current_user();
//   if( $user && isset($user->ID) && $user->ID != 1 ) {
//     remove_menu_page('options-general.php');
//     remove_menu_page('plugins.php');
//     remove_menu_page('users.php');
//     remove_menu_page('tools.php');
//     remove_menu_page('edit.php?post_type=acf-field-group');
//     remove_menu_page('admin.php?page=sitepress-multilingual-cms');
//     remove_menu_page('sitepress-multilingual-cms/menu/languages.php');
//     remove_menu_page('wpseo_dashboard');
//   }
// }
