<?php
namespace Gbuckingham89\Forest;

/**
 * Class ImageManager
 * @package Gbuckingham89\Forest
 */
class ImageManager
{
	/**
	 * ImageManager constructor.
	 */
	public function __construct()
	{
		add_filter( 'post_thumbnail_html', [ $this, 'htmlRemoveSizing' ], 10 );
		add_filter( 'image_send_to_editor', [ $this, 'htmlRemoveSizing' ], 10 );
	}

	/**
	 * Enable support for post thumbnails for the given post types
	 *
	 * @param array $post_types
	 */
	public function enablePostThumbnails( $post_types = [] )
	{
		add_theme_support( 'post-thumbnails', $post_types );
	}

	/**
	 * Remove the hard coding of image sizes from a string of HTML
	 *
	 * @param string $html
	 *
	 * @return string
	 */
	public function htmlRemoveSizing( $html )
	{
		return preg_replace( '/(width|height)="\d*"\s/', "", $html );
	}

	/**
	 * Register a new image size with WordPress
	 *
	 * @param string     $name
	 * @param int        $width
	 * @param int        $height
	 * @param bool|array $crop
	 */
	public function registerSize( $name, $width, $height, $crop = false )
	{
		add_image_size( $name, $width, $height, $crop );
	}
}