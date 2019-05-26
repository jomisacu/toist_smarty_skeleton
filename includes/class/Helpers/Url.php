<?php

namespace Toist\Helpers;

class Url
{
    public function image_url($key, array $options = [
        'w' => null,
        'h' => null,
        'fit' => 'crop',
    ])
    {
        $options['key'] = $key;
        
        return 'image.php?'.http_build_query($options);
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