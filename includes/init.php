<?php

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/functions.php';

Symfony\Component\Debug\Debug::enable();
Symfony\Component\Debug\ErrorHandler::register();

$request = Symfony\Component\HttpFoundation\Request::createFromGlobals();

define('CURRENT_PAGE', $request->get('page', 1));
define('PAGE_SIZE', $request->get('page_size', 20));

$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ . '/../templates');
$smarty->setCompileDir(__DIR__ . '/../templates_c');
$smarty->setForceCompile(true);

// include helpers
$smarty->assign('url', new Toist\Helpers\Url());
$smarty->assign('date', new Toist\Helpers\Date());

$smarty->assign('site', new Toist\Site());
$smarty->assign('lang', new Toist\Lang());
$smarty->assign('theme_path', 'templates');
$smarty->assign('page', CURRENT_PAGE);
$smarty->assign('page_size', PAGE_SIZE);
