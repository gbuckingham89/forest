<?php
namespace Gbuckingham89\Forest\Timber;

/**
 * Class MenuItem
 * @package Gbuckingham89\Forest\Timber
 */
class MenuItem extends \Timber\MenuItem
{
	/**
	 * @return bool
	 */
	public function is_active()
	{
		return in_array( 'current-menu-item', $this->classes );
	}

	/**
	 * @return bool
	 */
	public function is_child_active()
	{
		return in_array( 'current-page-ancestor', $this->classes );
	}

	/**
	 * @return string
	 */
	public function classes_string()
	{
		if( !count( $this->classes ) ) return '';
		return implode( " ", ( is_array( $this->classes ) ? $this->classes : [] ) );
	}

	/**
	 * @return string
	 */
	public function classes_str()
	{
		return $this->classes_string();
	}

}