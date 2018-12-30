<?php

namespace Toist\Helpers;

class Url
{
    public function image_url($data)
    {
        return 'image.php?'.http_build_query($data);
    }
    
    
    
    public function css_url($path, $version = null)
    {
        $version = $version ?: time();
        
        return 'templates/' . $path.'?v='.$version;
    }
    
    
    
    public function js_url($path, $version = null)
    {
        $version = $version ?: time();
        
        return 'templates/' . $path.'?v='.$version;
    }
}