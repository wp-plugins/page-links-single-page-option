<?php
/**
 * Page Links Options
 *
 * @category Page_Links_Options
 * @package Page_Links
 */
/**
 * Page Links Options class
 * Sets up the option page and groups.
 *
 * @category Page_Links_Options
 * @package Page_Link
 */
class SH_PageLinks_Options
{
    /**
     * Handle for menu page.
     *
     * @var string
     */
    protected $menu_page;

	/**
	 * Option group name
	 *
	 * @var string
	 */
    protected $option_group_name = "sh_page_links_options";

    /**
     * PHP5 constructor function
     *
     * @return void
     */
    public function __construct($args = array())
    {
        add_action("{$this->option_group_name}_option_fields", array($this, 'set_options_fields'), 10, 1);
        add_action("{$this->option_group_name}_option_section", array($this, 'set_options_sections'), 10, 1);

        add_action('admin_init', array($this, 'options_init'));
        add_action('admin_menu', array($this, 'admin_menu'));

    }

    /**
     * admin_menu()
     * Hook function for admin_menu hook.
     *
     * @return void
     */
    public function admin_menu()
    {
        global $menu_page;

        if (empty($menu_page)){
            $menu_page = add_menu_page(
                __('Page-Links Plus', SH_PAGE_LINKS_DOMAIN),
                __('Page-Links Plus', SH_PAGE_LINKS_DOMAIN),
                'manage_options',
                'sh-page-links-options',
                array($this, 'show_menu_page'),
                SH_PAGE_LINKS_URL . 'images/logo-16x16.png'
            );

            add_action('admin_print_styles-' . $menu_page, array($this, 'enqueue_scripts'));
        }

    }

    /**
     * Enqueue scripts
     *
     * @return void
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script('jquery-ui', null, array('jquery'));
        wp_enqueue_script('jquery-ui-tabs', null, array('jquery'));

        wp_enqueue_style('jquery-ui-smoothness');
    }

    /**
     * Display options page
     * @return void
     */
    public function show_menu_page()
    {
        include_once SH_PAGE_LINKS_PATH . 'pages/page-plugin-options.php';
    }

	/**
	 * Registers options group. Performs all processing for
	 * adding options fields and settings
	 *
	 * @return void
	 */
    public function options_init()
    {
        /*
         * register_setting()
         * Settings should be stored as an array in the options table to
         * limit the number of queries made to the DB. The option name should
         * be the same as the option group.
         *
         * Using the options group in a page registered with add_options_page():
         * settings_fields($my_options_class->get_optiongroup_name())
         */
        register_setting(
            $this->option_group_name,
            $this->option_group_name,
            array($this, 'sanitize_options')
        );

        $sections = apply_filters("{$this->option_group_name}_option_sections", array());

        foreach ($sections as $section_name => $data) {
            add_settings_section(
                "{$this->option_group_name}-{$section_name}",
                $data['title'],
                array($this, 'settings_section_cb'),
                "{$this->option_group_name}-{$section_name}"
            );
        }

        $this->output_settings_fields();

    }

    /**
	 * Output setting fields
	 *
     * @return void
     */
    public function output_settings_fields()
    {

        $field_sections = apply_filters("{$this->option_group_name}_option_fields", array());

        foreach ($field_sections as $field_section => $field) {

            foreach ($field as $field_name => $field_data) {
                add_settings_field(
                    "{$field_section}_options-{$field_data['id']}",
                    (isset($field_data['title']) ? $field_data['title'] : " "),
                    $field_data['callback'],
                    "{$this->option_group_name}-{$field_section}",
                    "{$this->option_group_name}-{$field_section}",
                    array_merge(array('name' => $field_name), $field_data, array('section' => $field_section))
                );
            }
        }

    }

	/**
	 * Returns the options sections.
	 *
	 * @return array
	 */
    public function get_sections()
    {
        return apply_filters("{$this->option_group_name}_option_sections", array());
    }

	/**
	 * Returns the options fields.
	 *
	 * @return array
	 */
    public function get_fields()
    {
        return apply_filters("{$this->option_group_name}_option_fields", array());
    }

	/**
	 * Helper method for setting fields, used to create *_option_fields hook
	 * for other plugins to add fields.
	 *
	 * @return array
	 */
    public function set_options_fields($fields = array())
    {
        return $fields;
    }

	/**
	 * Helper method for setting sections, used to create *_option_section hook
	 * for other plugins to add sections.
	 *
	 * @return array
	 */
    public function set_options_sections($sections = array())
    {
        return $sections;
    }
    /**
     *
     * settings_section_cb()
     * Outputs Settings Sections
     *
     * @param string $section Name of section
     * @return void
     */
    public function settings_section_cb($section)
    {
        $options = $this->get_sections();

        $current = (substr($section['id'], strpos($section['id'], '-') + 1));

        echo "<p>{$options[$current]['description']}</p>";
    }

    /**
     * Output option fields
     *
     * @param mixed $option Current option to output
     * @return string
     */
    public function settings_field_cb($option)
    {
        global $sh_page_links;

        $option_str    = "";
        $option_values = $sh_page_links->get_options();

        if ($option['type'] == 'checkbox') {

            $value = !empty($option_values[$option['section']][$option['name']])
                        ? intval($option_values[$option['section']][$option['name']])
                        : 0;

            $option_str = "<label for=\"{$option['id']}\">"
                        . "<input type=\"checkbox\" "
                        . "name=\"sh_page_links_options[{$option['section']}]"
                        . "[{$option['name']}]\" "
                        . "id=\"{$option['id']}\" "
                        . "value=\"{$option['default']}\" "
                        . checked($option['default'], $value, false)
                        . " /> {$option['description']}"
                        . "</label>";
        }

        if ($option['type'] == 'text') {
            $description = !empty($option['description'])
                           ? "<span class=\"description\">{$option['description']}</span>" : '';

            $value = empty($option_values[$option['section']][$option['name']])
                        ? $option['default']
                        : esc_attr($option_values[$option['section']][$option['name']]);

            $option_str = "<label for=\"{$option['id']}\">"
                        . "<input type=\"text\" "
                        . "name=\"sh_page_links_options[{$option['section']}]"
                        . "[{$option['name']}]\" "
                        . "id=\"{$option['id']}\" "
                        . "value=\"{$value}\" "
                        . " /> {$description}"
                        . "</label>";
        }

        echo $option_str;

    }

	/**
	 * Sanitizes option fields
	 *
	 * @return void
	 */
    public function sanitize_options($options)
    {
		$fields = $this->get_fields();
		$new_options = $options;

        //
        // Workaround for returning to current jQuery UI-generated tab
        $current_tab = '';
        if (!empty($_POST['current_tab'])) {
            $current_tab = $_POST['current_tab'];
        }

        add_settings_error(
            $this->option_group_name,
            'current_tab',
            esc_attr($current_tab),
            'updated'
        );

		foreach ($options as $option_section => $option) {
			foreach ($option as $option_name => $option_value) {
				$field_data = !empty($fields[$option_section][$option_name])
								? $fields[$option_section][$option_name] : '';

				if ($field_data !== '') {

					switch ($field_data['valid']) {
						case 'boolean' :
						case 'integer':
                            if (!isset($field_data['min'])){
                                $value = is_numeric($option_value) ? intval($option_value) : 0;
                            } else {
                                $minval = intval($field_data['min']);
                                $newval = intval($option_value);
                                $value = ($newval < $minval) ? $minval : $newval;
                            }
						break;

						default:
                            if ($field_data['valid'] == 'html'){
                                $value = tag_escape($option_value);
                            } else if ($field_data['valid'] == 'html-id'
                                    || $field_data['valid'] == 'html-class') {

                                $value = sanitize_html_class($option_value);
                            } else if ($field_data['valid'] == 'formatted') {
                                $value = html_entity_decode($option_value);
                            } else { // just strip html out
                                $value = sanitize_title($option_value);
                            }
					}

					$new_options[$option_section][$option_name] = $value;
				}
			}
		}

        return $new_options;
	}
}
