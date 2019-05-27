<?php

namespace Toist;


class Site extends TemplateObject
{
    protected $language        = [
        'iso_code' => 'en-us',
        'name' => 'english',
    ];
    protected $name            = 'Site in toist.net';
    protected $title           = 'My site in toist.net';
    protected $logo            = 1;
    protected $site_title      = 'This is my site in toist.net';
    protected $company_email   = 'no-reply@toist.net';
    protected $company_name    = 'MySiteInToist';
    protected $company_phone   = '+19999999999';
    protected $company_address = 'toist st #1';
    protected $section         = null;
    protected $menus           = [];
    protected $contents        = [];
    
    public function __construct (
        $name = null,
        $title = null,
        $logo = null,
        $site_title = null,
        $company_email = null,
        $company_name = null,
        $company_phone = null,
        $company_address = null,
        $section = null,
        $menus = null,
        $contents = null
    ) {
        if (isset($name)) {
            $this->name = $name;
        }
        if (isset($title)) {
            $this->title = $title;
        }
        if (isset($logo)) {
            $this->logo = $logo;
        }
        if (isset($site_title)) {
            $this->site_title = $site_title;
        }
        if (isset($company_email)) {
            $this->company_email = $company_email;
        }
        if (isset($company_name)) {
            $this->company_name = $company_name;
        }
        if (isset($company_phone)) {
            $this->company_phone = $company_phone;
        }
        if (isset($company_address)) {
            $this->company_address = $company_address;
        }
        if (isset($section)) {
            $this->section = $section;
        }
        if (isset($menus)) {
            $this->menus = $menus;
        }
        if (isset($contents)) {
            $this->contents = $contents;
        }
    }
}