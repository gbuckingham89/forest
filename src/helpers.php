<?php
/**
 * Do a pretty var_dump
 *
 * @param mixed $var
 * @param bool  $die
 */
function yam_dump( $var, $die = false )
{
	echo '<pre style="background:#fff;padding:10px;border:1px solid #f00;">';
	var_dump( $var );
	echo '</pre>';
	if( $die ) die();
}