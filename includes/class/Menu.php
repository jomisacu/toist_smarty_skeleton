<?php

namespace Toist;


class Menu extends TemplateObject
{
    protected $css_class = 'menu';
    protected $name      = 'Default menu';
    protected $items     = [];
    
    public function __construct ($css_class = null, $name = null, $items = null)
    {
        if (isset($css_class)) {
            $this->css_class = $css_class;
        }
        
        if (isset($name)) {
            $this->name = $name;
        }
        
        if (isset($items)) {
            $this->items = $items;
        }
    }
}