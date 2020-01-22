<?php

class CMPOPFLY_Settings {

    const TYPE_BOOL = 'bool';
    const TYPE_INT = 'int';
    const TYPE_STRING = 'string';
    const TYPE_COLOR = 'color';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_RADIO = 'radio';
    const TYPE_SELECT = 'select';
    const TYPE_MULTISELECT = 'multiselect';
    const TYPE_CSV_LINE = 'csv_line';

    /*
     * OPTIONS
     */
    // General
    const OPTION_ITEMS_ORDER = 'cmpopfly_items_order';
    //Widget
    const OPTION_DEFAULT_WIDGET_TYPE = 'cmpopfly_default_widget_type';
    const OPTION_DEFAULT_WIDGET_THEME = 'cmpopfly_default_widget_theme';
    const OPTION_DEFAULT_WIDGET_WIDTH = 'cmpopfly_default_widget_width';
    const OPTION_DEFAULT_WIDGET_HEIGHT = 'cmpopfly_default_widget_height';
    const OPTION_CUSTOM_WIDGET_WIDTH = 'cmpopfly_custom_widget_width';
    const OPTION_CUSTOM_WIDGET_HEIGHT = 'cmpopfly_custom_widget_height';
    const OPTION_WIDGET_SHOWSEARCH = 'cmpopfly_widget_showsearch';
    const OPTION_WIDGET_SHOWTITLE = 'cmpopfly_widget_showtitle';
    const OPTION_DISPLAY_METHOD = 'cmpopfly_default_display_method';
    const OPTION_BACKGROUND_COLOR = 'cmpopfly_custom_background_color';
    const OPTION_DELAY_TO_SHOW = 'cmpopfly_custom_delay_to_show';
    const OPTION_CUSTOM_WIDGET_SHAPE = 'cm-campaign-widget-shape';
    const OPTION_CUSTOM_WIDGET_SHOW_EFFECT = 'cm-campaign-widget-show-effect';
    const OPTION_CUSTOM_WIDGET_INTERVAL = 'cm-campaign-widget-interval';
    const OPTION_CUSTOM_WIDGET_INTERVAL_RESET_TIME = 'cm-campaign-widget-interval-reset-time';
    const OPTION_CUSTOM_WIDGET_UNDERLAY_TYPE = 'cm-campaign-widget-underlay-type';
    const OPTION_CUSTOM_WIDGET_SELECTE_BANNER = 'cm-campaign-widget-selected-banner';
    const OPTION_CUSTOM_WIDGET_CLICKS_COUNT_METHOD = 'cm-campaign-widget-clicks-count-method';

    /*
     * OPTIONS - END
     */
    const ACCESS_EVERYONE = 0;
    const ACCESS_USERS = 1;
    const ACCESS_ROLE = 2;
    const EDIT_MODE_DISALLOWED = 0;
    const EDIT_MODE_WITHIN_HOUR = 1;
    const EDIT_MODE_WITHIN_DAY = 2;
    const EDIT_MODE_ANYTIME = 3;

    public static $categories = array(
        'installation' => 'General',
        'upgrade' => 'Appearance',
        'custom_css' => 'Custom CSS',
        'labels' => 'Labels',
        'custom' => 'Custom',
    );
    public static $subcategories = array(
        'installation' => array(
            'installation' => 'Installation'
        ),
        'upgrade' => array(
            'upgrade' => 'How to Upgrade'
        ),
    );
    public static $currentCategory = NULL;
    public static $currentSubcategory = NULL;

    public static function getOptionsConfig() {

        return apply_filters('cmpopfly_options_config', array(
            // General
            self::OPTION_ITEMS_ORDER => array(
                'type' => self::TYPE_SELECT,
                'default' => 'DESC',
                'category' => 'custom',
                'subcategory' => 'general',
                'title' => 'Product Items order',
                'desc' => 'Select whether the items should be ordered ascenging or descending',
                'options' => array('DESC' => 'DESC',
                    'ASC' => 'ASC'),
            ),
            // General - Widget
            self::OPTION_DEFAULT_WIDGET_TYPE => array(
                'type' => self::TYPE_SELECT,
                'default' => 'popup',
                'category' => 'custom',
                'subcategory' => 'widget',
                'title' => 'Select the widget type',
                'desc' => 'Allows to select the type of the widget',
                'options' => array('popup' => 'Pop-Up', 'flyin' => 'Fly-In Bottom (only in Pro)', 'full' => 'Full Screen (only in Pro)'),
            ),
            self::OPTION_CUSTOM_WIDGET_UNDERLAY_TYPE => array(
                'type' => self::TYPE_SELECT,
                'default' => 'dark',
                'category' => 'custom',
                'subcategory' => 'widget',
                'title' => 'Select the widget underlay type',
                'desc' => 'Allows to select widget underlay type',
                'options' => array('dark' => 'Dark Underlay',
                    'light' => 'Light Underlay',
                    'no' => 'No Underlay'
                ),
            ),
                        // General - Widget
            self::OPTION_CUSTOM_WIDGET_SHAPE               => array(
                'type'        => self::TYPE_SELECT,
                'default'     => 'rounded',
                'category'    => 'custom',
                'subcategory' => 'widget',
                'title'       => 'Select the widget shape',
                'desc'        => 'Allows to select the shape of the widget',
                'options'     => array( 'rounded' => 'Rounded Edges', 'sharp' => 'Sharp Edges' ),
            ),
                )
        );
    }

    public static function getOptionsConfigByCategory($category, $subcategory = null) {
        $options = self::getOptionsConfig();
        self::$currentCategory = $category;
        self::$currentSubcategory = $subcategory;
        return array_filter($options, array(__CLASS__, 'optionFilter'));
    }

    public static function optionFilter($val) {
        $category = self::$currentCategory;
        $subcategory = self::$currentSubcategory;
        if ($val['category'] == $category) {
            return (is_null($subcategory) OR $val['subcategory'] == $subcategory);
        }
    }

    public static function getOptionConfig($name) {
        $options = self::getOptionsConfig();
        if (isset($options[$name])) {
            return $options[$name];
        }
    }

    public static function setOption($name, $value) {
        $options = self::getOptionsConfig();
        if (isset($options[$name])) {
            $field = $options[$name];
            $old = get_option($name);
            if (is_array($old) OR is_object($old) OR strlen((string) $old) > 0) {
                update_option($name, self::cast($value, $field['type']));
            } else {
                $result = update_option($name, self::cast($value, $field['type']));
            }
        }
    }

    public static function deleteAllOptions() {
        $params = array();
        $options = self::getOptionsConfig();
        foreach ($options as $name => $optionConfig) {
            self::deleteOption($name);
        }

        return $params;
    }

    public static function deleteOption($name) {
        $options = self::getOptionsConfig();
        if (isset($options[$name])) {
            delete_option($name);
        }
    }

    public static function getOption($name) {
        $options = self::getOptionsConfig();
        if (isset($options[$name])) {
            $field = $options[$name];
            $defaultValue = (isset($field['default']) ? $field['default'] : null);
            return self::cast(get_option($name, $defaultValue), $field['type']);
        }
    }

    public static function getCategories() {
        $categories = array();
        $options = self::getOptionsConfig();
        foreach ($options as $option) {
            $categories[] = $option['category'];
        }
        return $categories;
    }

    public static function getSubcategories($category) {
        $subcategories = array();
        $options = self::getOptionsConfig();
        foreach ($options as $option) {
            if ($option['category'] == $category) {
                $subcategories[] = $option['subcategory'];
            }
        }
        return $subcategories;
    }

    protected static function boolval($val) {
        return (boolean) $val;
    }

    protected static function arrayval($val) {
        if (is_array($val))
            return $val;
        else if (is_object($val))
            return (array) $val;
        else
            return array();
    }

    protected static function cast($val, $type) {
        if ($type == self::TYPE_BOOL) {
            return (intval($val) ? 1 : 0);
        } else {
            $castFunction = $type . 'val';
            if (function_exists($castFunction)) {
                return call_user_func($castFunction, $val);
            } else if (method_exists(__CLASS__, $castFunction)) {
                return call_user_func(array(__CLASS__, $castFunction), $val);
            } else {
                return $val;
            }
        }
    }

    protected static function csv_lineval($value) {
        if (!is_array($value))
            $value = explode(',', $value);
        return $value;
    }

    public static function processPostRequest() {
        $params = array();
        $options = self::getOptionsConfig();
        foreach ($options as $name => $optionConfig) {
            if (isset($_POST[$name])) {
                $params[$name] = $_POST[$name];
                self::setOption($name, $_POST[$name]);
            }
        }

        return $params;
    }

    public static function userId($userId = null) {
        if (empty($userId))
            $userId = get_current_user_id();
        return $userId;
    }

    public static function isLoggedIn($userId = null) {
        $userId = self::userId($userId);
        return !empty($userId);
    }

    public static function getRolesOptions() {
        global $wp_roles;
        $result = array();
        if (!empty($wp_roles) AND is_array($wp_roles->roles))
            foreach ($wp_roles->roles as $name => $role) {
                $result[$name] = $role['name'];
            }
        return $result;
    }

    public static function canReportSpam($userId = null) {
        return (self::getOption(self::OPTION_SPAM_REPORTING_ENABLED) AND ( self::getOption(self::OPTION_SPAM_REPORTING_GUESTS) OR self::isLoggedIn($userId)));
    }

    public static function getPagesOptions() {
        $pages = get_pages(array('number' => 100));
        $result = array(null => '--');
        foreach ($pages as $page) {
            $result[$page->ID] = $page->post_title;
        }
        return $result;
    }

    public static function areAttachmentsAllowed() {
        $ext = self::getOption(self::OPTION_ATTACHMENTS_FILE_EXTENSIONS);
        return (!empty($ext) AND ( self::getOption(self::OPTION_ATTACHMENTS_ANSWERS_ALLOW) OR self::getOption(self::OPTION_ATTACHMENTS_QUESTIONS_ALLOW)));
    }

    public static function getLoginPageURL($returnURL = null) {
        if (empty($returnURL)) {
            $returnURL = get_permalink();
        }
        if ($customURL = CMPOPFLY_Settings::getOption(CMPOPFLY_Settings::OPTION_LOGIN_PAGE_LINK_URL)) {
            return esc_url(add_query_arg(array('redirect_to' => urlencode($returnURL)), $customURL));
        } else {
            return wp_login_url($returnURL);
        }
    }

}
