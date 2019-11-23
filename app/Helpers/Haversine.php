<?php
namespace App\Helpers;


class Haversine {

	public static function lat_radian($lat)
	{
		//$haversine = new Haversine;
		//global $const_radian;
		$radian = $lat * 0.0174532925;
		return $radian;
	}

	public static function lon_radian($lon)
	{
		//global $const_radian;
		$radian = $lon * 0.0174532925;
		return $radian;
	}

	public static function setx($lon2, $lon1, $lat2, $lat1)
	{

		$x = ($lon2-$lon1) * cos(($lat1+$lat2)/2);
		return $x;
	}

	public static function sety($lat2, $lat1)
	{

		$y = ($lat2-$lat1);
		return $y;
	}

    public static function distance($lat1, $lon1, $lat2, $lon2) 
    {
    	$haversine = new Haversine;
    	global $radius;
    	$lat1 = $haversine->lat_radian($lat1);
    	$lat2 = $haversine->lat_radian($lat2);
    	$lon1 = $haversine->lon_radian($lon1);
    	$lon2 = $haversine->lon_radian($lon2);
    	$x = $haversine->setx($lon2, $lon1, $lat2, $lat1);
    	$y = $haversine->sety($lat2, $lat1);
    	$distance = sqrt($x*$x+$y*$y)*6371;
    	return $distance;    
    }
}