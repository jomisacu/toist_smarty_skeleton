<?php

namespace Toist\Helpers;

class Url
{
    public function image_url($data)
    {
    	if (!is_array($data)) {
    		$values = func_get_args();
    		$aux = [];
			foreach (['id', 'w', 'h', 'mw', 'mh'] as $index => $param) {
				$aux[$param] = $values[$index];
    		}
			$data = $aux;
		}
    	
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