<?php

namespace Toist;


class Site extends TemplateObject
{
    public $data = [
        'language' => [
            'iso_code' => 'en-us',
            'name' => 'english',
        ],
        'name' => 'Site in toist.net',
        'title' => 'My site in toist.net',
        'logo' => 2,
        'site_title' => 'This is my site in toist.net',
        'company_email' => 'no-reply@toist.net',
        'company_name' => 'MySiteInToist',
        'company_phone' => '+19999999999',
        'company_address' => 'Toist st #1',
        'section' => null,
        'menus' => null,
        'contents' => null,
    ];
    
    public function __construct ($data = [])
    {
        $this->lang_iso_code2 = $lang_iso_code2;
    }
}