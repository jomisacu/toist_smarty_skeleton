<?php

namespace Toist;

class Section extends TemplateObject
{
    public $menus;
    public $contents;
    
    
    
    public function __construct($menus, $contentLists, $pageSize)
    {
        $this->menus    = $menus;
        $this->contents = [];
    
        foreach ($contentLists as $contentListKey => $contents) {
            $this->contents[$contentListKey] = new ContentList('', $pageSize, $contents);
        }
    }
}