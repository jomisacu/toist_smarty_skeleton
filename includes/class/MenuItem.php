<?php

namespace Toist;


class MenuItem extends TemplateObject
{
    public $caption = 'Default menu item text';
    public $text = 'Default menu item text';
    public $href = 'https://www.toist.net';
    public $css_class = 'menu-item';
    public $target = '_blank';
    
    public function __construct (
        $caption = null,
        $href = null,
        $css_class = null,
        $target = null
    ) {
        if (isset($caption)) {
            $this->caption = $caption;
            $this->text    = $caption;
        }
        
        if (isset($href)) {
            $this->href = $href;
        }
        
        if (isset($css_class)) {
            $this->css_class = $css_class;
        }
        
        if (isset($target)) {
            $this->target = $target;
        }
    }
}