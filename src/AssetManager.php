<?php
namespace Gbuckingham89\Forest;

/**
 * Class AssetManager
 * @package Gbuckingham89\Forest
 */
class AssetManager
{
	/**
	 * @var array
	 */
	protected $javascripts_to_add = [];

	/**
	 * @var array
	 */
	protected $javascripts_to_remove = [];

	/**
	 * @var array
	 */
	protected $stylesheets_to_add = [];

	/**
	 * @var array
	 */
	protected $stylesheets_to_remove = [];

	/**
	 * AssetManager constructor.
	 */
	public function __construct()
	{
		// Register action to setup assets
		add_action( 'wp_enqueue_scripts', [ $this, 'setup' ] );
	}

	/**
	 * Do the actual enqueuing and de-registering of assets.
	 * Don't call directly - will be called via a hook.
	 */
	public function setup()
	{
		foreach ( $this->javascripts_to_remove as $script )
		{
			wp_deregister_script( $script );
		}
		foreach ( $this->stylesheets_to_remove as $stylesheet )
		{
			wp_deregister_style( $stylesheet );
		}
		foreach ( $this->javascripts_to_add as $script )
		{
			wp_enqueue_script( $script['handle'], $script['src'], $script['deps'], $script['ver'], $script['in_footer'] );
		}
		foreach ( $this->stylesheets_to_add as $stylesheet )
		{
			wp_enqueue_style( $stylesheet['handle'], $stylesheet['src'], $stylesheet['deps'], $stylesheet['ver'], $stylesheet['media'] );
		}
	}

	/**
	 * Add a JavaScript file
	 *
	 * @param string      $handle
	 * @param string      $src
	 * @param array       $deps
	 * @param string|bool $ver
	 * @param bool        $in_footer
	 */
	public function javascriptAdd( $handle, $src = '', $deps = [], $ver = false, $in_footer = false )
	{
		$this->javascripts_to_add[] = [
			'handle'    => $handle,
			'src'       => $src,
			'deps'      => $deps,
			'ver'       => $ver,
			'in_footer' => $in_footer,
		];
	}

	/**
	 * Remove a JavaScript file
	 *
	 * @param string $handle
	 */
	public function javascriptRemove( $handle )
	{
		$this->javascripts_to_remove[] = $handle;
	}

	/**
	 * Add a CSS stylesheet
	 *
	 * @param               $handle
	 * @param string        $src
	 * @param array         $deps
	 * @param string|bool   $ver
	 * @param string        $media
	 */
	public function stylesheetAdd( $handle, $src = '', $deps = [], $ver = false, $media = 'all' )
	{
		$this->stylesheets_to_add[] = [
			'handle'    => $handle,
			'src'       => $src,
			'deps'      => $deps,
			'ver'       => $ver,
			'media'     => $media,
		];
	}

	/**
	 * Remove a CSS stylesheet
	 *
	 * @param string $handle
	 */
	public function stylesheetRemove( $handle )
	{
		$this->javascripts_to_remove[] = $handle;
	}
}