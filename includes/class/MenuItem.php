<?php

namespace Toist;


class MenuItem extends TemplateObject {
    public $caption = '';
    public $href = '';
    
    
    
    public function __construct($caption, $href)
    {
        $this->caption = $caption;
        $this->href = $href;
    }
    
    public function checkDynamicOffset($offset) : bool
    {
        return false;
    }
    
    
    
    public function getDynamicOffset($offset)
    {
        return null;
    }
}