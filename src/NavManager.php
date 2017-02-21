<?php
namespace Gbuckingham89\Forest;

use Gbuckingham89\Forest\Timber\Menu;

/**
 * Class NavManager
 * @package Gbuckingham89\Forest
 */
class NavManager
{
	/**
	 * @var array
	 */
	protected $menuLocations = [];

	/**
	 * NavManager constructor.
	 */
	public function __construct()
	{
		// Filter to add menus to Timber context
		add_filter( 'timber/context', [ $this, 'addMenusToTimberContext' ] );
	}

	/**
	 * @param $context
	 *
	 * @return array
	 */
	public function addMenusToTimberContext( $context )
	{
		$context['nav_menus'] = [];
		foreach( $this->menuLocations as $location )
		{
			$context['nav_menus'][$location] = new Menu( $location );
		}
		return $context;
	}

	/**
	 * Register a nav menu
	 *
	 * @param $location
	 * @param $description
	 */
	public function registerMenu( $location, $description )
	{
		register_nav_menu( $location, $description );
		$this->menuLocations[] = $location;
	}

	/**
	 * Register several nav menus
	 *
	 * @param array $menus
	 */
	public function registerMenus( array $menus )
	{
		register_nav_menus( $menus );
	}
}
