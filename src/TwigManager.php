<?php
namespace Gbuckingham89\Forest;

/**
 * Class TwigManager
 * @package Gbuckingham89\Forest
 */
class TwigManager
{
	/**
	 * TwigManager constructor.
	 */
	public function __construct()
	{
		// Filter to add Twig filters
		add_filter('timber/twig', function($twig) {
			$twig->addFilter( new \Twig_SimpleFilter( 'prefix_classes', [ $this, 'filterPrefixClasses'] ) );
			$twig->addFunction( new \Twig_SimpleFunction( 'get_option', [ $this, 'functionGetOption' ] ) );
			return $twig;
		});
	}

	/**
	 * @param mixed $classes
	 * @param string $prefix
	 *
	 * @return mixed
	 */
	public function filterPrefixClasses( $classes, $prefix )
	{
		if( is_string( $classes ) && !empty( $classes ) )
		{
			$classes = str_ireplace( " ", " " . $prefix, " " . ltrim( $classes ) );
		}
		return $classes;
	}

	/**
	 * @param string $option
	 *
	 * @return mixed|null|void
	 */
	public function functionGetOption( $option )
	{
		return get_field( $option, 'options' );
	}
}