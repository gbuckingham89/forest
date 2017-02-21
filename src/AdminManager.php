<?php
namespace Gbuckingham89\Forest;

/**
 * Class AdminManager
 * @package Gbuckingham89\Forest
 */
class AdminManager
{
	/**
	 * @var string
	 */
	protected $footer_text = '';

	/**
	 * @var \Gbuckingham89\Forest\AdminBarManager
	 */
	public $bar;

	/**
	 * @var \Gbuckingham89\Forest\AdminDashboardManager
	 */
	public $dashboard;

	/**
	 * @var \Gbuckingham89\Forest\AdminMenuManager
	 */
	public $menu;

	/**
	 * AdminManager constructor.
	 */
	public function __construct()
	{
		// Setup managers
		$this->bar = new AdminBarManager();
		$this->dashboard = new AdminDashboardManager();
		$this->menu = new AdminMenuManager();

		// Actions & filters
		add_filter( 'admin_footer_text', [ $this, 'setupFooterText' ], 999 );
	}

	/**
	 * Do the actual setup (well, modification) of the admin footer text
	 * Don't call directly - will be called via a hook.
	 */
	public function setupFooterText()
	{
		return $this->footer_text;
	}

	/**
	 * Disable the help tab in the admin UI
	 * Source: http://wordpress.stackexchange.com/questions/25034/how-to-remove-screen-options-and-help-links-in-the-admin-area
	 */
	public function disableHelpTab()
	{
		add_filter( 'contextual_help', function( $old_help, $screen_id, $screen ){
			$screen->remove_help_tabs();
			return $old_help;
		}, 999, 3 );
	}

	/**
	 * Set the footer text (appears on bottom left of admin pages)
	 *
	 * @param $footer_text
	 */
	public function setFooterText( $footer_text )
	{
		$this->footer_text = $footer_text;
	}

}