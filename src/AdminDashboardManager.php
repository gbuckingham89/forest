<?php
namespace Gbuckingham89\Forest;

/**
 * Class AdminDashboardManager
 * @package Gbuckingham89\Forest
 */
class AdminDashboardManager
{
	/**
	 * @var bool
	 */
	protected $remove_default_widgets = false;

	/**
	 * @var array
	 */
	protected $widgets_to_add = [];

	/**
	 * AdminDashboardManager constructor.
	 */
	public function __construct()
	{
		add_action('wp_dashboard_setup', [ $this, 'setupWidgets' ] );
	}

	/**
	 * Do the actual setup (well, modification) of the admin dashboard widgets
	 * Don't call directly - will be called via a hook.
	 */
	public function setupWidgets()
	{
		global $wp_meta_boxes;
		if( $this->remove_default_widgets )
		{
			$wp_meta_boxes['dashboard'] = [];
		}
		foreach( $this->widgets_to_add as $widget )
		{
			wp_add_dashboard_widget( $widget['slug'], $widget['title'], $widget['callback'] );
		}
	}

	/**
	 * Add a panel to the dashboard
	 *
	 * @param string    $slug
	 * @param string    $title
	 * @param callable  $callback
	 */
	public function addWidget( $slug, $title, $callback )
	{
		$this->widgets_to_add[] = [
			'slug'      => $slug,
			'title'     => $title,
			'callback'  => $callback,
		];
	}

	/**
	 * Remove all of the default widgets from the admin dashboard
	 */
	public function removeDefaultWidgets()
	{
		$this->remove_default_widgets = true;
	}

}