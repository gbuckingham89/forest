<?php
namespace Gbuckingham89\Forest;

/**
 * Class AdminBarManager
 * @package Gbuckingham89\Forest
 */
class AdminBarManager
{
	/**
	 * @var array
	 */
	protected $nodes_to_remove = [];

	/**
	 * AdminBarManager constructor.
	 */
	public function __construct()
	{
		// Register action to setup the admin bar
		add_action( 'admin_bar_menu', [ $this, 'setup' ], 999 );
	}

	/**
	 * Do the actual setup (well, modification) of the admin bar
	 * Don't call directly - will be called via a hook.
	 *
	 * @param $wp_admin_bar
	 */
	public function setup( $wp_admin_bar )
	{
		// Remove nodes
		foreach( array_unique( $this->nodes_to_remove ) as $node )
		{
			$wp_admin_bar->remove_node( $node );
		}
	}

	/**
	 * Register a node to be removed from the admin bar
	 *
	 * @param string $node
	 */
	public function removeNode( $node )
	{
		$this->nodes_to_remove[] = $node;
	}

	/**
	 * Remove the "Archive" node
	 */
	public function removeNodeArchive()
	{
		$this->removeNode( 'archive' );
	}

	/**
	 * Remove the "Comments" node
	 */
	public function removeNodeComments()
	{
		$this->removeNode( 'comments' );
	}

	/**
	 * Remove the "Dashboard" node
	 */
	public function removeNodeDashboard()
	{
		$this->removeNode( 'dashboard' );
	}

	/**
	 * Remove the "Menus" node
	 */
	public function removeNodeMenus()
	{
		$this->removeNode( 'menus' );
	}

	/**
	 * Remove the "New Content" node
	 */
	public function removeNodeNewContent()
	{
		$this->removeNode( 'new-content' );
	}

	/**
	 * Remove the "Search" node
	 */
	public function removeNodeSearch()
	{
		$this->removeNode( 'search' );
	}

	/**
	 * Remove the "Themes" node
	 */
	public function removeNodeThemes()
	{
		$this->removeNode( 'themes' );
	}

	/**
	 * Remove the "Updates" node
	 */
	public function removeNodeUpdates()
	{
		$this->removeNode( 'updates' );
	}

	/**
	 * Remove the "WordPress" node
	 */
	public function removeNodeWordpress()
	{
		$this->removeNode( 'wp-logo' );
	}

}