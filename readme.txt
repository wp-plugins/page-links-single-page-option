=== Page-Links Plus ===


Contributors: studiohyperset


Donate link: https://pagelinksplus.com


Tags: nextpage, wp_link_pages, link_pages, Page-Link, multipage, next page, pages, single page, single view, view all, all pages, pagination


Requires at least: 3.0


Tested up to: 3.4.2


Stable tag: 2.0


License: GPLv3 or later


License URI: http://www.gnu.org/licenses/gpl-3.0.html





Adds a "single page" option to Page-Link-tag-generated page lists.





== Description ==





While the WordPress Page-Link tag makes integrating page links rather effortless, it doesn't offer a native single-page option. Addressing this limitation, the basic Page-Links Plus plugin adds this option to WordPress page lists. 





The Single Page module also serves as the basic framework for the other [Page-Links Plus modules](http://pagelinksplus.com/).





== Installation ==





1. Install and activate the basic Page-Links Plus plugin. (If you're unfamiliar with installing WordPress plugins, please read [this page from the Codex](http://codex.wordpress.org/Managing_Plugins)).





2. You'll see a new top-level admin menu titled "Page-Links Plus" where you can globally enable/disable the single page view.





3. After enabling, users can also activate the single-page view by appending `?singlepage=1` to the end of any page or post (e.g., `http:&#47;&#47;sampleurl.com/page-title?singlepage=1`).





3. Add other Page-Links Plus modules:





* The [Pagination Styles](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-styles) module makes it easy for WordPress users to integrate HTML elements and CSS classes and id's and manage `wp_link_pages()` parameters.





* The [Auto Pagination](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-auto-pagination) module allows WordPress users to trade tedious in-line `<!--nextpage-->` tags for a site-wide management tool that paginates posts and pages quickly and uniformly.





* The [Scrolling Pagination](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-scrolling-pagination) module helps WordPress users customize the "nextpagelink" and "previouspagelink" `wp_link_pages()` parameters and integrate custom-length, scrolling page lists into posts and pages.





== Frequently Asked Questions ==





= Links =





* [Learn more about Page-Links Plus](http://pagelinksplus.com).





* Read detailed [installation instructions](http://pagelinksplus.com/wordpress-pagination-installation).





* Browse plugin [resources](http://pagelinksplus.com/wordpress-pagination-resources) and [make suggestions](http://pagelinksplus.com/wordpress-pagination-suggestions) for future builds.





* Like the plugin? Submit a [testimonial](http://pagelinksplus.com/wordpress-pagination-testimonials), create a [discussion post](http://pagelinksplus.com/wordpress-pagination-resources), or send us a message via Twitter [@studiohyperset](https://twitter.com/studiohyperset) / [#pagelinksplus](https://twitter.com/#!/search/?q=%23pagelinksplus&src=hash), [Facebook](http://www.facebook.com/studiohyperset), or [Google+](https://plus.google.com/u/0/110603974542824315461/).





* Learn about [other Studio Hyperset WordPress plugins](http://studiohyperset.com/projects/wordpress-plugins). 





== Screenshots ==


1. Page-Links Plus (Single Page) screenshot-1.png





2. [Pagination Styles module](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-styles) screenshot-2.png





3. [Auto Pagination module](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-auto-pagination) screenshot-3.png





4. [Scrolling Pagination module](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-scrolling-pagination) screenshot-4.png





== Changelog ==





= As "Page-Links Plus" =





= 2.0 (9/12/12) =


* Introduced "Page-Links Plus" top-level admin menu item and module framework.





* Introduced first three modules: [Pagination Styles](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-styles), [Auto Pagination](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-auto-pagination), and [Scrolling Pagination](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-scrolling-pagination).





* Shortcode/HTML fix — Earlier versions of the plugin rendered shortcodes inoperable, and broke HTML formatting, when the single-page view was active.





* Globally enable/disable single-page option for pages and posts using admin UI. (v.1.0 "?singlepage=1" URL parameter maintained.)





= As "Page-Links Single Page Option" =





= 1.1 (3/2/12) =





* Extra lines fix — In some cases, the plugin added extra lines (via two `<br />` tags) between paragraphs on the single page-view.





= 1.0 (2/29/12) =





* Initial release.





* Adding "showsinglepage=1" or "showsinglepage=0" parameter to any "wp_link_pages()" template tag — e.g., wp_link_pages(‘pagelink=Page %&showsinglepage=1′) — enables/disables a single-page option in lists.





* Entering "1" or "0" in the plugin’s "show_globally" variable (line 15) adds/removes the single-page option to/from every Page-Link-tag-generated page list site-wide.





* Appending "?singlepage=1" to any URL of any post or page that includes the Page-Link tag will force WordPress to display that page/post as a single page (e.g., http://example.com/page-title?singlepage=1).





== Upgrade Notice ==





= 2.0 (9/12/12) =


New functionality: top-level admin menu item and module framework. Shortcode/HTML fix. Globally enable/disable single-page option for pages and posts using admin UI. (v.1.0 "?singlepage=1" URL parameter maintained.)





= 1.1 (3/2/12) =


Extra lines fix





== Extra Modules ==





* [Pagination Styles](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-styles)





* [Auto Pagination](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-auto-pagination)





* [Scrolling Pagination](http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-scrolling-pagination)