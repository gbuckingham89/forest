<?php
namespace Gbuckingham89\Forest;

/**
 * Class CustomizerManager
 * @package Gbuckingham89\Forest
 */
class CustomizerManager
{
	/**
	 * Disable the use of the WordPress Customizer.
	 * Source: https://github.com/parallelus/customizer-remove-all-parts
	 */
	public function disable()
	{
		add_filter( 'map_meta_cap', function( $caps = [], $cap = '', $user_id = 0, $args = [] ) {
			if ($cap == 'customize')
			{
				return [ 'nope' ];
			}
		}, 10, 4 );
	}
}