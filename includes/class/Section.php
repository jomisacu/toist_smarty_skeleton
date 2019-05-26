<?php

namespace Toist;

class Section extends TemplateObject
{
    public $title = 'Section of my site in toist.net';
    public $domain = null;
    public $path = '/';
    public $is_default = true;
    public $permanent_url = '/';
    public $url_permanent = '/';
    public $menus;
    public $contents;
    
    
    
    public function __construct($title = null, $domain = null, $path = null, $is_default = null, $permanent_url = null, $menus = null, $contentLists = null, $pageSize = 20)
    {
        if (isset($title)) {
            $this->title = $title;
        }
        
        if (isset($domain)) {
            $this->domain = $domain;
        }
        
        if (isset($path)) {
            $this->path = $path;
        }
        
        if (isset($is_default)) {
            $this->is_default = $is_default;
        }
        
        if (isset($permanent_url)) {
            $this->permanent_url = $permanent_url;
            $this->url_permanent = $permanent_url;
        }
        
        if (isset($menus)) {
            $this->menus    = $menus;
        }
        
        if (isset($contentLists)) {
            foreach ($contentLists as $contentListKey => $contents) {
                $this->contents[$contentListKey] = new ContentList('', $contents);
            }
        }
    }
}