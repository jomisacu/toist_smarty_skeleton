<?php

namespace Toist\Helpers;

class Url
{
    public function image_url ($key, $options = null, $height = null, $fit = null)
    {
        if (is_int($options)) {
            $options = [
                'w' => $options,
            ];
        
            if (isset($height) && (int)$height) {
                $options['h'] = (int)$height;
            }
        
            if (isset($fit)) {
                $options['fit'] = $fit;
            }
        }
    
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