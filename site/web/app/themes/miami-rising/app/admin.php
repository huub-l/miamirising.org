<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/**
 * Admin Customization
 */
add_action( 'wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );            // Remove the WordPress logo
      $wp_admin_bar->remove_menu( 'about' );            // Remove the about WordPress link
      $wp_admin_bar->remove_menu( 'wporg' );            // Remove the about WordPress link
      $wp_admin_bar->remove_menu( 'documentation' );    // Remove the WordPress documentation link
      $wp_admin_bar->remove_menu( 'support-forums' );   // Remove the support forums link
      $wp_admin_bar->remove_menu( 'feedback' );         // Remove the feedback link
    $wp_admin_bar->remove_menu( 'customize' );          // Remove the site name menu
    $wp_admin_bar->remove_menu( 'updates' );            // Remove the updates link
    $wp_admin_bar->remove_menu( 'comments' );           // Remove the comments link
  }, 999); // Needs to have low priority

/**
 * Remove left admin footer text
 * @link https://developer.wordpress.org/reference/hooks/admin_footer_text/
 */
add_filter( 'admin_footer_text', '__return_empty_string' );
/**
 * Remove right admin footer text (where the WordPress version nr is)
 * @link https://developer.wordpress.org/reference/hooks/update_footer/
 */
add_filter( 'update_footer', '__return_empty_string', 11 );

/**
 * Hide admin menu items. Can be both parents and children in dropdowns.
 * Specify link to parent and link to child.
 * @link https://codex.wordpress.org/Function_Reference/remove_menu_page
 */
add_action( 'admin_menu', function () {
    // Remove Dashboard -> Update Core notice
    remove_submenu_page( 'index.php', 'update-core.php' );
    // Remove Comments
    remove_menu_page( 'edit-comments.php' );
    // Remove Settings
}, 999);

/**
 * Remove default fields in comment form
 * @link https://codex.wordpress.org/Function_Reference/comment_form
*/
add_filter( 'comment_form_default_fields', function( $fields ){
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    return $fields;
});

/**
 * Remove Help Tabs
 * @link https://codex.wordpress.org/Adding_Contextual_Help_to_Administration_Menus
 *
 * @param $old_help
 * @param $screen_id
 * @param $screen
 */
add_filter( 'contextual_help', function ( $old_help, $screen_id, $screen ) {
    // Remove all help tabs
    $screen->remove_help_tabs();
    // Remove specific tabs
    $screen->remove_help_tab( 'overview' );
    $screen->remove_help_tab( 'help-navigation' );
    $screen->remove_help_tab( 'help-layout' );
    $screen->remove_help_tab( 'help-content' );
    $screen->remove_help_tab( 'attachment-details' );
    $screen->remove_help_tab( 'managing-pages' );
    $screen->remove_help_tab( 'managing-pages' );
    $screen->remove_help_tab( 'moderating-comments' );
    $screen->remove_help_tab( 'adding-themes' );
    $screen->remove_help_tab( 'customize-preview-themes' );
    $screen->remove_help_tab( 'compatibility-problems' );
    $screen->remove_help_tab( 'adding-plugins' );
    // $screen->remove_help_tab( 'screen-display' );
    $screen->remove_help_tab( 'actions' );
    $screen->remove_help_tab( 'user-roles' );
    $screen->remove_help_tab( 'press-this' );
    $screen->remove_help_tab( 'converter' );
    $screen->remove_help_tab( 'options-postemail' );
    $screen->remove_help_tab( 'options-services' );
    $screen->remove_help_tab( 'site-visibility' );
    $screen->remove_help_tab( 'permalink-settings' );
    $screen->remove_help_tab( 'custom-structures' );
}, 999, 3);

/**
 * Remove Screen Options tab
 * @link https://developer.wordpress.org/reference/hooks/screen_options_show_screen/
 */
// add_filter( 'screen_options_show_screen', '__return_false' );

  /**
 * Removing dashboard widgets.
 * @link https://codex.wordpress.org/Function_Reference/remove_meta_box
 */
add_action( 'admin_init', function () {
    // Remove the 'Welcome' panel
    remove_action('welcome_panel', 'wp_welcome_panel');
    // Remove the 'At a Glance' metabox
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    // Remove the 'Activity' metabox
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
    // Remove the 'WordPress News' metabox
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    // Remove the 'Quick Draft' metabox
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
});

/**
 * Removed post columns
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_posts_columns
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_pages_columns
 */
add_action( 'admin_init' , function () {

    // Posts
    add_filter( 'manage_posts_columns', function ( $columns ) {
      unset(
        $columns['comments']
      );
      return $columns;
    });

    // Pages
    add_filter( 'manage_pages_columns', function ( $columns ) {
        unset(
            $columns['comments'],
            $columns['date']
        );
        return $columns;
    });
});

add_action( 'admin_init', function () {
    // Profile page
    add_action( 'admin_print_scripts-profile.php', function () {
      ?><style>
      .user-rich-editing-wrap,
      .user-syntax-highlighting-wrap,
      .user-comment-shortcuts-wrap,
      .user-language-wrap,
      .user-description-wrap {
        display: none;
      }</style><?php
    });
    // Edit user page
    add_action( 'admin_print_scripts-user-edit.php', function () {
      ?><style>
      .user-rich-editing-wrap,
      .user-syntax-highlighting-wrap,
      .user-admin-color-wrap,
      .user-language-wrap,
      .user-description-wrap {
        display: none;
      }</style><?php
    });
});
