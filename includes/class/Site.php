<?php

namespace Toist;


class Site extends TemplateObject
{
    public $lang_iso_code2 = 'en';
    
    
    
    public function __construct($lang_iso_code2 = 'en')
    {
        $this->lang_iso_code2 = $lang_iso_code2;
    }
}