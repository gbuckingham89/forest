<?php
namespace Gbuckingham89\Forest;

/**
 * Class AcfManager
 * @package Gbuckingham89\Forest
 */
class AcfManager
{
	/**
	 * @param string $page_title
	 * @param string $menu_title
	 * @param string $menu_slug
	 * @param string $capability
	 * @param bool   $redirect
	 * @param bool   $autoload
	 */
	public function addOptionsPage( $page_title, $menu_title, $menu_slug, $capability = 'edit_posts', $redirect = false, $autoload = true )
	{
		acf_add_options_page( [
			'page_title'    => $page_title,
			'menu_title'    => $menu_title,
			'menu_slug'     => $menu_slug,
			'capability'    => $capability,
			'redirect'      => $redirect,
			'autoload'      => $autoload,
		] );
	}
}