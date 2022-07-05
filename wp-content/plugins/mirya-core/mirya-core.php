<?php
/**
 * Plugin Name: Mirya Core
 * Description: Core plugin for Mirya Theme
 * Author URI:  https://www.templatemonster.com/authors/recthemes/
 * Author:      HasnaaDesign
 * Version:     1.0
 * Text Domain: mirya
 * License:     GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit;
}

define("PLUGIN_PATH", plugin_dir_path(__FILE__));

final class Mirya_Core
{
    const VERSION = '1.3.0';

    const MINIMUM_ELEMENTOR_VERSION = '2.9.0';

    const MINIMUM_PHP_VERSION = '7.0';

    private static $_instance = null;

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function __construct()
    {
        add_action('init', [$this, 'i18n']);
        add_action('plugins_loaded', [$this, 'init']);
    }

    public function i18n()
    {
        load_plugin_textdomain('mirya');
    }

    public function admin_notice_missing_main_plugin()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'mirya'),
            '<strong>' . esc_html__('Elementor Test Extension', 'mirya') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'mirya') . '</strong>'
        );
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function admin_notice_minimum_elementor_version()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'mirya'),
            '<strong>' . esc_html__('Elementor Test Extension', 'mirya') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'mirya') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function admin_notice_minimum_php_version()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'mirya'),
            '<strong>' . esc_html__('Elementor Test Extension', 'mirya') . '</strong>',
            '<strong>' . esc_html__('PHP', 'mirya') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function init_widgets()
    {
        require_once(__DIR__ . '/widgets/mirya-header.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_header_widget());

        require_once(__DIR__ . '/widgets/mirya-main-title.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_main_title_widget());

        require_once(__DIR__ . '/widgets/mirya-about.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_about_widget());

        require_once(__DIR__ . '/widgets/mirya-skills.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_skills_widget());

        require_once(__DIR__ . '/widgets/mirya-service.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_service_widget());

        require_once(__DIR__ . '/widgets/mirya-resume.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_resume_widget());

        require_once(__DIR__ . '/widgets/mirya-portfolio.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_portfolio_widget());

        require_once(__DIR__ . '/widgets/mirya-fact.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_fact_widget());

        require_once(__DIR__ . '/widgets/mirya-testimonials.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_testimonials_widget());

        require_once(__DIR__ . '/widgets/mirya-blog.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_blog_widget());

        require_once(__DIR__ . '/widgets/mirya-contact-info.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_contact_info_widget());

        require_once(__DIR__ . '/widgets/mirya-cf7.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_cf7_shortcode_widget());

        require_once(__DIR__ . '/widgets/mirya-footer.php');
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \mirya_footer_widget());

    }

    public function categories($elements_manager)
    {
        $elements_manager->add_category(
            'mirya-category',
            [
                'title' => __('Mirya Catagory', 'mirya'),
                'icon' => 'fa fa-plug',
            ]
        );
        
    }

    public function init()
    {
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return;
        }
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
        }
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return;
        }
        add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
        add_action('elementor/elements/categories_registered', [$this, 'categories']);
    }
}

Mirya_Core::instance();
