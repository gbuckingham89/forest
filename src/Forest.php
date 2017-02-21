<?php
namespace Gbuckingham89\Forest;

/**
 * Class Forest
 * @package Gbuckingham89\Forest
 */
class Forest
{
	/**
	 * @var \Gbuckingham89\Forest\AdminManager
	 */
	public $admin;

	/**
	 * @var \Gbuckingham89\Forest\AssetManager
	 */
	public $assets;

	/**
	 * @var \Gbuckingham89\Forest\CustomizerManager
	 */
	public $customizer;

	/**
	 * @var \Gbuckingham89\Forest\EmojiManager
	 */
	public $emojis;

	/**
	 * @var \Gbuckingham89\Forest\ExcerptManager
	 */
	public $excerpt;

	/**
	 * @var \Gbuckingham89\Forest\ImageManager
	 */
	public $images;

	/**
	 * @var \Gbuckingham89\Forest\TimberManager
	 */
	public $timber;

	/**
	 * Theme constructor.
	 */
	public function __construct()
	{
		// Setup managers
		$this->acf = new AcfManager();
		$this->admin = new AdminManager();
		$this->assets = new AssetManager();
		$this->customizer = new CustomizerManager();
		$this->emojis = new EmojiManager();
		$this->excerpt = new ExcerptManager();
		$this->images = new ImageManager();
		$this->nav = new NavManager();
		$this->timber = new TimberManager();

		// Do some basic crap cleanup
		$this->crapCleanup();
	}

	/**
	 * Do some basic clearing up of WordPress crap
	 */
	protected function crapCleanup()
	{
		// Remove WP Generator text from the header
		remove_action( 'wp_head', 'wp_generator' );

		// Disable oEmbed
		add_action( 'init', function() {

			// Remove the REST API endpoint.
			remove_action('rest_api_init', 'wp_oembed_register_route');

			// Turn off oEmbed auto discovery.
			// Don't filter oEmbed results.
			remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

			// Remove oEmbed discovery links.
			remove_action('wp_head', 'wp_oembed_add_discovery_links');

			// Remove oEmbed-specific JavaScript from the front-end and back-end.
			remove_action('wp_head', 'wp_oembed_add_host_js');
		}, PHP_INT_MAX - 1 );
	}

	/**
	 * Does some work to disable / hide comment UI
	 * A shortcut method to call several methods in the managers
	 */
	public function hideCommentsAdminUi()
	{
		$this->admin->bar->removeNodeComments();
		$this->admin->menu->removePageComments();
	}
}