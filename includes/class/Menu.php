<?php

namespace Toist;


class Menu extends TemplateObject
{
    public $items = [];
    
    
    
    public function __construct($items)
    {
        $this->items = $items;
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