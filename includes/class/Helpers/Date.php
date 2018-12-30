<?php

namespace Toist\Helpers;

class Date
{
    public function format($date, $format = null)
    {
        $dateInt = $date;
        if ( ! is_int($date)) {
            $dateInt = strtotime($date);
        }
        
        return strftime($format ?: 'Y-m-d H:i:s', $dateInt);
    }
}