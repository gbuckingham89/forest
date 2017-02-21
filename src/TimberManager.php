<?php
namespace Gbuckingham89\Forest;

/**
 * Class TimberManager
 * @package Gbuckingham89\Forest
 */
class TimberManager
{
	/**
	 * @var \Timber\Timber
	 */
	protected $timber = null;

	/**
	 * @var \Gbuckingham89\Forest\TwigManager
	 */
	protected $twig;

	/**
	 * TimberManager constructor.
	 */
	public function __construct()
	{
		// Start timber!
		$this->timber = new \Timber\Timber();

		// Add another manage
		$this->twig = new TwigManager();
	}
}