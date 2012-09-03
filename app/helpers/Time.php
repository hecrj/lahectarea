<?php

namespace Sea\App\Helpers;

/**
 * Time helper.
 *
 * @author Héctor Ramón Jiménez
 */
class Time
{
	public function __construct()
	{}
	
	public function ago(\DateTime $date)
	{
		echo '<time class="timeago" datetime="'. $date->format('iso8601') .'">'.
				$this->getFormatted($date, '%e %B, %Y') .'</time>';
	}
	
	public function getFormatted($date = null, $format = '%e de %B, %Y')
	{
		if(! ($date instanceof \DateTime))
			return false;
		
		return strftime($format, $date->getTimestamp());
	}
}

?>
