<?php
/**
 * Created by PhpStorm.
 * User: j
 * Date: 2019-01-05
 * Time: 17:41
 */

namespace Toist\Helpers;


class Ads
{
    public function get($width, $height)
    {
        $widthString = $width ? 'width:'.$width.'px;' : '';
        $heightString = $height ? 'height:'.$height.'px;' : '';
        
        return '<div style="background-color:skyblue;'.$widthString.$heightString.'"></div>';
    }
}