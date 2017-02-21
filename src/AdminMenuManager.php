<?php
namespace Gbuckingham89\Forest;

/**
 * Class AdminMenuManager
 * @package Gbuckingham89\Forest
 */
class AdminMenuManager
{
	/**
	 * @var array
	 */
	protected $pages_to_remove = [];

	/**
	 * @var array
	 */
	protected $subpages_to_remove = [];

	/**
	 * AdminMenuManager constructor.
	 */
	public function __construct()
	{
		// Register action to setup the admin bar
		add_action( 'admin_menu', [ $this, 'setup' ] );
	}

	/**
	 * Do the actual setup (well, modification) of the admin menu
	 * Don't call directly - will be called via a hook.
	 */
	public function setup()
	{
		foreach( array_unique( $this->pages_to_remove ) as $menu_slug )
		{
			remove_menu_page( $menu_slug );
		}
		foreach( array_unique( $this->subpages_to_remove ) as $subpage )
		{
			remove_submenu_page( $subpage[0], $subpage[1] );
		}
	}

	/**
	 * Register a page to be removed from the admin menu
	 *
	 * @param string $menu_slug
	 */
	public function removePage( $menu_slug )
	{
		$this->pages_to_remove[] = $menu_slug;
	}

	/**
	 * Remove the "Comments" menu page
	 */
	public function removePageComments()
	{
		$this->removePage( 'edit-comments.php' );
	}

	/**
	 * Remove the "Links" menu page
	 */
	public function removePageLinks()
	{
		$this->removePage( 'link-manager.php' );
	}

	/**
	 * Register a sub page to be removed from the admin menu
	 *
	 * @param string $menu_slug
	 */
	public function removeSubPage( $menu_slug, $submenu_slug )
	{
		$this->subpages_to_remove[] = [ $menu_slug, $submenu_slug ];
	}

	/**
	 * Remove the "Customise" sub menu page
	 */
	public function removeSubPageCustomize()
	{
		$this->removeSubPage( 'themes.php', 'customize.php?return=%2Fwp%2Fwp-admin%2Fthemes.php' );
	}

}