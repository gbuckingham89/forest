<?php
namespace Gbuckingham89\Forest;

/**
 * Class ExcerptManager
 * @package Gbuckingham89\Forest
 */
class ExcerptManager
{
	/**
	 * @var int
	 */
	protected $length = 999;

	/**
	 * @var string
	 */
	protected $more_suffix = '...';

	/**
	 * ExcerptManager constructor.
	 */
	public function __construct()
	{
		add_filter( 'excerpt_length', [ $this, 'getLength' ], 999 );
		add_filter( 'excerpt_more', [ $this, 'getMore' ] );
	}

	/**
	 * @return int
	 */
	public function getLength()
	{
		return $this->length;
	}

	/**
	 * @return string
	 */
	public function getMore()
	{
		return $this->more_suffix;
	}

	/**
	 * Set the number of words used for the excerpt
	 *
	 * @param int $length
	 */
	public function setLength( $length )
	{
		if( is_numeric( $length) && $length > 0 )
		{
			$this->length = $length;
		}
	}

	/**
	 * Set the suffix for the excerpt when there is more text
	 *
	 * @param string $more_suffix
	 */
	public function setMore( $more_suffix )
	{
		$this->more_suffix = $more_suffix;
	}
}