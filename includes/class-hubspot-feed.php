<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Magento_Bridge
 * @subpackage Magento_Bridge/includes
 */

use Hubspot_Feed\Processor\Hubspot_Feed_Update;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Hubspot_Feed
 * @subpackage Hubspot_Feed/includes
 * @author     Your Name <email@example.com>
 */
class Hubspot_Feed {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Hubspot_Feed_Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $Hubspot_Feed The string used to uniquely identify this plugin.
	 */
	protected $Hubspot_Feed;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'Hubspot_Feed_Version' ) ) {
			$this->version = Hubspot_Feed_Version;
		} else {
			$this->version = '1.0.0';
		}
		$this->Hubspot_Feed = 'hubspot-feed';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_cron_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Magento_Bridge_Loader. Orchestrates the hooks of the plugin.
	 * - Magento_Bridge_i18n. Defines internationalization functionality.
	 * - Magento_Bridge_Admin. Defines all hooks for the admin area.
	 * - Magento_Bridge_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-hubspot-feed-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-hubspot-feed-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-hubspot-feed-admin.php';

		$this->loader = new Hubspot_Feed_Loader();

	}

	/**
	 * Sets Filesystem to Direct
	 *
	 * @return string
	 */
	public static function hubspot_feed_set_filesystem_to_direct() {
		return 'direct';
	}

	public function get_feeds() {
		return [
			'3-k'  => 'https://discover.worthingtonchristian.com/ages3-k/rss.xml',
			'1-5'  => 'https://discover.worthingtonchristian.com/grades1-5/rss.xml',
			'6-8'  => 'https://discover.worthingtonchristian.com/grades6-8/rss.xml',
			'9-12' => 'https://discover.worthingtonchristian.com/grades9-12/rss.xml',
		];
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Magento_Bridge_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Magento_Bridge_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
//		$plugin_admin = new Magento_Bridge_Admin( $this->get_Magento_Bridge(), $this->get_version() );
//
//		//$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
//		//$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
//		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );
//		$this->loader->add_action( 'admin_menu', $plugin_admin, 'register_option_page' );
//		$this->loader->add_action( 'admin_action_magento_bridge_clear_fetch', $plugin_admin, 'action_clear_fetch_products'
// );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		//$plugin_public = new Magento_Bridge_Public( $this->get_Magento_Bridge(), $this->get_version() );

		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @return    string    The name of the plugin.
	 * @since     1.0.0
	 */
	public function get_Hubspot_Feed() {
		return $this->Hubspot_Feed;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @return    Hubspot_Feed_Loader    Orchestrates the hooks of the plugin.
	 * @since     1.0.0
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @return    string    The version number of the plugin.
	 * @since     1.0.0
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Sets up Cron Hooks
	 */
	public function define_cron_hooks() {
		add_action( 'hubspot_feed_update', [ Hubspot_Feed_Update::class, 'run' ] );
	}

}
