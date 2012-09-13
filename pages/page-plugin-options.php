<?php
/**
 * Page Links Options page
 *
 * @package Page_Links
 * @subpackage Options
 * @version $Id$
 */
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']))
    die('You are not allowed to call this page directly.');

    $sections_array = $this->get_sections();
    $sections = array_keys($sections_array);

    $messages    = get_settings_errors();
    $current_tab = 'single_view';

    if (!empty($messages[0]['message'])) {
        $current_tab = $messages[0]['message'];
    }
?>
<style type="text/css">
    #icon-sh-page-links-options {
        background-image: url('<?php echo SH_PAGE_LINKS_URL ?>/images/logo-32x32.png');
    }
</style>
<script type="text/javascript">
    jQuery(function($){
        $('.tabs').tabs({
            select : function(event, ui) {
                var $panel = $(ui.panel),
                    $input = $('#input-current-tab'),
                    currentPanel = $panel.attr('id');

                $input.val(currentPanel);
            }
        });

        $('.tabs').tabs('select', '<?php echo $current_tab; ?>');
    })
</script>
<div class="wrap">
    <?php screen_icon(); ?>
    <h2>Page-Links Plus</h2>
	<div class="border"></div>
    <div id="logo-wrap"><a href="http://studiohyperset.com" target="_blank"><img src="http://studiohyperset.com/wp-content/uploads/2011/03/logo-lg.png" id="logo" /></a><a href="http://studiohyperset.com" target="_blank">studiohyperset.com</a><br /><a href="http://pagelinksplus.com" target="_blank">pagelinksplus.com</a><br /><a href="https://twitter.com/studiohyperset" target="_blank">@studiohyperset</a><br /><a href="https://twitter.com/#!/search/?q=%23pagelinksplus&src=hash" target="_blank">#pagelinksplus</a></div>
    <p><a href="http://studiohyperset.com" target="_blank">Studio Hyperset</a> built Page-Links Plus for one reason: to provide the WordPress community with an integrated, comprehensive pagination solution.</p>
    <p>Whether you're a WordPress developer, site manager, or lay user, Page-Links Plus can help you set up, customize, and manage your site's pagination quickly and easily.</p>
    
    <ul id="sales">
    <?php if (is_plugin_active('pagination-styles/pagination-styles.php')) { } else { echo '<li id="pagination_styles"><a href="http://pagelinksplus.com/wordpress-pagination-shop/wordpress-pagination-styles" target="_blank">Add Pagination Styles - $5</a></li><li class="pitch">Easily style Page-Link-generated page lists and manage associated parameters. (<a href="http://pagelinksplus.com//wordpress-pagination-modules/wordpress-pagination-styles" target="_blank">Learn more</a> &raquo;)</li><li class="spacer">&nbsp;</li>'; } ?>
    
    
    <?php if (is_plugin_active('auto-pagination/auto-pagination.php') || is_plugin_active('scrolling-pagination/scrolling-pagination.php')) { } else { echo '<li id="auto_scrolling_pagination"><a href="http://pagelinksplus.com/wordpress-pagination-shop/wordpress-pagination-auto-pagination-scrolling-pagination" target="_blank">Add Auto &amp; Scrolling Pagination - $10</a></li><li class="pitch">Paginate pages and posts quickly and uniformly and integrate custom-length, scrolling page lists. (<a href="http://pagelinksplus.com/wordpress-pagination-modules/wordpress-pagination-auto-pagination" target="_blank">Learn more</a> &raquo;)</li><li class="spacer">&nbsp;</li>'; } ?>
    
    
    <?php if (is_plugin_active('pagination-styles/pagination-styles.php') || is_plugin_active('auto-pagination/auto-pagination.php') || is_plugin_active('scrolling-pagination/scrolling-pagination.php')) { } else { echo '<li id="three_modules"><a href="http://pagelinksplus.com/wordpress-pagination-shop/wordpress-pagination-three-module-set" target="_blank">Add All Three Modules - $12</a></li><li class="pitch">Manage pagination site-wide with WordPress\' intuitive administration framework. (<a href="http://pagelinksplus.com/wordpress-pagination-modules" target="_blank">Learn more</a> &raquo;)'; } ?>
    
    </ul>
    
    <?php if (is_plugin_active('pagination-styles/pagination-styles.php') && is_plugin_active('auto-pagination/auto-pagination.php') && is_plugin_active('scrolling-pagination/scrolling-pagination.php')) { echo '
	<p id="complete">"'.$blog_title = get_bloginfo('name').'" is running the complete Page-Links Plus framework.</p>'; } else { } ?>
    
    <?php if (is_plugin_active('pagination-styles/pagination-styles.php') && is_plugin_active('auto-pagination/auto-pagination.php') && is_plugin_active('scrolling-pagination/scrolling-pagination.php') || is_plugin_active('pagination-styles/pagination-styles.php') && is_plugin_active('auto-pagination/auto-pagination.php')) { echo '
	<p id="list">&raquo; <a href="http://pagelinksplus.com" target="_blank">Learn more about</a> Page-Links Plus.<br />
	&raquo; Plugin <a href="http://pagelinksplus.com/wordpress-pagination-resources" target="_blank">resources</a> and <a href="http://pagelinksplus.com/wordpress-pagination-suggestions" target="_blank">suggestions</a>.<br />
	&raquo; Browse <a href="http://studiohyperset.com/projects/wordpress-plugins" target="_blank">SH\'s other WordPress plugins</a>.<br />
	&raquo; Like the plugin? <a href="http://pagelinksplus.com/wordpress-pagination-testimonials" target="_blank">Submit a testimonial</a>, <a href="http://pagelinksplus.com/wordpress-pagination-resources" target="_blank">create a discussion post</a>, or send us a message via Twitter (<a href="https://twitter.com/studiohyperset" target="_blank">@studiohyperset</a> / <a href="https://twitter.com/#!/search/?q=%23pagelinksplus&#038;src=hash" target="_blank">#pagelinksplus</a>), <a href="http://www.facebook.com/studiohyperset" target="_blank">Facebook</a>, or <a href="https://plus.google.com/u/0/110603974542824315461/" target="_blank">Google+</a>.<br />
	&raquo; <a href="http://studiohyperset.com/contact" target="_blank">Contact SH</a> and/or link up with us on <a href="http://www.facebook.com/studiohyperset" target="_blank">Facebook</a> and <a href="http://twitter.com/#!/studiohyperset" target="_blank">Twitter</a>.</p>'; } else { echo ''; } ?>
    
	<div class="breaker-bottom"></div>
     
    <?php if (isset($_GET['settings-updated'])) : ?>
        <div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Settings saved.</strong></p></div>
    <?php endif; ?>
    <form action="options.php" method="post" id="sh_pagelinks_options_form">

        <?php settings_fields('sh_page_links_options'); ?>

        <div class="tabs">

            <div class="nav-tab-wrapper">
                <ul>
                    <?php foreach ($sections_array as $section => $data):  ?>
                        <li class="nav-tab">
                            <a id="tab-<?php echo esc_attr($section);?>" href="#<?php echo esc_attr($section);?>"><?php echo $data['title']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php foreach ($sections as $section_name): ?>
                <div class="tab" id="<?php echo esc_attr($section_name); ?>">
                    <?php do_settings_sections("sh_page_links_options-{$section_name}"); ?>
                </div>
            <?php endforeach; ?>

            <input type="hidden" name="current_tab" id="input-current-tab" value="single_view" />
        </div>

        <p>
            <input name="sh_page_links_option-submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Settings', SH_PAGE_LINKS_DOMAIN); ?>" />
        </p>
    </form>
</div>