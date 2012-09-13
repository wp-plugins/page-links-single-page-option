<?php
/**
 * Page Links plugin
 *
 * @category Page_Links
 * @package Page_Links
 */
/*
Plugin Name: Page-Links Plus: Single Page
Plugin URI: http://pagelinksplus.com
Description: While the WordPress <a href="http://codex.wordpress.org/Styling_Page-Links">Page-Link tag</a> makes integrating page links rather effortless, it doesn't offer a native single-page option. Addressing this limitation, the basic Page-Links Plus plugin adds this option to WordPress page lists. The Single Page module also serves as the basic framework for the <a href="http://pagelinksplus.com">other Page-Links Plus modules</a>.
Version: 2.0
Author: Studio Hyperset, Inc.
Author URI: http://studiohyperset.com
License: GPL3
*/
/**
 * @global SH_PageLinks_Bootstrap $sh_page_links
 * @global SH_PageLinks_Options $sh_page_links_options
 */
global $sh_page_links, $sh_page_links_options;

 	// Add settings link on plugin page
function single_page_styles($links) { 
  $settings_link = '<a href="options-general.php?page=sh-page-links-options">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'single_page_styles' );
//

include_once 'page-links-install.php';
include_once 'page-links-options.php';
include_once 'single-view/single-view.php';
include_once 'single-view/single-view-options.php';

define('SH_PAGE_LINKS_URL', plugin_dir_url(__FILE__));
define('SH_PAGE_LINKS_PATH', plugin_dir_path(__FILE__));

if (!defined('SH_PAGE_LINKS_DOMAIN')){
    define('SH_PAGE_LINKS_DOMAIN', basename(dirname(__FILE__)));
}

define('SH_PAGE_LINKS_VER', '2.0');

add_action('init', array('SH_PageLinks_Bootstrap', 'init'));

register_activation_hook(__FILE__, array('SH_PageLinks_Install', 'do_activate'));
register_deactivation_hook( __FILE__, array('SH_PageLinks_Install', 'do_deactivate'));

/**
 * Plugin bootstrap class_alias
 *
 * @category Page_Links
 * @package Page_Links_Bootstrap
 */
class SH_PageLinks_Bootstrap
{
    /**
     * Options array
     *
     * @var array
     */
    protected static $options;

    /**
     * Plugin initialization. We use a static function to avoid using
     * create_function() in the hook.
     *
     * @return void;
     */
    public static function init()
    {
        global $sh_page_links, $sh_singleview_options;

        self::set_options();

        $sh_page_links = new SH_PageLinks_Bootstrap();
    }

    /**
     * PHP5 Constructor function
     *
     * @return void
     */
    public function __construct()
    {
        global $sh_single_view;

        wp_register_style(
            'jquery-ui-smoothness',
            SH_PAGE_LINKS_URL . '/css/ui-smoothness.css',
            null,
            SH_PAGE_LINKS_VER,
            'screen'
        );

        $sh_page_links_options = new SH_PageLinks_Options();
        $sh_single_view        = new SH_PageLinks_SingleView();
    }

    /**
     * Set plugin options. This method should run every time
     * plugin options are updated.
     *
     * @return void
     */
    public static function set_options()
    {
        $options = maybe_unserialize(get_option('sh_page_links_options'));

        if (empty($options)) {
            $options = SH_PageLinks_Install::get_default_options();
        }

        self::$options = $options;

    }

    /**
     * Get plugin options
     *
     * @return array
     */
    public function get_options()
    {
        return self::$options;
    }
}