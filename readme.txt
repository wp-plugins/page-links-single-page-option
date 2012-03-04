=== Plugin Name ===
Contributors: studiohyperset, oqm4, ryanajarrett
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=C2KQADH2TGTS4
Tags: wordpress, php, function, plugin, nextpage, wp_link_pages, link_pages, Page-Link, multipage, next page, pages, quicktag, single page, single view, view all, all pages, multi-page, pagination, paging
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: 1.1

Adds a "single page" option to Page-Link-tag-generated page lists. 

== Description ==

This plugin adds a "single page" option to Page-Link-tag-generated page lists (`<!--nextpage-->`, `wp_link_pages()`, and `link_pages()` [depreciated]).

== Installation ==

After installing and activating, WordPress publishers can leverage the plugin in three ways. 

First, one can add the `showsinglepage=1` parameter to any `wp_link_pages()` template tag, e.g., `<?php wp_link_pages('pagelink=Page %&showsinglepage=1'); ?>`. (Entering a "0" will, of course, [temporarily] disable the plugin.) 

Second, publishers can edit the `show_globally` variable in the plugin file (see line 15). Changing the default variable from 0 to 1 will add the single page option to every Page-Link-tag-generated page list site-wide. 

Finally, once the plugin is activated, appending `?singlepage=1` to end of the URL of any post or page that includes the Page-Link tag will force WordPress to display that page/post as a single page (e.g., http://studiohyperset.com/wordpress-plugin-page-links-single-page-option-wp_link_pages-link_pages-nextpage/4637?singlepage=1).

== Frequently Asked Questions ==

= Links =

* For feedback and help, visit: http://getsatisfaction.com/studio_hyperset/products/studio_hyperset_wordpress_plugins

* To learn about other Studio Hyperset WordPress plugins, visit http://studiohyperset.com/projects/wordpress-plugins

* To learn about other Studio Hyperset code projects, visit http://code.google.com/p/studio-hyperset/downloads/list

= Developer Notes =
At present, the plugin's aimed at WordPress developers. As demand warrants, future builds may add an admin metabox to increase ease-of-use by non-developer WordPress users.

== Screenshots ==
&nbsp;

== Changelog ==

= 1.1 =
* 3/2/12 - Extra lines fix -- In some cases, the plugin added extra lines (via two `&lt;br /&gt;` tags) between paragraphs on the single page view.

= 1.0 =
* 2/29/12 - Initial Google Code Project Hosting (http://code.google.com/p/studio-hyperset/downloads/list) & WordPress Plugin Directory release

== Upgrade Notice ==

= 1.1 =
* 3/2/12 - Extra lines fix -- In some cases, the plugin added extra lines (via two `&lt;br /&gt;` tags) between paragraphs on the single page view.

= 1.0 =
* 2/29/12 - Initial Google Code Project Hosting (http://code.google.com/p/studio-hyperset/downloads/list) & WordPress Plugin Directory release