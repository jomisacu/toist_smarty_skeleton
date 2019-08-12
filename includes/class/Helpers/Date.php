<?php

namespace Toist\Helpers;

class Date
{
    public function format($format, $date = null)
    {
    	$replace = [
    		'%year' => '%Y',
    		'%year_short' => '%Y',
    		'%month' => '%m',
    		'%month_short' => '%m',
    		'%month_name' => '%B',
    		'%month_name_short' => '%b',
    		'%day' => '%d',
    		'%day_short' => strpos(strtolower(PHP_OS), 'win') === 0 ? '%#d' : '%e',
    		'%day_name' => '%A',
    		'%day_name_short' => '%a',
    		'%hour_24' => '%H',
    		'%hour' => '%I',
    		'%hour_12' => '%I',
    		'%minute' => '%M',
    		'%second' => '%S',
		];
    	
    	// sort keys by length descending
		uksort($replace, function($k1, $k2){
			return strlen($k1) > strlen($k2) ? -1 : (strlen($k1) < strlen($k2) ? 1 : 0);
		});
		
    	if ($format) {
    		$format = str_replace(array_keys($replace), $replace, $format);
		} else {
    		$format = '%c'; // preferred stamp
		}
    	
        $dateInt = time();
    	
    	if (isset($date)) {
            if ( ! is_int($dateInt)) {
                $dateInt = strtotime($date);
            } else {
                $dateInt = $date;
            }
        }
    	
        return strftime($format, $dateInt);
    }
}