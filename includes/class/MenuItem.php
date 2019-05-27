<?php

namespace Toist;


class MenuItem extends TemplateObject
{
    protected $caption = 'Default menu item text';
    protected $text = 'Default menu item text';
    protected $href = 'https://www.toist.net';
    protected $css_class = 'menu-item';
    protected $target = '_blank';
    
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