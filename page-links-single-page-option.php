<?php
/*
Plugin Name: Page-Links Single Page Option
Plugin URI: http://studiohyperset.com/wordpress-plugin-page-links-single-page-option-wp_link_pages-link_pages-nextpage/4637
Description: This plugin adds a "single page" option to Page-Link-tag-generated page lists (<code>&lt;!--nextpage--&gt;</code>, <code>wp_link_pages()</code>, and <code>link_pages()</code> [depreciated]). After installing and activating, WordPress publishers can leverage the plugin in three ways. First, one can add the <code>showsinglepage=1</code> parameter to any <code>wp_link_pages()</code> template tag -- e.g., <code>&lt;?php wp_link_pages('pagelink=Page %&showsinglepage=1'); ?&gt;</code>. (Entering a "0" will, of course, [temporarily] disable the plugin.) Second, publishers can edit the <code>show_globally</code> variable in <a href="plugin-editor.php?file=page-links-single-page-option%2Fpage-links-single-page-option.php&plugin=page-links-single-page-option%2Fpage-links-single-page-option.php">the plugin file</a> (see line 27). Changing the default variable from 0 to 1, will add the single page option to every Page-Link-tag-generated page list site-wide. Finally, once the plugin is activated, appending <code>?singlepage=1</code> to end of the URL of any post or page that includes the Page-Link tag will force WordPress to display that page/post as a single page (e.g., http://example.com/page-or-post-title-here?singlepage=1). <em>w/ special thanks to <a href="http://www.ryanajarrett.com">Ryan Jarrett</a></em>
Version: 1.0
Author: Studio Hyperset, Inc. 
Author URI: http://studiohyperset.com/posts
License: GPL3
*/

// Add "Settings" link to installed plugins page
	function add_settings_link($links, $file) {
	static $this_plugin;
	if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
	if ($file == $this_plugin){
	$settings_link = '<a href="plugin-editor.php?file=page-links-single-page-option%2Fpage-links-single-page-option.php&plugin=page-links-single-page-option%2Fpage-links-single-page-option.php">'.__("Settings", "page-links-single-page-option").'</a>';
 	array_unshift($links, $settings_link);
	}
	return $links;
	}
	add_filter('plugin_action_links', 'add_settings_link', 10, 2 );

// Plugin
function view_single_page_args($val) {
		global $post, $page;
		$show_globally = 0; // Change to 1 to show across entire site
		$singlepage = $_GET[singlepage];
		$newval = $val;
		if ($val[showsinglepage]==1 || $show_globally) { 
			$url = add_query_arg( 'singlepage', 1, get_permalink() );
			$newval["after"]= " | " . (!$singlepage? "<a href='$url'>" : "") . "Single page" . (!$singlepage? "</a>" : "") . $newval["after"];
		}
		if ($singlepage) $page = 0;
		return $newval;
	}
	add_filter('wp_link_pages_args','view_single_page_args',50,1);
	function add_all_pages($content) {
		global $multipage, $post;
		$singlepage = $_GET[singlepage];
		if ($singlepage==1 && $multipage && !is_front_page() ) {
			$content = $post->post_content;
			$content = nl2br($content)."<br><br>";
		}
		return $content;
	}
	add_filter('the_content','add_all_pages',50,1)
?>