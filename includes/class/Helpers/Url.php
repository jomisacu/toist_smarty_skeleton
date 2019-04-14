<?php

namespace Toist\Helpers;

class Url
{
    public function image_url($imageId, $width = null, $height = null, $maxWidth = null, $maxHeight = null)
    {
    	$aux = [];
    	
        if (is_array($imageId)) {
            $values       = $imageId;
            $valueIndexes = [ 'image', 'w', 'h', 'max-w', 'max-h' ];
        
            foreach ($valueIndexes as $index => $param) {
                $aux[ $param ] = $values[ $index ] ?? null;
            }
        } else {
            $aux['image'] = $imageId;
            $aux['w']     = $width;
            $aux['h']     = $height;
            $aux['max-w'] = $maxWidth;
            $aux['max-h'] = $maxHeight;
        }
    	
        return 'image.php?'.http_build_query($aux);
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